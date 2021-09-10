<div class="container-fluid mb-5">
    
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <i class="fas fa-trash"></i> {{ __('Papelera Países') }}
                        </div>
                        <div class="col d-flex justify-content-end">
                            <nav>
                                <!-- SEARCH FORM -->
                                @if ($papelera_paises_total > 0 || $search)
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
                            @if ($papelera_paises_total > 0)
                                <a href="{{ route('paises_papelera.restoreall') }}"
                                class="btn btn-light btn-sm mr-1 check_all">
                                <i class="fas fa-trash-restore-alt"></i>&nbsp;Recuperar seleccionados
                                </a>
                            @endif
                        </div>

                        <!-- Botón Filtros, Herramientas de búsqueda y Botón Limpiar -->
                        <div class="col-md-5 d-flex justify-content-end">

                            @if ($papelera_paises_total > 0)
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
                                        value="{{ $filtercodpai }}" type="search" placeholder="Filtrar codpai"
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
                                    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    </div> <!-- /. Opciones Herramientas de búsqueda -->

                    <div class="form-group row">
                        <div class="col-md-12">
                            <h6>
                                @if ($search)
                                    <div class="alert alert-info" role="alert">
                                        Total <b>({{ $papelera_paises_mostrar }})</b> resultado(s) para tu búsqueda de
                                        <b>{{ $search }}</b>,
                                        presione el boton <i class="fas fa-broom"></i>&nbsp;Limpiar para nueva
                                        búsqueda...
                                    </div>
                                @endif
                                @if ($filtercodpai || $filterpais || $filtersigla)
                                    <div class="alert alert-info" role="alert">
                                        Total <b>({{ $papelera_paises_mostrar }})</b> resultado(s) para tu filtro,
                                        presione el boton <i class="fas fa-broom"></i>&nbsp;Limpiar para un nuevo
                                        filtro...
                                    </div>
                                @endif
                            </h6>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">

                            @if ($papelera_paises_total > 0)
                            <div class="table-responsive">
                                <table class="table table-danger table-striped">
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
                                                Sigla
                                                @if ($sort == 'sigla_pais')
                                                    @if ($direction == 'asc')
                                                        <i class="fas fa-sort-alpha-up-alt"></i></th>
                                                    @else
                                                        <i class="fas fa-sort-alpha-down-alt"></i></th>
                                                    @endif
                                                @else
                                                    <i class="fas fa-sort"></i></th> <!--float-right mt-1-->
                                                @endif
                                            <th scope="col" width="20px" class="cursor-pointer text-center" wire:click="order('id')">
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
                                        @foreach ($papelera_paises as $papelera_pais)
                                            <tr>
                                                <td scope="row" width="5px" align="center">
                                                    <input type="checkbox" value="{{ $papelera_pais->id }}"
                                                    class="sub_check" data-id="{{ $papelera_pais->id }}">
                                                </td>
                                                <td scope="row" width="50px" class="text-center">{{ $papelera_pais->cod_pai }}</td>
                                                <td scope="row" width="100px" class="text-left">{{ $papelera_pais->name_pais }}</td>
                                                <td scope="row" width="50px" class="text-center">{{ $papelera_pais->sigla_pais }}</td>
                                                <td scope="row" width="50px" class="text-center">{{ $papelera_pais->id }}</td>
                                                <td scope="row" width="200px" class="text-left">

                                                    <button type="button" class="btn btn-light btn-sm"
                                                    wire:click="$emit('destroy_pais', {{ $papelera_pais->id }})">
                                                    <i class="fas fa-trash-restore-alt"></i>&nbsp;Recuperar</button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    Mostrando 1 a
                                    <span id="paises_mostrar" class="ml-1 mr-1">{{ $papelera_paises_mostrar }}</span> de
                                    <span id="paises_total" class="ml-1 mr-1">{{ $papelera_paises_total }}</span>
                                    registros
                                </div>
                                <div class="col-md-4">
                                    <div class="mx-auto"> <!-- float-right mr-3-->
                                        <span id="links">{{ $papelera_paises->links() }}</span>
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
                                        Papelera de países esta vacia...
                                    </div>
                                @endif
                            @endif

                            <h2 class="mt-5">Opciones:</h2>
                            <hr>

                            <!-- Opciones -->
                            <div class="row mt-4">
                                <div class="form-group col-md-12">
                                    <a href="{{ route('paises.index') }}">
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

</div>

<!-- scripts -->
@push('scriptsDestroyAll_Ordenar_Mostrar')
    <script>
    $(document).on('click', '#checkall', function() {
    //$('#checkall').on('click', function(e) {
        if($(this).prop("checked")) {
            $("input[type='checkbox']").prop("checked", true);
        } else {
            $("input[type='checkbox']").prop("checked", false);
        }
    });
    $(document).on('click', '.check_all', function(e) {
        e.preventDefault();
        deleteData = [];
        $('.table').find('input:checkbox[class="sub_check"]:checked').each(function() {
            deleteData.push(parseInt($(this).attr('data-id')));
        });
        if(deleteData.length <= 0) {
            swal("No hay ningun registro seleccionado!...", {
                icon: "warning",
                //buttons: true,
            });
            return;
        }
        $.ajax({
            url: $(this).attr('href'),
            type: 'DELETE',
            data: {
                ids: deleteData
            },
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                swal("Registros recuperados con éxito!!!.", {
                    icon: "success",
                    buttons: false,
                });
            },
            complete: function(data){
                $('#btnLimpiar').trigger('click');
                $("input[type='checkbox']").prop("checked", false);
            },
            error : function (xhr, textSatus, error){
                ///console.log('FAIL :: ', jqXRH.responseJSON);
            }
        })
        /*.done(function(data) {
            //console.log('DATA :: ', data);
            //$.getPaginateData(1);
            //swal('Recuperados con éxito!!!.');
            $('#btnLimpiar').trigger('click');
            //$("tbody").empty();
            //$("tbody").html(data);
            //$("tbody").append(data);
            $("input[type='checkbox']").prop("checked", false);
        })
        .fail((jqXHR, options, error) => {
            //console.log('FAIL :: ', jqXRH.responseJSON);
        })*/
    });
    $(document).on('click', '.empty_all', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            type: 'DELETE',
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            complete: function(data){
                $('#btnLimpiar').trigger('click');
            },
            error : function (xhr, textSatus, error){
                ///console.log('FAIL :: ', jqXRH.responseJSON);
            }
        })
        /*.done(function(data) {
            $('#btnLimpiar').trigger('click');
        })
        .fail((jqXHR, options, error) => {
            //console.log('FAIL :: ', jqXRH.responseJSON);
        })*/
    });
    $(document).on('click', '.restore_all', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            type: 'DELETE',
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            complete: function(data){
                setTimeout(location.reload(),3000);
            },
            error : function (xhr, textSatus, error){
                ///console.log('FAIL :: ', jqXRH.responseJSON);
            }
        })
        /*.done(function(data) {
            //$('#btnLimpiar').trigger('click');
            setTimeout(location.reload(),3000);
        })
        .fail((jqXHR, options, error) => {
            //console.log('FAIL :: ', jqXRH.responseJSON);
        })*/
    });


    $(function() {

        var filtercodpai = $('#filtercodpai').val();
        var filterpais = $('#filterpais').val();
        var filtersigla = $('#filtersigla').val();
        if (filtercodpai !== '' || filterpais !== '' || filtersigla !== '') {
            $('#btnFiltrar').trigger('click');
            $('#btnFiltrar').addClass('active');
        }
        
    });

    Livewire.on('alert', function(title, message){
        swal({
            title: title, // "Good job!"
            text: message,
            icon: "success",
        });
    });

    Livewire.on('destroy_pais', id => {
        swal({
            title: "¿Estas seguro que quieres recuperar esté registro?",
            text: "¡Una vez recuperado, podrás visualizarlo en la tabla de Países!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                Livewire.emitTo('system-sige.paises.papelera', 'destroy', id);
            } else {
                //swal("Your imaginary file is safe!");
                return;
            }
        });
    });

    </script>
@endpush
