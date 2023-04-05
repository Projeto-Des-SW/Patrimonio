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

        <label for="residual">Valor residual em meses (%):<strong style="color: red">*</strong></label>
        <input class="form-control form-input @error('residual') is-invalid @enderror" id="residual" type="number"
            step="0.01" min="0.01" placeholder="0.00"
            name="residual" @if(isset($classificacao)) value="{{$classificacao->residual}}"
            @else value="{{old('residual')}}" @endif required
            autocomplete="residual" autofocus>
        @error('residual')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="vida_util">Vida útil (em meses):<strong style="color: red">*</strong></label>
        <input class="form-control form-input @error('vida_util') is-invalid @enderror" id="vida_util" type="number"
            name="vida_util" @if(isset($classificacao)) value="{{$classificacao->vida_util}}"
            @else value="{{old('vida_util')}}" @endif required
            autocomplete="vida_util" autofocus>
        @error('vida_util')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
