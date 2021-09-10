<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card shadow">
            <div class="card-header"><i class="far fa-eye"></i> {{ __('Ver País') }}</div>

            <!-- Inicio body -->
            <div class="card-body">

                <div class="form-group row">
                    <h1 class="display-4">{{ ($pais_ver->cod_pai < 10) ? '0'.$pais_ver->cod_pai : $pais_ver->cod_pai }} - {{$pais_ver->name_pais }} - {{ $pais_ver->sigla_pais }}</h1>
                    <p class="lead">Venezuela</p>
                </div>

                <h2 class="mt-5">Opciones:</h2>
                <hr> 

                <!-- Opciones -->
                <div class="row mt-4">
                    <div class="form-group col-md-12">

                        <button type="button" class="btn btn-secondary btn-sm" wire:click="cerrar('Table')">
                        <i class="fas fa-door-closed"></i>&nbsp;Cerrar</button>
                        
                    </div>
                </div><!-- Fin Opciones -->
        
            </div> <!-- Fin body -->

        </div>

    </div>
</div>
