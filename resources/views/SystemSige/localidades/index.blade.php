@extends('layouts.appSystemSige')

@section('title', ' | Localidades')
@section('description', ' | Localidades')

<!-- styles -->
@section('styles')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
    <a href="{{ url('sige/localidades') }}"><i class="far fa-folder"></i>&nbsp;Localidades</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Container (Options Section) -->

                    <!-- Inicio body -->
                    <div class="card-body">

                        <div class="row slideanim text-center">
                            <div class="col card">
                                <a href="{{ url('sige/paises') }}">
                                    <span class="fas fa-globe-americas"></span>
                                    <h4>País</h4>
                                    <p>Seleccione esta opción para ver el CRUD de Países ...</p>
                                </a>
                            </div>
                        </div>

                    </div> <!-- Fin body -->

                </div> <!-- Fin Container (Options Section) -->
            </div>
        </div>
    </div>
@endsection

<!-- scripts -->
@push('scripts')

@endpush
