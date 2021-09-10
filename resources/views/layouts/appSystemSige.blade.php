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
                <a href="{{ url('/sige/dashboard') }}" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/sige/localidades') }}" class="nav-link">
                <i class="fas fa-folder"></i>
                <span>Localidades</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#compras-collapse" aria-expanded="true">
                    <i class="fas fa-folder"></i>
                    <span>Compras</span>
                    <span><i class="fas fa-angle-down" style="float: right;"></i></span>
                </a>
                <div class="collapse styl-collapse rsp-collapse" id="compras-collapse"> <!--class="collapse show"-->
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Proveedores o beneficiarios</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Ordenes de compras - detalles</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Recepción de mercancias</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Devolución de mercancias</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Cuentas por pagar</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#inventario-collapse" aria-expanded="true">
                    <i class="fas fa-folder"></i>
                    <span>Inventarios</span>
                    <span><i class="fas fa-angle-down" style="float: right;"></i></span>
                </a>
                <div class="collapse styl-collapse rsp-collapse" id="inventario-collapse"> <!--class="collapse show"-->
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Artículos</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Mercancias</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Materia prima</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Almacenes</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Suministros</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Ajustes</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link collapsed"
                    data-bs-toggle="collapse" data-bs-target="#ventas-collapse" aria-expanded="true">
                    <i class="fas fa-folder"></i>
                    <span>Ventas</span>
                    <span><i class="fas fa-angle-down" style="float: right;"></i></span>
                </a>
                <div class="collapse styl-collapse rsp-collapse" id="ventas-collapse"> <!--class="collapse show"-->
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Tiendas o Negocios</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Productos o servicios</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Vendedores</span></a></li>
                        <li><a href="#" class="link-dark"><i class="far fa-circle"></i> <span>Clientes</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</aside>

<section id="sectionSupportedContent">
    <nav class="navbar navbar-expand-lg"> <!-- shadow -->

        <p><i class="fas fa-industry"></i> Gestión Empresarial</p>

        <button class="navbar-toggler" type="button" id="btn_toggler_sidebar"
            data-toggle="collapse" data-target="#asideSupportedContent"
            aria-controls="asideSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <!--<span class="navbar-toggler-icon"></span>-->
            <i class="fas fa-bars"></i>
        </button>
        
    </nav>

    <div class="container-fluid">
        <nav arial-label="breadcrumb shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/sige/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
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
