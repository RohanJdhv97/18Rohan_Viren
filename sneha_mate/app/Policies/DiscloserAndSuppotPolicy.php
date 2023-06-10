<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DiscloserAndSuppot;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscloserAndSuppotPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the discloserAndSuppot can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the discloserAndSuppot can view the model.
     */
    public function view(User $user, DiscloserAndSuppot $model): bool
    {
        return true;
    }

    /**
     * Determine whether the discloserAndSuppot can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the discloserAndSuppot can update the model.
     */
    public function update(User $user, DiscloserAndSuppot $model): bool
    {
        return true;
    }

    /**
     * Determine whether the discloserAndSuppot can delete the model.
     */
    public function delete(User $user, DiscloserAndSuppot $model): bool
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
     * Determine whether the discloserAndSuppot can restore the model.
     */
    public function restore(User $user, DiscloserAndSuppot $model): bool
    {
        return false;
    }

    /**
     * Determine whether the discloserAndSuppot can permanently delete the model.
     */
    public function forceDelete(User $user, DiscloserAndSuppot $model): bool
    {
        return false;
    }
}
