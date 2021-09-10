@include('layouts.appHeader')

@include('layouts.appNav')

<!--<div id="app">-->
<!--<div class="wrapper styl-wrapper rsp-wrapper">-->
<aside class="sidebar" id="asideSupportedContent"> <!-- shadow -->
    <div class="main">
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                <i class="fas fa-home"></i>
                <span>Inicio</span></a>
            </li>
            <div class="sidebar-header">
                <h3>CONTENIDO</h3>
                <strong>CT</strong>
            </div>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#suscripciones-collapse" aria-expanded="true">
                    <i class="fas fa-folder"></i>
                    <span>Suscripciones</span>
                    <span><i class="fas fa-angle-down" style="float: right;"></i></span>
                </a>
                <div class="collapse styl-collapse rsp-collapse" id="suscripciones-collapse"> <!--class="collapse show"-->
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Visitantes</span></a></li>
                    <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Invitaciones</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Registrados</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Verificados</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Infracciones</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Suspenciones o baneados</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Recuperación de contraseñas</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Perfil</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#estructura-collapse" aria-expanded="true">
                    <i class="fas fa-folder"></i>
                    <span>Permisologias</span>
                    <span><i class="fas fa-angle-down" style="float: right;"></i></span>
                </a>
                <div class="collapse styl-collapse rsp-collapse" id="estructura-collapse"> <!--class="collapse show"-->
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Menús</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Módulos</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Categorias</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Grupos</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>SubGrupos</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Acciones</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Permisos y restricciones</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Control de inicios de sesiones</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#mantenimiento-collapse" aria-expanded="true">
                    <i class="fas fa-folder"></i>
                    <span>Mantenimientos</span>
                    <span><i class="fas fa-angle-down" style="float: right;"></i></span>
                </a>
                <div class="collapse styl-collapse rsp-collapse" id="mantenimiento-collapse"> <!--class="collapse show"-->
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Soporte técnico</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Soporte usuarios</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-folder"></i>
                <span>Correos masivos</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-folder"></i>
                <span>Notas</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-folder"></i>
                <span>Comentarios</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-folder"></i>
                <span>Chats</span></a>
            </li>
            <!--<li class="nav-item">
                <a class="dropdown-item" href="{{-- route('logout') --}}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form-web').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>{{-- __('Cerrar sesión') --}}</span>
                </a>
                <form id="logout-form-web" action="{{-- route('logout') --}}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>-->
        </ul>
    </div>
</aside>

<section id="sectionSupportedContent">
    <nav class="navbar navbar-expand-lg"> <!-- shadow -->

        <p><i class="fas fa-users-cog"></i> Administración de usuarios</p>

        <button class="navbar-toggler" type="button" id="btn_toggler_sidebar"
            data-toggle="collapse" data-target="#asideSupportedContent"
            aria-controls="asideSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <!--<span class="navbar-toggler-icon"></span>-->
            <i class="fas fa-bars"></i>
        </button>
        
        <!--<div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="nav-link">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
            </ul>
        </div>-->
    </nav>

    <div class="container-fluid">
        <nav arial-label="breadcrumb shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                @section('breadcrumb')
                @show
            </ol>
        </nav>
    </div>

    <!-- Mostrar Mensajes de Error -->
    @if(Session::has('message'))
    <div class="container-fluid">
        <div class="alert alert-{{ Session::get('typealert') }}">
            <strong>{{ Session::get('message') }}</strong>
            @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            @push('scriptsMessage')
                <script>
                    $('.alert').slideDown();
                    setTimeout(function(){ $('.alert').slideUp(); }, 10000);
                </script>
            @endpush
        </div>
    </div>
    @endif

    <article class="page">

        @section('content')
        @show

    </article>
    
</section>
<!--</div>-->
<!--</div>-->

@include('layouts.appFooter')
