<div class="row">
    @if(isset($classificacao))
        <input type="hidden" name="classificacao_id" value="{{$classificacao->id}}">
    @endif
    <div class="col-sm-6">
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

        <label for="taxa_depre">Taxa de depreciassão ao ano (%):<strong style="color: red">*</strong></label>
        <input class="form-control form-input @error('taxa_depre') is-invalid @enderror" id="taxa_depre" type="number"
            step="0.01" min="0.01" placeholder="0.00"
            name="taxa_depre" @if(isset($classificacao)) value="{{$classificacao->taxa_depre}}"
            @else value="{{old('taxa_depre')}}" @endif required
            autocomplete="taxa_depre" autofocus>
        @error('taxa_depre')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
