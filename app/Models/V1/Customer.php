<?php

namespace App\Models\V1;

use App\Traits\KeyTransformable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use OpenApi\Attributes as OAT;

/**
 * @OA\Schema()
 */
class Customer extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;


    protected $fillable = [
        "name",
        "surname",
        "phone_number",
        "passport_or_id",
        "birth_date",
        "gender",
    ];

    public function activeSubscription(){

        return $this->hasOne(CustomerMemberships::class)->where([
            "status" => CustomerMemberships::STATUS_ACTIVE
        ])->where("expiry_date",">",now());
    }
    public function inActiveSubscriptions(){
        return $this->hasOne(CustomerMemberships::class)->where([
            "status" => CustomerMemberships::STATUS_INACTIVE
        ])->where("expiry_date",">",now())->latest();
    }

    public function memberships(){
        // Get all memberships and update status if expiry date is today or in the past
        $memberships = $this->hasMany(CustomerMemberships::class)->latest()->get();

        // Iterate through memberships and update status if expiry date is today or in the past
        foreach ($memberships as $membership) {
            if ($membership->expiry_date <= now()->toDateString()) {
                // Update status to 2 (INACTIVE) for expired memberships
                $membership->update(['status' => CustomerMemberships::STATUS_EXPIRED]);
            }
        }



        // Return updated memberships
        return $this->hasMany(CustomerMemberships::class)->latest();

    }

    public function extendActiveMembership($days){

        $activeMembership = $this->activeSubscription->get();

        if($activeMembership){
            $newExpiry = Carbon::parse($activeMembership->expiry_date)->addDays($days);

            $activeMembership->expiry_date = $newExpiry;
            $activeMembership->save();

        }

    }

    public function auth()
    {
        return $this->hasOne(CustomerAuth::class);
    }



}

