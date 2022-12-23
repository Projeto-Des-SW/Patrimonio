<div class="row">
    <input type="hidden" name="predio_id" value="{{$predio->id}}">
    @if(isset($sala))
        <input type="hidden" name="sala_id" value="{{$sala->id}}">

    @endif

    <div class="col-sm-6">
        <label for="nome">Nome:<strong style="color: red">*</strong></label>
        <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text"
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
        <label for="telefone">Telefone:<strong style="color: red">*</strong></label>
        <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="tel"
               name="telefone" @if(isset($sala)) value="{{$sala->telefone}}"
               @else value="{{old('telefone')}}" @endif required
               autocomplete="telefone" autofocus>
        @error('telefone')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
