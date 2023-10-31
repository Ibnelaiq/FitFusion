<?php

namespace App\Repositories;

use App\Models\V1\Customer;
use App\Models\V1\CustomerAuth;
use App\Models\V1\CustomerMemberships;
use Carbon\Carbon;

class CustomerMembershipRepository
{

    public function cancelMembership(CustomerMemberships $customerMembership) : bool {

        $customerMembership->update([
            "status" => CustomerMemberships::STATUS_CANCELLED
        ]);

        return true;

    }
    public function extendMembership(CustomerMemberships $customerMembership, int $daysToExtend) : bool {

        $expiryDate = Carbon::parse($customerMembership->expiry_date);

        // Add days to the expiry date
        $newExpiryDate = $expiryDate->addDays($daysToExtend);

        // Update the membership with the new expiry date
        $customerMembership->update([
            'expiry_date' => $newExpiryDate,
        ]);

        return true;
    }

    public function pauseMembership(CustomerMemberships $customerMembership, string $pause_date, string $pause_reason) : bool {



        $pauseDate = Carbon::createFromFormat('Y-m-d', $pause_date);

        $expiryDate = Carbon::createFromFormat('Y-m-d', $customerMembership->expiry_date);

        // Calculate balance_days
        $balanceDays = $expiryDate->diffInDays($pauseDate);

        $customerMembership->update([
            "paused_at" => $pause_date,
            "pausing_reason" => $pause_reason,
            "balance_days"   => $balanceDays
        ]);

        $customerMembership->pauseIfTodayPauseDate();


        return true;
    }

    public function resumeMembership(CustomerMemberships $customerMembership){

        $customerMembership->update([
            "status"=> CustomerMemberships::STATUS_CANCELLED
        ]);


        return $this->createMembership($customerMembership->customer, $customerMembership->balance_days);

    }

    public function createMembership(Customer $customer, int $daysToCreate) : bool {
        CustomerMemberships::create([
            'customer_id' => $customer->id,
            'expiry_date' => Carbon::today()->addDays($daysToCreate),
            'status'      => CustomerMemberships::STATUS_ACTIVE,
        ]);
        return true;
    }


}
