<?php

namespace App\Policies;

use App\User;
use App\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the usuario.
     *
     * @param  \App\User  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function view(User $user, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can create usuarios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the usuario.
     *
     * @param  \App\User  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function update(Usuario $user)
    {
        return $user->cargo === "Gerente";
    }

    /**
     * Determine whether the user can delete the usuario.
     *
     * @param  \App\User  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function delete(User $user, Usuario $usuario)
    {
        //
    }
}
