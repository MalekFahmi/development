<?php

namespace App\Policies;

use App\Models\Succsess_Ratings;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SuccsessRatingsPolicy
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
    public function view(User $user, Succsess_Ratings $succsessRatings): bool
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
    public function update(User $user, Succsess_Ratings $succsessRatings): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Succsess_Ratings $succsessRatings): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Succsess_Ratings $succsessRatings): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Succsess_Ratings $succsessRatings): bool
    {
        return false;
    }
}
