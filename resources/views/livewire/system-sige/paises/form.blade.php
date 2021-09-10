<div class="form-group row">
    <div class="col-md-2">
        <label>Código</label>
        <input name="cod_pai" type="number" wire:model.defer="cod_pai"
        class="form-control @error('cod_pai') is-invalid @enderror letterUpperCase"
        placeholder="Código de país" autocomplete="cod_pai" autofocus>
        @error('cod_pai')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
        <label>País</label>
        <input name="name_pais" aria-label="name_pais" type="text" wire:model.defer="name_pais"
        class="form-control @error('name_pais') is-invalid @enderror firstLetterUpperCase"
        placeholder="Nombre de tú país" autocomplete="name_pais" autofocus>
        @error('name_pais')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label>Siglas</label>
        <input name="sigla_pais" type="text" wire:model.defer="sigla_pais"
        class="form-control @error('sigla_pais') is-invalid @enderror letterUpperCase"
        placeholder="Sigla de país" autocomplete="sigla_pais" autofocus>
        @error('sigla_pais')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

