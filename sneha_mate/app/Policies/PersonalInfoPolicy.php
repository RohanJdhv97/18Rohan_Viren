<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PersonalInfo;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonalInfoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the personalInfo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the personalInfo can view the model.
     */
    public function view(User $user, PersonalInfo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the personalInfo can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the personalInfo can update the model.
     */
    public function update(User $user, PersonalInfo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the personalInfo can delete the model.
     */
    public function delete(User $user, PersonalInfo $model): bool
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
     * Determine whether the personalInfo can restore the model.
     */
    public function restore(User $user, PersonalInfo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the personalInfo can permanently delete the model.
     */
    public function forceDelete(User $user, PersonalInfo $model): bool
    {
        return false;
    }
}
