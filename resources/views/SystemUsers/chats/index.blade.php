@extends('layouts.app')

@section('title', ' | Chats')
@section('description', ' | Chats')

<!-- styles -->
@section('styles')
    @livewireStyles
@endsection

@section('content')
    <div class="container-fluid">

        <!-- // Chats -->
        <div class="form-group mt-3" style="text-align: center;">
                <h1>LiveChats with LiveWire + Pusher</h1>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><i class="far fa-comment-alt"></i> {{ __('Chats') }}</div>

                    <div class="card-body">

                        <!--<h5 class="pb-0 mb0"><strong>Live Chat with</strong></h5>
                        <h3 class="pb-0 mb0"><strong>Laravel7 + LiveWire + Pusher</strong></h3>-->

                        @livewire("chat-form")
                        @livewire("chat-list")
                        {{-- <livewire:chat-form></livewire:chat-form> --}}
                        {{-- <livewire:chat-form/> --}}
                        {{-- <livewire:chat-form></livewire:chat-form> --}}
                        {{--     '' =>'', --}}
                        {{-- ]) --}}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<!-- scripts -->
@push('scripts')
    <script>
    // Esto lo recibimos en JS cuando lo emite el componente
    // El evento mensajeEnviado
    window.livewire.on('mensajeEnviado', function(){
        // Mostramos el loaderEnviadoMensaje
        $('.loaderEnviadoMensaje').fadeIn('slow');
        // Ocultamos el loaderEnviadoMensaje a los 3 segundos
        setTimeout(function(){ $('.loaderEnviadoMensaje').fadeOut('slow'); }, 3000);
    });
    </script>

    @livewireScripts
@endpush
