<?php

namespace App\Http\Controllers\SystemUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin'); // Verificación de usuarios Administradores
        //$this->middleware('user.status'); // Acivado o Suspendido
        //$this->middleware('user.permissions'); // Restricciones
    }

    public function getAccountIndex()
    {
        return view('SystemUsers.account.index');
    }
}
