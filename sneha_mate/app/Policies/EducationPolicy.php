<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Education;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the education can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the education can view the model.
     */
    public function view(User $user, Education $model): bool
    {
        return true;
    }

    /**
     * Determine whether the education can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the education can update the model.
     */
    public function update(User $user, Education $model): bool
    {
        return true;
    }

    /**
     * Determine whether the education can delete the model.
     */
    public function delete(User $user, Education $model): bool
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
     * Determine whether the education can restore the model.
     */
    public function restore(User $user, Education $model): bool
    {
        return false;
    }

    /**
     * Determine whether the education can permanently delete the model.
     */
    public function forceDelete(User $user, Education $model): bool
    {
        return false;
    }
}
