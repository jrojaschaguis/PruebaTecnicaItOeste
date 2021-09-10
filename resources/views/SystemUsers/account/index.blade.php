@extends('layouts.app')

@section('title', ' | Perfil')
@section('description', ' | Perfil')

<!-- styles -->
@section('styles')

@endsection

@section('content')
    <div class="container-fluid">

        <!-- // Chats -->
        <div class="form-group mt-3" style="text-align: center;">
                <h1>Perfil del Usuario</h1>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><i class="fas fa-address-card"></i> {{ __('Perfil') }}</div>

                    <div class="card-body">

                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa delectus libero omnis! Fuga labore iste ullam magnam soluta beatae! Amet soluta culpa eum harum illum laudantium nihil vel aut voluptatum?

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<!-- scripts -->
@push('scripts')

@endpush
