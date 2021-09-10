<div>
    
    <!--{{-- Do your work, then step back. --}}-->

    <h5 class="mt-3"><strong>Lista de mensajes</strong></h5>
    @foreach($mensajes as $mensaje)
    <div class="row ml-3">
        <div class="alert alert-primary col-md-6" 
            <li>{{ $mensaje['usuario'] }} - {{ $mensaje['mensaje'] }}</li>
        </div>
    </div>
    @endforeach
    
</div>
