<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\All_job;
use App\Models\User;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, All_job $allJob): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, All_job $allJob): bool
    {
        return $allJob->employer_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, All_job $allJob): bool
    {
        return $user->id === $allJob->employer_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, All_job $allJob): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, All_job $allJob): bool
    {
        return false;
    }
}
