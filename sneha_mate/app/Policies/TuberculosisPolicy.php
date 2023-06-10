<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tuberculosis;
use Illuminate\Auth\Access\HandlesAuthorization;

class TuberculosisPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tuberculosis can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the tuberculosis can view the model.
     */
    public function view(User $user, Tuberculosis $model): bool
    {
        return true;
    }

    /**
     * Determine whether the tuberculosis can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the tuberculosis can update the model.
     */
    public function update(User $user, Tuberculosis $model): bool
    {
        return true;
    }

    /**
     * Determine whether the tuberculosis can delete the model.
     */
    public function delete(User $user, Tuberculosis $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the tuberculosis can restore the model.
     */
    public function restore(User $user, Tuberculosis $model): bool
    {
        return false;
    }

    /**
     * Determine whether the tuberculosis can permanently delete the model.
     */
    public function forceDelete(User $user, Tuberculosis $model): bool
    {
        return false;
    }
}
