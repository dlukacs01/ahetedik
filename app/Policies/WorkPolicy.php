<?php

namespace App\Policies;

use App\User;
use App\Work;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Work  $work
     * @return mixed
     */
    public function view(User $user, Work $work)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //

        // if the one making the request is the logged in user
        return $user->is($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Work  $work
     * @return mixed
     */
    public function update(User $user, Work $work)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Work  $work
     * @return mixed
     */
    public function delete(User $user, Work $work)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Work  $work
     * @return mixed
     */
    public function restore(User $user, Work $work)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Work  $work
     * @return mixed
     */
    public function forceDelete(User $user, Work $work)
    {
        //
    }
}
