<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserAdminController extends Controller
{
    public function store(User $usuario)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        /**
         * El usuario no se borra, se desactiva
         * Si se desactiva el usuario, también hay que desactivar al jugador
         */

        $usuario->hacerAdmin();

        return back();
    }


    public function destroy(User $usuario)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        /**
         * El usuario no se borra, se desactiva
         * Si se desactiva el usuario, también hay que desactivar al jugador
         */

        $usuario->hacerAdmin(false);

        return back();
    }
}
