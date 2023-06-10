<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PerarEducationPersDvpmnt;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerarEducationPersDvpmntPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the perarEducationPersDvpmnt can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the perarEducationPersDvpmnt can view the model.
     */
    public function view(User $user, PerarEducationPersDvpmnt $model): bool
    {
        return true;
    }

    /**
     * Determine whether the perarEducationPersDvpmnt can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the perarEducationPersDvpmnt can update the model.
     */
    public function update(User $user, PerarEducationPersDvpmnt $model): bool
    {
        return true;
    }

    /**
     * Determine whether the perarEducationPersDvpmnt can delete the model.
     */
    public function delete(User $user, PerarEducationPersDvpmnt $model): bool
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
     * Determine whether the perarEducationPersDvpmnt can restore the model.
     */
    public function restore(User $user, PerarEducationPersDvpmnt $model): bool
    {
        return false;
    }

    /**
     * Determine whether the perarEducationPersDvpmnt can permanently delete the model.
     */
    public function forceDelete(
        User $user,
        PerarEducationPersDvpmnt $model
    ): bool {
        return false;
    }
}
