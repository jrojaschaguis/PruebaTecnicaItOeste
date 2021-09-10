<?php

namespace App\Http\Livewire\SystemSige\Paises;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\DB;
use App\Models\SystemSige\Paise; //Inluir o importar Modelo
use App\Models\SystemUsers\User; //Inluir o importar Modelo
use Auth;

class Papelera extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Definir Variables public properties
    //public $variable;
    public $search;
    public $sort;
    public $direction;
    public $filtercodpai;
    public $filterpais;
    public $filtersigla;
    public $mostrar_registros;

    protected $listeners = ['destroy'];

    // Inicializar Variables al cargar el componente
    public function mount() 
    {
        $this->search = "";
        $this->sort = "id";
        $this->direction = "asc";
        $this->filtercodpai = "";
        $this->filterpais = "";
        $this->filtersigla = "";
        $this->mostrar_registros = 5;
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

        $papelera_paises = Paise::onlyTrashed()
                    //->where('cod_pai', 'LIKE', '%' . $query . '%')
                    ->where('name_pais', 'LIKE', '%' . $query . '%')
                    //->where('sigla_pais', 'LIKE', '%' . $query . '%')
                    ->where('cod_pai', 'LIKE', '%' . $filtercodpai . '%')
                    ->where('name_pais', 'LIKE', '%' . $filterpais . '%')
                    ->where('sigla_pais', 'LIKE', '%' . $filtersigla . '%')
                    ->orderBy($sort, $direction)
                    ->paginate($mostrar_registros);

        $papelera_paises_mostrar =  $papelera_paises->count();
        $papelera_paises_total =  Paise::onlyTrashed()->count();

        $data = [
            'papelera_paises' => $papelera_paises,
            'search' => $query,
            'sort' => $sort,
            'direction' => $direction,            
            'filtercodpai' => $filtercodpai,
            'filterpais' => $filterpais,
            'filtersigla' => $filtersigla,
            'mostrar_registros' => $mostrar_registros,
            'papelera_paises_mostrar' => $papelera_paises_mostrar,
            'papelera_paises_total' => $papelera_paises_total,
        ];

        return view('livewire.system-sige.paises.papelera', $data);
        //return view('livewire.system-agenda.paises.pais', $data)->layout('layouts.base');
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

            $this->emit('alert', 'Recuperar País', '¡Registro recuperado con éxito!...');

        endif;
    }
    
    public function destroyAll()
    {
        //
    }

}
