<?php

namespace App\Models\V1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMemberships extends Model
{

    protected $fillable = [
        "customer_id", "created_by", "expiry_date", "status"
    ];

    public function todaysAttendance(){
        return $this->hasOne(CustomerMembershipAttendance::class)->whereDate(
            "created_at" , Carbon::today()
        );
    }


    use HasFactory;
}
