<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SocialNetwork;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialNetworkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the socialNetwork can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the socialNetwork can view the model.
     */
    public function view(User $user, SocialNetwork $model): bool
    {
        return true;
    }

    /**
     * Determine whether the socialNetwork can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the socialNetwork can update the model.
     */
    public function update(User $user, SocialNetwork $model): bool
    {
        return true;
    }

    /**
     * Determine whether the socialNetwork can delete the model.
     */
    public function delete(User $user, SocialNetwork $model): bool
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
     * Determine whether the socialNetwork can restore the model.
     */
    public function restore(User $user, SocialNetwork $model): bool
    {
        return false;
    }

    /**
     * Determine whether the socialNetwork can permanently delete the model.
     */
    public function forceDelete(User $user, SocialNetwork $model): bool
    {
        return false;
    }
}
