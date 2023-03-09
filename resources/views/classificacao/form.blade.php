<div class="row">
    @if(isset($classificacao))
        <input type="hidden" name="classificacao_id" value="{{$classificacao->id}}">
    @endif
    <div class="col-sm-12">
        <label for="nome">Nome:<strong style="color: red">*</strong></label>
        <input class="form-control form-input @error('nome') is-invalid @enderror" id="nome" type="text"
               name="nome" @if(isset($classificacao)) value="{{$classificacao->nome}}"
               @else value="{{old('nome')}}" @endif required
               autocomplete="nome" autofocus>
        @error('nome')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
