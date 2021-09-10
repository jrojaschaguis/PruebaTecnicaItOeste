<!doctype html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />    
    <meta http-equiv="X-UA-Compatible" content="IE=8" />    
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />    
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta http-equiv="X-UA-Compatible" content="IE=10" />    
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Evitando el Caché en HTML -->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- Evitando el Caché en PHP -->
    <?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
    ?>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Route Name -->
    <meta name="routeName" content="{{ Route::currentRouteName() }}" />

    <title>{{ config('app.name', 'Laravel') }} | My Project v1.0.0 @yield('title')</title>
    <meta name="description" content="Ecosistema Negocios JR @yield('description')." />
    <meta name="Author" content = "Jesús Rojas" />
    <meta name="robots" content="index, follow" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('cms/img/favicon.ico') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('cms/img/favicon.png') }}" />

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/bootstrap-v5.0.0/css/bootstrap.min.css') }}">

    <!-- LightBox - fancybox 3.5.7 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/lightbox-v3.5.7/jquery.fancybox.min.css') }}" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free-v5.13.0/css/all.min.css') }}">

    <!-- Google Font: Source Roboto -->
    <link  rel="stylesheet" href="{{ asset('cms/fonts/roboto/css?family=Roboto:400,700&display=swap') }}">

    <!-- Styles Laravel App-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- jQuery UI Autocomplete - Multiple values -->
	<link rel="stylesheet" href="{{ asset('cms/plugins/jquery-ui-1.12.1/jquery-ui.min.css') }}"> 

    <!-- Styles Negocios JR -->
    <link rel="stylesheet" href="{{ url('/cms/css/style.css?v='.time()) }}">

    @yield('styles')

</head>
<body id="inicio">
<div id="app"> <!-- Inicio app -->
