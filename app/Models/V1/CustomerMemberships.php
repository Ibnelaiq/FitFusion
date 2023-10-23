<?php

namespace App\Models\V1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMemberships extends Model
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_EXPIRED = 950;
    const STATUS_PAUSED = 901;
    const STATUS_CANCELLED = 999;
    protected $fillable = [
        "customer_id", "created_by", "expiry_date", "status", "paused_at", "balance_days", "pausing_reason"
    ];

    public function todaysAttendance(){
        return $this->hasOne(CustomerMembershipAttendance::class)->whereDate(
            "created_at" , Carbon::today()
        );
    }

    public function checkPauseStatus()
    {

        $pausedAt = $this->paused_at instanceof Carbon ? $this->paused_at : Carbon::createFromFormat('Y-m-d', $this->paused_at);

        if ($pausedAt->isToday() && $this->status < 900) {

            $this->status = CustomerMemberships::STATUS_PAUSED;
            $this->save();
        }
    }

    public function getStatus()
    {
        switch ($this->status) {
            case self::STATUS_ACTIVE:
                return 'Active';
            case self::STATUS_INACTIVE:
                return 'Inactive';
            case self::STATUS_EXPIRED:
                return 'Expired';
            case self::STATUS_PAUSED:
                return 'Paused <br> <small class="text-xs"> Balance Days: '. $this->balance_days .' </small> <br> <small class="text-xs"> Paused At: '. $this->paused_at .' </small>';
            case self::STATUS_CANCELLED:
                return 'Cancelled';
            default:
                return 'Unknown';
        }
    }


    use HasFactory;
}
