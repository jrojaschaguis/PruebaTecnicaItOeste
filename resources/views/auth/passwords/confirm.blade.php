@extends('layouts.app')

@section('content')
<div class="styl-confirm rsp-confirm">
    <div class="row justify-content-center styl-row-confirm rsp-row-confirm">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header"><strong>{{ __('Confirmar contraseña') }}<</strong>/div>

                <div class="card-body">
                    {{ __('Confirme su contraseña antes de continuar.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                            <div class="input-group col-md-6">
                                <input type="password" name="password" id="password"
                                placeholder="Escribe tu contraseña"
                                class="form-control @error('password') is-invalid @enderror"
                                required autocomplete="current-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirmar contraseña') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
