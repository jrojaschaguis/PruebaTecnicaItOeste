@extends('layouts.app')

@section('title', ' | Inicio')
@section('description', ' | Inicio')

<!-- styles -->
@section('styles')

@endsection

@section('content')
  <div id="myCarousel" class="carousel slide shadow" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="{{ asset('cms/img/slider/slider01-01.jpg') }}" class="d-block w-100" alt="Diseño Web">
          <div class="carousel-caption">
            <h3>Diseño y Programación Web</h3>
            <p>Sitios web, Gestores de Contenido, Tiendas en linea, FrontEnd y BackEnd...</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="{{ asset('cms/img/slider/slider02-01.jpg') }}" class="d-block w-100" alt="Desarrollo web">
          <div class="carousel-caption">
            <h3>Desarrollo web</h3>
            <p>Creamos soluciones web para su empresa.</p>
          </div>
        </div>
      
        <div class="carousel-item">
          <img src="{{ asset('cms/img/slider/slider03-01.jpg') }}" class="d-block w-100" alt="Ecommerce">
          <div class="carousel-caption">
            <h3>Ecommerce</h3>
            <p>Tiendas Online e integración con pasarelas de pago: Stripe y Paypal en cualquier sitio web de comercio electrónico.</p>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
  </div>

  <div class="container mt-5 mb-5">
    <h3 class="text-center">Diseño y Desarrollo Web Adaptativo o Responsivo - Programación a la medida - Estrategias y Marketing Online - Revistas Digitales - Soportes y Servicios Técnicos - Redes</h3>
  </div>

@endsection

<!-- scripts -->
@push('scripts')

@endpush
