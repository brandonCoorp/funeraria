<?php

namespace App\Policies;

use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $usera
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Usuario $usera)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Usuario $usera, Usuario $usuario,$permiso=null)
    {
        //
        if($user->verificarPermiso($permiso[0])){
            return true;
        }else if ($user->verificarPermiso($permiso[1])){
            return $usera->id == $usuario->id;
        }else{
            return false;
        }

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $usera
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Usuario $usera)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Usuario $usera, Usuario $usuario,$permiso=null)
    {
        //
        
        if($usera->verificarPermiso($permiso[0])){
            return true;
        }else if ($usera->verificarPermiso($permiso[1])){
            return $usera->id == $usuario->id;
        }else{
            return false;
        }

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Usuario $usera, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Usuario $usera, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $usera
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Usuario $usera, Usuario $usuario)
    {
        //
    }
}
