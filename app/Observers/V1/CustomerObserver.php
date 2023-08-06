<?php

namespace App\Observers\V1;

use App\Models\V1\Customer;
use App\Models\V1\CustomerMemberships;
use Carbon\Carbon;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        CustomerMemberships::create([
            'customer_id' => $customer->id,
            'expiry_date' => Carbon::today()->addMonth(),
            'status'      => 1,
        ]);
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}
