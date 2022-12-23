<div class="row">
    <div class="col-sm-12">
        <label for="nome_cientifico">Nome:<strong style="color: red">*</strong></label>
        <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text"
               name="nome" @if(isset($predio)) value="{{$predio->nome}}"
               @else value="{{old('nome')}}" @endif required
               autocomplete="nome" autofocus>
        @error('nome')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
