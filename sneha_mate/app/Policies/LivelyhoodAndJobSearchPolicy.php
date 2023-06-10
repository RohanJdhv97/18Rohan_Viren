<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LivelyhoodAndJobSearch;
use Illuminate\Auth\Access\HandlesAuthorization;

class LivelyhoodAndJobSearchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the livelyhoodAndJobSearch can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the livelyhoodAndJobSearch can view the model.
     */
    public function view(User $user, LivelyhoodAndJobSearch $model): bool
    {
        return true;
    }

    /**
     * Determine whether the livelyhoodAndJobSearch can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the livelyhoodAndJobSearch can update the model.
     */
    public function update(User $user, LivelyhoodAndJobSearch $model): bool
    {
        return true;
    }

    /**
     * Determine whether the livelyhoodAndJobSearch can delete the model.
     */
    public function delete(User $user, LivelyhoodAndJobSearch $model): bool
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
     * Determine whether the livelyhoodAndJobSearch can restore the model.
     */
    public function restore(User $user, LivelyhoodAndJobSearch $model): bool
    {
        return false;
    }

    /**
     * Determine whether the livelyhoodAndJobSearch can permanently delete the model.
     */
    public function forceDelete(User $user, LivelyhoodAndJobSearch $model): bool
    {
        return false;
    }
}
