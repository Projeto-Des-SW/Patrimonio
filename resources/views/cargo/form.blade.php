<div class="row">
    @if(isset($cargo))
        <input type="hidden" name="cargo_id" value="{{$cargo->id}}">
    @endif
    <div class="col-sm-12">
        <label for="nome">Nome:<strong style="color: red">*</strong></label>
        <input class="form-control form-input @error('nome') is-invalid @enderror" id="nome" type="text"
               name="nome" @if(isset($cargo)) value="{{$cargo->nome}}"
               @else value="{{old('nome')}}" @endif required
               autocomplete="nome" autofocus>
        @error('nome')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
