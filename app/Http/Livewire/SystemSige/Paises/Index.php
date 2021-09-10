<?php

namespace App\Http\Livewire\SystemSige\Paises;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\DB;
use App\Models\SystemSige\Paise; //Inluir o importar Modelo
use App\Models\SystemUsers\User; //Inluir o importar Modelo
use Auth;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Definir variables public properties
    public $action;

    public $search;
    public $sort;
    public $direction;
    public $filtercodpai;
    public $filterpais;
    public $filtersigla;
    public $mostrar_registros;

    public $pais_ver;

    public $id_paise;
    public $cod_pai;
    public $name_pais;
    public $sigla_pais;

    protected $listeners = ['destroy'];

    // Inicializar Variables al cargar el componente
    public function mount() 
    {
        $this->action = "Table";

        $this->search = "";
        $this->sort = "id";
        $this->direction = "asc";
        $this->filtercodpai = "";
        $this->filterpais = "";
        $this->filtersigla = "";
        $this->mostrar_registros = 5;

        $this->pais_ver = "";

        $this->id_paise = "";
        $this->cod_pai = "";
        $this->name_pais = "";
        $this->sigla_pais = "";        
    }

    public function render()
    {
        $query = trim($this->search);
        $sort = trim($this->sort);
        $direction = trim($this->direction);
        $filtercodpai = trim($this->filtercodpai);
        $filterpais = trim($this->filterpais);
        $filtersigla = trim($this->filtersigla);
        $mostrar_registros = trim($this->mostrar_registros);

        $paises = Paise::where('cod_pai', 'LIKE', '%' . $query . '%')
                    ->orWhere('name_pais', 'LIKE', '%' . $query . '%')
                    ->orWhere('sigla_pais', 'LIKE', '%' . $query . '%')
                    ->where('cod_pai', 'LIKE', '%' . $filtercodpai . '%')
                    ->where('name_pais', 'LIKE', '%' . $filterpais . '%')
                    ->where('sigla_pais', 'LIKE', '%' . $filtersigla . '%')
                    ->orderBy($sort, $direction)
                    ->paginate($mostrar_registros);
        
        $paises_mostrar =  $paises->count();
        $paises_total =  Paise::count();

        $data = [
            'paises' => $paises,
            'search' => $query,
            'sort' => $sort,
            'direction' => $direction,
            'filtercodpai' => $filtercodpai,
            'filterpais' => $filterpais,
            'filtersigla' => $filtersigla,
            'mostrar_registros' => $mostrar_registros,
            'paises_mostrar' => $paises_mostrar,
            'paises_total' => $paises_total,
        ];

        return view('livewire.system-sige.paises.index', $data);
    }

    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'asc') {
                $this->direction = 'desc';
            } else {
                $this->direction = 'asc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        
    }

    public function cerrar($action)
    {
        //$this->reset(['cod_pai', 'name_pais', 'sigla_pais']);

        $this->action = $action;
    }

    public function create()
    {
        $this->id_paise = "";
        $this->cod_pai = "";
        $this->name_pais = "";
        $this->sigla_pais = "";

        $this->action = "Create";
    }

    public function store()
    {
        $rules = [
            'cod_pai' => 'required',
            'name_pais' => 'required',
            'sigla_pais' => 'required',
        ];
        $messages = [
            'cod_pai.required' => 'Se requiere de un código de país.',
            'name_pais.required' => 'Se requiere de un nombre de país.',
            'sigla_pais.required' => 'Se requiere de una sigla de país.',
        ];
        
        $this->validate($rules, $messages);

        $info = Paise::create([
            'cod_pai' => $this->cod_pai,
            'name_pais' => $this->name_pais,
            'sigla_pais' => $this->sigla_pais,
            'user_create_id' => Auth::user()->id,
        ]);

        if($info):
            $rows = DB::table('users_config')->get();
            foreach ($rows as $row) {
                $cant_create = $row->cant_create + 1;
            }
            $rows = DB::table('users_config')
                        ->update(['cant_create' => $cant_create]);

            $user_id = Auth::user()->id;
            $usuario = User::findorfail($user_id);
            $usuario->cant_create = $usuario->cant_create + 1;
            $usuario->save();

            $this->emit('alert', 'Agregar País', '¡Registro agregado con éxito!...');

            $this->action = "Table";
        endif;
    }

    public function show($id)
    {
        $this->pais_ver = Paise::findorfail($id);

        $this->action = "Show";
    }

    public function edit($id)
    {
        $pais_edit = Paise::findorfail($id);
        $this->id_paise = $pais_edit->id;
        $this->cod_pai = $pais_edit->cod_pai;
        $this->name_pais = $pais_edit->name_pais;
        $this->sigla_pais = $pais_edit->sigla_pais;

        $rules = [
            'cod_pai' => 'required',
            'name_pais' => 'required',
            'sigla_pais' => 'required',
        ];
        $messages = [
            'cod_pai.required' => 'Se requiere de un código de país.',
            'name_pais.required' => 'Se requiere de un nombre de país.',
            'sigla_pais.required' => 'Se requiere de una sigla de país.',
        ];
        
        $this->validate($rules, $messages);

        $this->action = "Edit";
    }

    public function update($id)
    {
        $rules = [
            'cod_pai' => 'required',
            'name_pais' => 'required',
            'sigla_pais' => 'required',
        ];
        $messages = [
            'cod_pai.required' => 'Se requiere de un código de país.',
            'name_pais.required' => 'Se requiere de un nombre de país.',
            'sigla_pais.required' => 'Se requiere de una sigla de país.',
        ];
        
        $this->validate($rules, $messages);

        $pais = Paise::findorfail($id);

        $info = $pais->update([
            'cod_pai' => $this->cod_pai,
            'name_pais' => $this->name_pais,
            'sigla_pais' => $this->sigla_pais,
            'user_update_id' => Auth::user()->id,
        ]);

        if($info):
            $rows = DB::table('users_config')->get();
            foreach ($rows as $row) {
                $cant_update = $row->cant_update + 1;
            }
            $rows = DB::table('users_config')
                        ->update(['cant_update' => $cant_update]);

            $user_id = Auth::user()->id;
            $usuario = User::findorfail($user_id);
            $usuario->cant_update = $usuario->cant_update + 1;
            $usuario->save();

            $this->emit('alert', 'Actualizar País', '¡Registro actualizado con éxito!...');

            $this->action = "Table";
        endif;
    }

    public function destroy($id)
    {
        $pais = Paise::findorfail($id);
        $pais->user_delete_id = Auth::user()->id;
        $pais->save();

        if ($pais->delete()):

            $rows = DB::table('users_config')->get();
            foreach ($rows as $row) {
                $cant_delete = $row->cant_delete + 1;
            }
            $rows = DB::table('users_config')
                        ->update(['cant_delete' => $cant_delete]);

            $user_id = Auth::user()->id;
            $usuario = User::findorfail($user_id);
            $usuario->cant_delete = $usuario->cant_delete + 1;
            $usuario->save();
            
            $this->emit('alert', 'Eliminar País', '¡Registro eliminado con éxito!...');

            $this->action = "Table";

        endif;
    }

    public function destroyAll()
    {
        $this->action = "Table";
    }
    
}
