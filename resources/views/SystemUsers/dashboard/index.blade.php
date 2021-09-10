@extends('layouts.appSystemUsers')

@section('title', ' | Usuarios')
@section('description', ' | Usuarios')

<!-- styles -->
@section('styles')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header"><i class="fas fa-tachometer-alt"></i> {{ __('Tablero') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Estás conectado!') }}
                    </div>

                </div>
                
            </div>
        </div>
    </div>
@endsection

<!-- scripts -->
@push('scripts')

@endpush
