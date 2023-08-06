<?php

namespace App\Policies\V1;

use App\Models\V1\CustomerMemberships;
use App\Models\V1\User;
use Illuminate\Auth\Access\Response;

class CustomerMembershipsPolicy
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
    public function view(User $user, CustomerMemberships $customerMemberships): bool
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
    public function update(User $user, CustomerMemberships $customerMemberships): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CustomerMemberships $customerMemberships): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CustomerMemberships $customerMemberships): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CustomerMemberships $customerMemberships): bool
    {
        //
    }
}
