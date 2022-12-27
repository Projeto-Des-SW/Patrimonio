<div class="row">
    @if(isset($setor_pai))
        <input type="hidden" name="setor_pai_id" value="{{$setor_pai->id}}">
    @endif
    @if(isset($setor))
        <input type="hidden" name="setor_id" value="{{$setor->id}}">
    @endif
    <div class="col-sm-6">
        <label for="nome">Nome:<strong style="color: red">*</strong></label>
        <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text"
               name="nome" @if(isset($setor)) value="{{$setor->nome}}"
               @else value="{{old('nome')}}" @endif required
               autocomplete="nome" autofocus>
        @error('nome')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-sm-6">
        <label for="codigo">Código:<strong style="color: red">*</strong></label>
        <input class="form-control @error('codigo') is-invalid @enderror" id="codigo" type="text"
               name="codigo" @if(isset($setor)) value="{{$setor->codigo}}"
               @else value="{{old('codigo')}}" @endif required
               autocomplete="codigo" autofocus>
        @error('codigo')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
