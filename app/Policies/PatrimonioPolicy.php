<?php

namespace App\Policies;

use App\Models\Patrimonio;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatrimonioPolicy
{
    use HandlesAuthorization;

    public function before(User $user, string $ability): bool|null
    {
        return $user->hasAnyRoles(['Administrador']);
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patrimonio  $patrimonio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Patrimonio $patrimonio)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patrimonio  $patrimonio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Patrimonio $patrimonio)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patrimonio  $patrimonio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Patrimonio $patrimonio)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patrimonio  $patrimonio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Patrimonio $patrimonio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patrimonio  $patrimonio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Patrimonio $patrimonio)
    {
        //
    }
}
