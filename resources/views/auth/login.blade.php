@extends('layouts.app')

@section('content')
<div class="styl-login rsp-login"> <!-- container -->
    <div class="row justify-content-center styl-row-login rsp-row-login">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header"><i class="fas fa-fingerprint"></i> <strong>{{ __('Iniciar sesión') }}</strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
                            <div class="input-group mb-3 col-md-6">
                                <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Escribe tu correo electrónico"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                            <div class="input-group mb-3 col-md-6">
                                <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Escribe tu contraseña"
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

                        <div class="form-group row offset-md-4">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox"
                                    class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary btn-sm btn-block">
                                <i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Iniciar sesión') }}</button>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">

                                <!--<button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Iniciar sesión') }}</button>-->

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña? - Restablecer la contraseña') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mt-3 justify-content-center">

                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary btn-sm btn-facebook">
                                <img src="{{ url('/cms/img/icon/facebook-white.png') }}" alt="">
                                Iniciar sesión con Facebook</button>
                            </div>

                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary btn-sm btn-twitter">
                                <img src="{{ url('/cms/img/icon/twitter-white.png') }}" alt="">
                                Iniciar sesión con Twitter</button>
                            </div>

                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary btn-sm btn-google">
                                <img src="{{ url('/cms/img/icon/google-white.png') }}" alt="">
                                Iniciar sesión con Google</button>
                            </div>

                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
