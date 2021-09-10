<div>
    
    <!--{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}-->
    
    <div class="form-group row">
        <label for="nombre" class="col-md-3 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>
        <div class="input-group mb-3 col-md-9">
            <!--<input type="text" name="nombre" id="nombre" wire:model="nombre"
            class="form-control @error('nombre') is-invalid @enderror"
            placeholder="Escribe tú nombre de usuario contacto..."
            value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>-->
            @error('nombre') <?php $isinvalid = 'is-invalid'; ?> @else <?php $isinvalid = ''; ?> @enderror
            {!! Form::text('nombre',
                old('nombre'), [
                'id'=>'nombre',
                'wire:model'=>'nombre',
                'class'=>'form-control '.$isinvalid,
                'placeholder'=>'Escribe tú nombre de usuario contacto...',
                'required', 'autocomplete'=>'nombre', 'autofocus'])
            !!}
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            <!--<small>{{ $nombre }}</small>-->
            <!--@error('nombre') <small class="text-danger">{{ $message }}</small> @enderror-->
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="mensaje" class="col-md-3 col-form-label text-md-right">{{ __('Mensaje') }}</label>
        <div class="input-group mb-3 col-md-9">
            <!--<input type="text" name="mensaje" id="mensaje" wire:model="mensaje"
            class="form-control @error('mensaje') is-invalid @enderror"
            placeholder="Escribe tu mensaje"
            value="{{ old('mensaje') }}" required autocomplete="mensaje" autofocus>-->
            @error('mensaje') <?php $isinvalid = 'is-invalid'; ?> @else <?php $isinvalid = ''; ?> @enderror
            {!! Form::text('mensaje',
                old('mensaje'), [
                'id'=>'mensaje',
                'wire:model'=>'mensaje',
                'class'=>'form-control '.$isinvalid,
                'placeholder'=>'Escribe tú mensaje...',
                'required', 'autocomplete'=>'mensaje', 'autofocus'])
            !!}
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-sms"></span>
                </div>
            </div>
            <!--<small>{{ $mensaje }}</small>-->
            <!--@error('mensaje') <small class="text-danger">{{ $message }}</small> @enderror-->
            @error('mensaje')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-3">
            <button wire:click="enviarMensaje" id="btn_enviar_mensaje"
            class="btn btn-primary btn-sm"> 
            <i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Enviar mensaje') }}</button>
            <!-- Mensaje de alerta -->
            <!--<div class="alert alert-success collapse mt-3" role="alert" id="avisoSuccess" style="position: absolute;">
                ¡Mensaje enviado...!!!
            </div>-->
            <span class="text-default loaderProcesandoMensaje" style="display: none;">
                &nbsp;<i class="fas fa-cogs"></i>
                &nbsp;<strong>Procesando...</strong>
                &nbsp;<img src="{{ url('/cms/img/loader/loader16x16.gif') }}" alt="">
            </span>
            <span class="text-default loaderCargandoMensaje" style="display: none;">
                &nbsp;<i class="fas fa-upload"></i>
                &nbsp;<strong>Cargando..</strong>
                &nbsp;<img src="{{ url('/cms/img/loader/loader16x16.gif') }}" alt="">
            </span>
            <span class="text-success loaderGuardadoMensaje" style="display: none;">
                &nbsp;<i class="far fa-save"></i>
                &nbsp;<strong>Guardado...</strong>
                &nbsp;<img src="{{ url('/cms/img/loader/loader16x16.gif') }}" alt="">
            </span>
            <span class="text-success loaderActualizadoMensaje" style="display: none;">
                &nbsp;<i class="fas fa-check"></i>
                &nbsp;<strong>Actualizado...</strong>
                &nbsp;<img src="{{ url('/cms/img/loader/loader16x16.gif') }}" alt="">
            </span>
            <span class="text-success loaderEnviadoMensaje" style="display: none;">
                &nbsp;<i class="far fa-paper-plane"></i>
                &nbsp;<strong>Mensaje enviado...</strong>
                &nbsp;<img src="{{ url('/cms/img/loader/loader16x16.gif') }}" alt="">
            </span>
            <span class="text-warning loaderAvisoMensaje" style="display: none;">
                &nbsp;<i class="fas fa-exclamation-triangle"></i>
                &nbsp;<strong>Error...</strong>
                &nbsp;<img src="{{ url('/cms/img/loader/loader16x16.gif') }}" alt="">
            </span>
            <span class="text-info loaderInfoMensaje" style="display: none;">
                &nbsp;<i class="fas fa-info"></i>
                &nbsp;<strong>Información...</strong>
                &nbsp;<img src="{{ url('/cms/img/loader/loader16x16.gif') }}" alt="">
            </span>
        </div>
    </div>

    <hr>

</div>
