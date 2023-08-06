<?php

namespace App\Policies\V1;

use App\Models\V1\CustomerMembershipAttendance;
use App\Models\V1\User;
use Illuminate\Auth\Access\Response;

class CustomerMembershipAttendancePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CustomerMembershipAttendance $customerMembershipAttendance): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CustomerMembershipAttendance $customerMembershipAttendance): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CustomerMembershipAttendance $customerMembershipAttendance): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CustomerMembershipAttendance $customerMembershipAttendance): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CustomerMembershipAttendance $customerMembershipAttendance): bool
    {
        //
    }
}
