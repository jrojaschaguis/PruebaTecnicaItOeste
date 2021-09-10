<!--
/*==============================================*/    
/* RESPONSIVE DESIGN PARA PANTALLAS MINIMIZADAS */
/*==============================================*/-->
<nav class="navbar navbar-expand-md navbar-dark shadow styl-navbar-aux1 rsp-navbar-aux1"> <!--navbar-light bg-primary shadow-sm-->
    <div class="container">
        <a class="navbar-brand styl-logo-aux1" href="{{ url('/') }}">
            <img src="{{ url('/cms/img/logo-cms.png') }}" alt="">
            <!--<span>{{ config('app.name', 'Laravel') }} | My Project v1.0.0 </span>-->
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-fingerprint"></i> <span>{{ __('Iniciar sesión') }}</span></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="far fa-user-circle"></i> <span>{{ __('Registrarse') }}</span></a>
                        </li>
                    @endif
                @else
                <li class="nav-item dropdown styl-dropdown-aux1 rsp-dropdown-aux1">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle styl-user-aux1 rsp-user-aux1" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-globe"></i> <span>Sistemas</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ url('/sige/dashboard') }}">
                                <i class="fas fa-industry"></i> Gestión Empresarial
                            </a>

                            <hr>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-question"></i> Ayuda
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-question"></i> Acerca de
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown styl-dropdown-aux1 rsp-dropdown-aux1">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle styl-user-aux1 rsp-user-aux1" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(is_null(Auth::user()->avatar))
                                <img src="{{ url('/cms/img/default_avatar.png') }}" alt="">
                            @else
                                <img src="{{ url('/uploads_users/'.Auth::user()->avatar_path.'/'.Auth::user()->avatar) }}" alt="">
                            @endif
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/settings/dashboard') }}">
                                <i class="fas fa-cogs"></i> Configuraciones
                            </a>
                            <a class="dropdown-item" href="{{ url('/users/dashboard') }}">
                                <i class="fas fa-users-cog"></i> Usuarios
                            </a>

                            <hr>
                            <a class="dropdown-item" href="{{ url('/users/account') }}">
                                <i class="fas fa-address-card"></i> Editar perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-question"></i> Soporte técnico
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-question"></i> Soporte usuarios
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-sticky-note"></i> Notas
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-comment"></i> Comentarios
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-comment-alt"></i> Chats
                            </a>

                            <hr>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form-nav2').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar sesión') }}
                            </a>
                            <form id="logout-form-nav2" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-md navbar-dark shadow styl-navbar-aux2 rsp-navbar-aux2"> <!--navbar-light bg-primary shadow-sm-->
    <div> <!--  class="container" -->
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav"> <!-- class="navbar-nav ml-auto" -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> <span>Inicio</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-id-card-alt"></i> <span>¿Quienes somos?</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-envelope-open"></i> <span>Contactanos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-newspaper"></i> <span>Blog</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-store-alt"></i> <span>Tienda</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-shopping-cart"></i> <span>Carrito</span></a>
            </li>
        </ul>
    </div>
</nav>

<!--
/*==============================================*/
/* PANTALLAS NORMALES - NAVEGADORES WEB         */
/*==============================================*/
/* RESPONSIVE DESIGN PARA DISPOSITIVOS MOVILES  */
/*==============================================*/-->
<nav class="navbar navbar-expand-md navbar-dark shadow styl-navbar rsp-navbar"> <!--navbar-light bg-primary shadow-sm-->
    <div class="container">
    
        <a class="navbar-brand styl-logo" href="{{ url('/') }}">
            <img src="{{ url('/cms/img/logo-cms.png') }}" alt="">
            <!--<span>{{ config('app.name', 'Laravel') }} | My Project v1.0.0 </span>-->
        </a>

        <button class="navbar-toggler" type="button"
            data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <!--<span class="navbar-toggler-icon"></span>-->
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> <span>Inicio</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-id-card-alt"></i> <span>¿Quienes somos?</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-envelope-open"></i> <span>Contactanos</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-newspaper"></i> <span>Blog</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-store-alt"></i> <span>Tienda</span></a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-shopping-cart"></i> <span>Carrito</span></a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-fingerprint"></i> <span>{{ __('Iniciar sesión') }}</span></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="far fa-user-circle"></i> <span>{{ __('Registrarse') }}</span></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown styl-dropdown rsp-dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle styl-user rsp-user" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-globe"></i> <span>Sistemas</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ url('/sige/dashboard') }}">
                                <i class="fas fa-industry"></i> Gestión Empresarial
                            </a>

                            <hr>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-question"></i> Ayuda
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-question"></i> Acerca de
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown styl-dropdown rsp-dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle styl-user rsp-user" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(is_null(Auth::user()->avatar))
                                <img src="{{ url('/cms/img/default_avatar.png') }}" alt="">
                            @else
                                <img src="{{ url('/uploads_users/'.Auth::user()->avatar_path.'/'.Auth::user()->avatar) }}" alt="">
                            @endif
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/settings/dashboard') }}">
                                <i class="fas fa-cogs"></i> Configuraciones
                            </a>
                            <a class="dropdown-item" href="{{ url('/users/dashboard') }}">
                                <i class="fas fa-users-cog"></i> Usuarios
                            </a>

                            <hr>
                            <a class="dropdown-item" href="{{ url('/users/account') }}">
                                <i class="fas fa-address-card"></i> Editar perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-question"></i> Soporte técnico
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-question"></i> Soporte usuarios
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-sticky-note"></i> Notas
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-comment"></i> Comentarios
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-comment-alt"></i> Chats
                            </a>

                            <hr>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form-nav2').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                {{ __('Cerrar sesión') }}
                            </a>
                            <form id="logout-form-nav2" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
