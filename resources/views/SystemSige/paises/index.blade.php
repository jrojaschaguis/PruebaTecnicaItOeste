@extends('layouts.appSystemSige')

@section('title', ' | Localidades | Países')
@section('description', ' | Localidades | Países')

<!-- styles -->
@section('styles')
    @livewireStyles
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
    <a href="{{ url('sige/localidades') }}"><i class="far fa-folder"></i>&nbsp;Localidades</a>
    </li>
    <li class="breadcrumb-item">
    <a href="{{ url('sige/paises') }}"><i class="fas fa-map-marked-alt"></i>&nbsp;Países</a>
    </li>
@endsection

@section('content')
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <!-- Componente LiveWire Table -->
    @livewire("system-sige.paises.index")
@endsection

<!-- scripts -->
@push('scripts')
    @livewireScripts
@endpush
