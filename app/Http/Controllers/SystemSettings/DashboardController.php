<?php

namespace App\Http\Controllers\SystemSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin'); // Verificación de usuarios Administradores
        //$this->middleware('user.status'); // Acivado o Suspendido
        //$this->middleware('user.permissions'); // Restricciones
    }

    public function getDashboardIndex()
    {
        return view('SystemSettings.dashboard.index');
    }
}
