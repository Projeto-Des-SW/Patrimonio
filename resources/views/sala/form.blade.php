<div class="row">
    <input type="hidden" name="predio_id" value="{{$predio->id}}">
    @if(isset($sala))
        <input type="hidden" name="sala_id" value="{{$sala->id}}">

    @endif

    <div class="col-sm-6">
        <label for="nome">Nome:<strong style="color: red">*</strong></label>
        <input class="form-control form-input @error('nome') is-invalid @enderror" id="nome" type="text"
               name="nome" @if(isset($sala)) value="{{$sala->nome}}"
               @else value="{{old('nome')}}" @endif required
               autocomplete="nome" autofocus>
        @error('nome')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-sm-6">
        <label for="telefone">Telefone:</label>
        <input class="form-control form-input" id="telefone" type="tel"
               name="telefone">
        @error('telefone')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
