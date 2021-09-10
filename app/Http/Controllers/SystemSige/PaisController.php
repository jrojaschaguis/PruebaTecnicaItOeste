<?php

namespace App\Http\Controllers\SystemSige;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\SystemSige\Paise; //Inluir o importar Modelo
use App\Models\SystemUsers\User; //Inluir o importar Modelo
use Auth;
use Validator;

class PaisController extends Controller
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
        //$paises = Paise::all;
        //$paises = Paise::orderBy('id')->ge();
        //$paises = Paise::orderBy('name_pais')->get();
        //$paises = Paise::where('papelera', '=' , 0)
                        //->orderBy('name_pais')->get();
        //$paises = Paise::where('papelera', 0)
                        //->orderBy('name_pais', 'desc')->get();
        //$paises = Paise::where('papelera', 0)->where('sigla_pais', 'MX')
                        //->orderBy('name_pais', 'asc')->get();
        //$paises = Paise::where('papelera', 0)->orwhere('sigla_pais', 'MX')
                        //->orderBy('name_pais', 'asc')->get();
        //$paises = Paise::where('papelera', 0)
                        //->orderBy('name_pais', 'asc')->get();
        //$events = Event::get();
        //$events = Event::where('id')->first();
        //$events = Event::pluck('id', 'title', 'start', 'end', 'color');
        //$events = Event::select('id', 'title', 'start', 'end', 'color')->get();

        //$paises = Paise:pluck('name')->join(', ');

        return view('SystemSige.paises.index');
        
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

    // Eliminar = Mover a la Papelera
    public function destroy($id)
    {
        //
    }

    // Eliminar Multiples Seleccionados = Mover a la Papelera
    public function destroyAll(Request $request)
    {
        $is_deleted = DB::table('localidades_paises')
                        ->whereIn('id', $request->input('ids'))
                        ->get();

        $rows = DB::table('users_config')->get();
        foreach ($rows as $row) {
            //$cant_papelera = $row->cant_papelera;
            $cant_delete = $row->cant_delete;
        }

        foreach ($is_deleted as $is) {
            $pais = Paise::findorfail($is->id);
            //$pais->user_papelera_id = Auth::user()->id;
            $pais->user_delete_id = Auth::user()->id;
            //$pais->papelera = 1; // 0=Activo o Vacio | 1=Eliminado o Llena
            $pais->save();

            if ($pais->delete()):

                //$cant_papelera = $cant_papelera + 1;
                $cant_delete = $cant_delete + 1;
                $rows = DB::table('users_config')
                            //->update(['cant_papelera' => $cant_papelera]);
                            ->update(['cant_delete' => $cant_delete]);

                $user_id = Auth::user()->id;
                $usuario = User::findorfail($user_id);
                //$usuario->cant_papelera = $usuario->cant_papelera + 1;
                $usuario->cant_delete = $usuario->cant_delete + 1;
                $usuario->save();

            endif;
        }

        $data = $request->all();

        return response()->json($data);
    }

}
