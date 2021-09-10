<?php

namespace App\Http\Controllers\SystemSige;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\SystemSige\Paise; //Inluir o importar Modelo
use App\Models\SystemUsers\User; //Inluir o importar Modelo
use Auth;

class PaisPapeleraController extends Controller
{
    public function __construct()
    {
        $this->Middleware('auth');
        $this->middleware('isadmin'); // Verificación de usuarios Administradores
        //$this->middleware('user.status'); // Acivado o Suspendido
        //$this->middleware('user.permissions'); // Restricciones
    }

    public function index(Request $request)
    {
        return view('SystemSige.paises.papelera');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    // Recuperar = Mover a la Tabla
    public function destroy($id)
    {
        $pais = Paise::onlyTrashed()->where('id', $id)->first();

        if ($pais->restore()):
        
            $pais->user_recuperar_id = Auth::user()->id;
            $pais->save();

            $rows = DB::table('users_config')->get();
            foreach ($rows as $row) {
                $cant_recuperar = $row->cant_recuperar + 1;
            }
            $rows = DB::table('users_config')
                        ->update(['cant_recuperar' => $cant_recuperar]);

            $user_id = Auth::user()->id;
            $usuario = User::findorfail($user_id);
            $usuario->cant_recuperar = $usuario->cant_recuperar + 1;
            $usuario->save();

            return back()
                    ->with('message', 'Restaurado con éxito!!!.')
                    ->with('typealert', 'success');
        endif;
    }

    // Recuperar Multiples Seleccionados = Mover a la Tabla
    //public function paises_recuperarall(Request $request)
    public function restoreAll(Request $request)
    {
        $is_recupered = DB::table('localidades_paises')
                        ->whereIn('id', $request->input('ids'))
                        ->get();

        $rows = DB::table('users_config')->get();
        foreach ($rows as $row) {
            $cant_recuperar = $row->cant_recuperar;
        }

        foreach ($is_recupered as $is) {
            $pais = Paise::onlyTrashed()->where('id', $is->id)->first();

            if ($pais->restore()):

                $pais->user_recuperar_id = Auth::user()->id;
                $pais->save();

                $cant_recuperar = $cant_recuperar + 1;
                $rows = DB::table('users_config')
                            ->update(['cant_recuperar' => $cant_recuperar]);

                $user_id = Auth::user()->id;
                $usuario = User::findorfail($user_id);
                $usuario->cant_recuperar = $usuario->cant_recuperar + 1;
                $usuario->save();

            endif;
        }

        $data = $request->all();

        return response()->json($data); //{"ids":["6"]}
    }

}
