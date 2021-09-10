@extends('layouts.appSystemSige')

@section('title', ' | Localidades | Papelera Países')
@section('description', ' | Localidades | Papelera Países')

<!-- styles -->
@section('styles')
    @livewireStyles
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
    <a href="{{ url('agenda/localidades') }}"><i class="far fa-folder"></i>&nbsp;Localidades</a>
    </li>
    <li class="breadcrumb-item">
    <a href="{{ url('sige/paises') }}"><i class="fas fa-map-marked-alt"></i>&nbsp;Países</a>
    </li>
    <li class="breadcrumb-item">
    <a href="{{ url('sige/paises_papelera') }}"><i class="fas fa-trash"></i>&nbsp;Papelera Países</a>
    </li>
@endsection

@section('content')
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <!-- Componente LiveWire TablePapelera -->
    @livewire("system-sige.paises.papelera")
@endsection

<!-- scripts -->
@push('scripts')
    @livewireScripts
@endpush
