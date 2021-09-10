<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card shadow">
            <div class="card-header"><i class="far fa-edit"></i> {{ __('Editar País') }}</div>

            <!-- Inicio body -->
            <div class="card-body">

                @include('livewire.system-sige.paises.form')

                <h2 class="mt-5">Opciones:</h2>
                <hr> 

                <!-- Opciones -->
                <div class="row">
                    <div class="form-group col-md-12">

                        <button type="button" class="btn btn-primary btn-sm" wire:click="update({{ $id_paise }})"
                        wire:loading.attr="disabled" wire:target="update" wire:target="cerrar" class="disabled:opacity-25"> <!-- wire:loading.remove wire:loading.attr="disabled" class="disabled:opacity-25" -->
                        <i class="fas fa-save"></i>&nbsp;Actualizar y cerrar</button>
                        
                        <button type="button" class="btn btn-secondary btn-sm" wire:click="cerrar('Table')"
                        wire:loading.attr="disabled" wire:target="update" wire:target="cerrar" class="disabled:opacity-25">
                        <i class="fas fa-door-closed"></i>&nbsp;Cerrar</button>

                        <span wire:loading wire:target="update" wire:target="cerrar">&nbsp;<i class="fas fa-hourglass-half"></i>&nbsp;¡Espere un momento!, procesando ...</span>

                    </div>
                </div><!-- Fin Opciones -->
                    
            </div> <!-- Fin body -->

        </div>

    </div>
</div>
