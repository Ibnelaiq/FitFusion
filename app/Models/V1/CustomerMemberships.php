<?php

namespace App\Models\V1;

use Carbon\Carbon;
use DateTime;
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
        "customer_id", "created_by", "cancelled_at", "expiry_date", "status", "paused_at", "balance_days", "pausing_reason"
    ];

    public function todaysAttendance(){
        return $this->hasOne(CustomerMembershipAttendance::class)->whereDate(
            "created_at" , Carbon::today()
        );
    }

    public function pauseIfTodayPauseDate()
    {
        if($this->paused_at){
            $pausedAt = $this->paused_at instanceof Carbon ? $this->paused_at : Carbon::createFromFormat('Y-m-d', $this->paused_at);

            if ($pausedAt->isToday() && $this->status < 900) {

                $this->status = CustomerMemberships::STATUS_PAUSED;
                $this->save();
            }
        }
    }
    public function formattedExpiryDate(){
        return Carbon::parse($this->expiry_date)->format('F j, Y');
    }
    public function formattedCancelledDate(){
        return Carbon::parse($this->cancelled_at)->format('F j, Y');
    }


    public function calculateProgress()
    {
        if( in_array( $this->status, [self::STATUS_EXPIRED, self::STATUS_CANCELLED]))
            return -1;

        $expiryDate = Carbon::parse($this->expiry_date)->startOfDay();
        $createdAt = Carbon::parse($this->created_at)->startOfDay();

        $currentDate = ($this->status == self::STATUS_PAUSED ? $currentDate = Carbon::parse($this->paused_at) : Carbon::now())->startOfDay();

        $currentDate = $currentDate->between($createdAt, $expiryDate) ? $currentDate : $createdAt;

        // Calculate the progress in percentage
        $totalDuration = $expiryDate->diffInDays($createdAt);
        $elapsedDuration = $currentDate->diffInDays($createdAt);
        $progressPercentage = ($elapsedDuration / $totalDuration) * 100;

        return round($progressPercentage);
    }

    public function duration(){
        $expiryDate = Carbon::parse($this->expiry_date)->startOfDay();
        $createdAt = Carbon::parse($this->created_at)->startOfDay();

        $remainingTime = $createdAt->diff($expiryDate);

        $years = $remainingTime->y;
        $months = $remainingTime->m;
        $days = $remainingTime->d;

        $humanReadable = '';

        if ($years > 0) {
            $humanReadable .= $years . ' year' . ($years > 1 ? 's ' : ' ');
        }

        if ($months > 0) {
            $humanReadable .= $months . ' month' . ($months > 1 ? 's ' : ' ');
        }

        if ($days > 0) {
            $humanReadable .= $days . ' day' . ($days > 1 ? 's ' : ' ');
        }

        return $humanReadable;
    }


    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case self::STATUS_ACTIVE:
                return '<span class="badge badge-sm bg-success"> Active </span>';
            case self::STATUS_INACTIVE:
                return '<span class="badge badge-sm bg-secondary"> Inactive </span>';
            case self::STATUS_EXPIRED:
                return '<span class="badge badge-sm bg-danger"> Expired </span>';
            case self::STATUS_PAUSED:
                return '<span class="badge badge-sm bg-warning"> Paused </span> <br> <small class="text-xs"> Balance Days: '. $this->balance_days .' </small> <br> <small class="text-xs"> Paused At: '. $this->paused_at .' </small>';
            case self::STATUS_CANCELLED:
                return '<span class="badge badge-sm bg-danger"> Cancelled </span>';
            default:
                return 'Unknown';
        }
    }


    use HasFactory;
}
