<?php

namespace App\Http\Controllers\SystemSige;

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
        return view('SystemSige.dashboard.index');
    }

    public function getLocalidades()
    {
        return view('SystemSige.localidades.index');
    }
}
