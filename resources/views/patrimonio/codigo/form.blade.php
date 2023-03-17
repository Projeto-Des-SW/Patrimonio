<div class="row">
    <input type="hidden" name="patrimonio_id" value="{{$patrimonio->id}}">
    <div class="col-12 mt-2">
        <label for="codigo">Código:<strong style="color: red">*</strong></label>
        <input class="form-control @error('codigo') is-invalid @enderror" id="codigo" type="text"
               name="codigo" value="" required
               autocomplete="codigo" autofocus>
        @error('codigo')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>
