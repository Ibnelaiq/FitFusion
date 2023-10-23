<?php

namespace App\Policies;

use App\Models\User;
use App\Models\V1\FeaturedSlider;
use Illuminate\Auth\Access\Response;

class FeaturedSliderPolicy
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
    public function view(User $user, FeaturedSlider $featuredSlider): bool
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
    public function update(User $user, FeaturedSlider $featuredSlider): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FeaturedSlider $featuredSlider): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FeaturedSlider $featuredSlider): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FeaturedSlider $featuredSlider): bool
    {
        //
    }
}
