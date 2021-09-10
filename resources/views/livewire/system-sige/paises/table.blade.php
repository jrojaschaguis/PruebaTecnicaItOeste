<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <i class="fas fa-map-marked-alt"></i> {{ __('Países') }}
                    </div>
                    <div class="col d-flex justify-content-end">
                        <nav>
                            <!-- SEARCH FORM -->
                            @if ($paises_total > 0 || $search)
                                <div class="form-inline ml-3">
                                    <div class="input-group input-group-sm">
                                        <input  name="search" type="text" wire:model.lazy="search"
                                        class="form-control form-control-navbar" 
                                        placeholder="Buscar" aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-navbar" type="button">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div> <!-- FIN SEARCH FORM -->
                            @endif
                        </nav>

                        <!-- Botón Limpiar -->
                        <a href="">
                        <button type="button" id="btnLimpiar" class="btn btn-light btn-sm">
                        <i class="fas fa-broom"></i>&nbsp;Limpiar</button>
                        </a> <!-- /. Botón Limpiar -->
                        
                    </div>
                </div>
            </div>

            <!-- Inicio body -->
            <div class="card-body">

                <div class="form-group row">
                    <div class="col-md-7">
                        <!--<a href="{{-- URL::action('SystemSige\PaisController@create') --}}">
                        <button type="button" class="btn btn-light btn-sm mr-1">
                        <i class="fas fa-plus-circle"></i>&nbsp;Agregar</button>
                        </a>-->

                        <button type="button" class="btn btn-light btn-sm mr-1" wire:click="create">
                        <i class="fas fa-plus-circle"></i>&nbsp;Agregar</button>

                        @if ($paises_total > 0)
                            <a href="{{ route('paises.destroyall') }}"
                            class="btn btn-light btn-sm mr-1 check_all">
                            <i class="far fa-trash-alt"></i>&nbsp;Eliminar seleccionados
                            </a>
                        @endif

                        <a href="{{ url('sige/paises_papelera') }}">
                        <button type="button" class="btn btn-light btn-sm mr-1">
                        <i class="fas fa-trash"></i>&nbsp;Papelera</button>
                        </a>

                        @if ($paises_total > 0)
                            <!--<a href="#">
                            <button type="button" class="btn btn-light btn-sm mr-1">
                            <i class="far fa-file-pdf"></i>&nbsp;Imprimir PDF</button>
                            </a>

                            <a href="#">
                            <button type="button" class="btn btn-light btn-sm mr-1">
                            <i class="fas fa-file-excel"></i>&nbsp;Exportar Excel</button>
                            </a>-->

                            <!--<button type="button" class="btn btn-light btn-sm mr-1">
                            <i class="fas fa-file-csv"></i>&nbsp;Exportar CSV</button>
                            
                            <button type="button" class="btn btn-light btn-sm mr-1">
                            <i class="fas fa-file-export"></i>&nbsp;Exportar TXT</button>-->
                        @endif

                        <!--<a href="{{ url('Administrador') }}">
                        <button type="button" class="btn btn-light btn-sm mr-1">
                        <i class="fas fa-door-closed"></i>&nbsp;Cerrar y salir</button>
                        </a>-->
                    </div>

                    <!-- Botón Filtros, Herramientas de búsqueda y Botón Limpiar -->
                    <div class="col-md-5 d-flex justify-content-end">

                        @if ($paises_total > 0)
                            <!--Botón Herramientas de búsqueda -->
                            <!--<a href="#" id="btn_search">
                                <button type="button" class="btn btn-light btn-sm mr-2" data-toggle="collapse"
                                    data-target="#opciones_buscar">
                                    <i class="fas fa-search"></i>&nbsp;Herramientas de búsqueda</button></a>-->

                            <!-- Botón Filtros -->
                            <!--<div class="dropdown mr-2">
                                <button type="button" class="btn btn-light btn-sm dropdown-toggle"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-filter"></i> Filtrar Estatus</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><i class="fas fa-stream"></i> Todos</a>-->
                                    <!--<a class="dropdown-item" href="#"><i class="fas fa-unlink"></i> Registrado No Verificado</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-user-check"></i> Verificado por correo</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-heart-broken"></i> Suspendido o Baneado</a>-->
                                <!--</div>
                            </div>-->
                        @endif

                    </div> <!-- Fin Botón Filtros, Herramientas de búsqueda y Botón Limpiar -->

                </div>

                <!-- Opciones Herramientas de búsqueda -->
                <div id="opciones_buscar" class="row col-lg-12 mt-4 mb-4 collapse">
                    <div>
                        <div class="row">
                            <div class="col">
                                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese texto a buscar']) !!}
                            </div>
                            <div class="col">
                                <input class="form-control" id="filtercodpai" name="filtercodpai"
                                    value="{{ $filtercodpai }}" type="search" placeholder="Filtrar codpait"
                                    aria-label="Filtrar codpai">
                            </div>
                            <div class="col">
                                <input class="form-control" id="filterpais" name="filterpais"
                                    value="{{ $filterpais }}" type="search" placeholder="Filtrar país"
                                    aria-label="Filtrar país">
                            </div>
                            <div class="col">
                                <input class="form-control" id="filtersigla" name="filtersigla"
                                    value="{{ $filtersigla }}" type="search" placeholder="Filtrar sigla"
                                    aria-label="Filtrar sigla">
                            </div>
                            <div class="col">
                                {!! Form::select('filter', ['0' => 'Código', '1' => 'País', '2' => 'Siglas'], 0, ['class' => 'form-control form-select']) !!}
                            </div>
                            <div class="col">
                                {!! Form::select('status', ['0' => 'Borrador', '1' => 'Publico'], 0, ['class' => 'form-control form-select']) !!}
                            </div>
                            <div class="col">
                                {!! Form::button('Buscar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div> <!-- /. Opciones Herramientas de búsqueda -->

                <div class="form-group row">
                    <div class="col-md-12">
                        <h6>
                            @if ($search)
                                <div class="alert alert-info" role="alert">
                                    Total <b>({{ $paises_mostrar }})</b> resultado(s) para tu búsqueda de
                                    <b>{{ $search }}</b>,
                                    presione el boton <i class="fas fa-broom"></i>&nbsp;Limpiar para nueva
                                    búsqueda...
                                </div>
                            @endif
                            @if ($filtercodpai || $filterpais || $filtersigla)
                                <div class="alert alert-info" role="alert">
                                    Total <b>({{ $paises_mostrar }})</b> resultado(s) para tu filtro,
                                    presione el boton <i class="fas fa-broom"></i>&nbsp;Limpiar para un nuevo
                                    filtro...
                                </div>
                            @endif
                        </h6>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">

                        @if ($paises_total > 0)
                        <div class="table-responsive">
                            <table class="table table-primary table-striped table-hover"> <!-- table-primary table-striped -->
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" style="text-align: center;" align="center"><input type="checkbox" id="checkall"></th>
                                        <th scope="col" class="cursor-pointer text-center" wire:click="order('cod_pai')">
                                            Código
                                            @if ($sort == 'cod_pai')
                                                @if ($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt"></i></th>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt"></i></th>
                                                @endif
                                            @else
                                                <i class="fas fa-sort"></i></th> <!--float-right mt-1-->
                                            @endif
                                        <th scope="col" class="cursor-pointer text-left" wire:click="order('name_pais')">
                                            País
                                            @if ($sort == 'name_pais')
                                                @if ($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt"></i></th>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt"></i></th>
                                                @endif
                                            @else
                                                <i class="fas fa-sort"></i></th> <!--float-right mt-1-->
                                            @endif
                                        <th scope="col" class="cursor-pointer text-center" wire:click="order('sigla_pais')">
                                            Siglas
                                            @if ($sort == 'sigla_pais')
                                                @if ($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt"></i></th>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt"></i></th>
                                                @endif
                                            @else
                                                <i class="fas fa-sort"></i></th> <!--float-right mt-1-->
                                            @endif
                                        <th scope="col" class="cursor-pointer text-center" wire:click="order('id')">
                                            ID
                                            @if ($sort == 'id')
                                                @if ($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt"></i></th>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt"></i></th>
                                                @endif
                                            @else
                                                <i class="fas fa-sort"></i></th> <!--float-right mt-1-->
                                            @endif
                                        <th scope="col" class="text-left">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paises as $pais)
                                        <tr>
                                            <td scope="row" width="5px" align="center">
                                                <input type="checkbox" value="{{ $pais->id }}"
                                                class="sub_check" data-id="{{ $pais->id }}">
                                            </td>
                                            <td scope="row" width="50px" class="text-center">{{ $pais->cod_pai }}</td>
                                            <td scope="row" width="100px" class="text-left">{{ $pais->name_pais }}</td>
                                            <td scope="row" width="50px" class="text-center">{{ $pais->sigla_pais }}</td>
                                            <td scope="row" width="50px" class="text-center">{{ $pais->id }}</td>
                                            <td scope="row" width="200px" class="text-left">

                                                <button type="button" class="btn btn-light btn-sm mr-1" wire:click="show({{ $pais->id }})">
                                                <i class="far fa-eye"></i>&nbsp;Ver</button>

                                                <button type="button" class="btn btn-light btn-sm mr-1" wire:click="edit({{ $pais->id }})">
                                                <i class="far fa-edit"></i>&nbsp;Editar</button>

                                                <button type="button" class="btn btn-light btn-sm"
                                                wire:click="$emit('destroy_pais', {{ $pais->id }})">
                                                <i class="far fa-trash-alt"></i>&nbsp;Eliminar</button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                Mostrando 1 a
                                <span id="paises_mostrar" class="ml-1 mr-1">{{ $paises_mostrar }}</span> de
                                <span id="paises_total" class="ml-1 mr-1">{{ $paises_total }}</span> registros
                            </div>
                            <div class="col-md-4">
                                <div class="mx-auto"> <!-- float-right mr-3-->
                                    <span id="links">{{ $paises->links() }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex float-right">
                                    {!! Form::label('mostrar', 'Mostrar&nbsp;&nbsp;', ['class' => 'col-form-label text-md-right']) !!}
                                    {!! Form::select(
                                        'mostrar_registros',
                                        [
                                            '5' => '5',
                                            '10' => '10',
                                            '25' => '25',
                                            '50' => '50',
                                            '100' => '100',
                                        ],
                                        null,
                                        ['id' => 'selectMostrarRegistros', 'class' => 'form-select-sm', 'wire:model' => 'mostrar_registros'],
                                    ) !!}
                                    {!! Form::label('registros', '&nbsp;&nbsp;registros', ['class' => 'col-form-label text-md-left']) !!}
                                </div>
                            </div>
                        </div>

                        @else
                            @if (!$search)
                                <!--<div class="alert alert-warning" role="alert">-->
                                <div class="text-warning">
                                    Tabla de Países vacia...
                                </div>
                            @endif
                        @endif

                        <h2 class="mt-5">Opciones:</h2>
                        <hr>

                        <!-- Opciones -->
                        <div class="row mt-4">
                            <div class="form-group col-md-12">
                                <a href="{{ url('sige/localidades') }}">
                                <button type="button" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-circle-left"></i>&nbsp;Regresar</button>
                                </a>
                            </div>
                        </div><!-- Fin Opciones -->

                    </div>
                </div>

            </div> <!-- Fin body -->

        </div>

    </div>
</div>

