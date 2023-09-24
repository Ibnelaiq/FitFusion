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
            "status" => 1
        ])->where("expiry_date",">",now());


        // return CustomerMemberships::where([
        //     "status" => 1,
        //     "customer_id" => $this->id
        // ])->where("expiry_date", ">", now())->first();
    }

    public function extendActiveMembership($days){

        $activeMembership = $this->activeSubscription;

        if($activeMembership){
            $newExpiry = Carbon::parse($activeMembership->expiry_date)->addDays($days);

            $activeMembership->expiry_date = $newExpiry;
            $activeMembership->save();

        }

    }



}

