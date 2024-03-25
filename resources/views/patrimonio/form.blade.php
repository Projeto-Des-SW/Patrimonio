<div class="row">
    @if (isset($patrimonio))
        <input type="hidden" name="patrimonio_id" value="{{ $patrimonio->id }}">
    @endif
    <div class="col-6">
        <label for="nome">Nome do ítem:<strong style="color: red">*</strong></label>
        <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="nome"
            @if (isset($patrimonio)) value="{{ $patrimonio->nome }}"
               @else value="{{ old('nome') }}" @endif
            required autocomplete="nome" autofocus>
        @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-6">
        <label for="descricao">Descrição:<strong style="color: red">*</strong></label>
        <input class="form-control @error('descricao') is-invalid @enderror" id="descricao" type="text"
            name="descricao"
            @if (isset($patrimonio)) value="{{ $patrimonio->descricao }}"
               @else value="{{ old('descricao') }}" @endif
            required autocomplete="descricao" autofocus>
        @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mt-4">
    <div class="col-4">
        <label>Classificação:<strong style="color: red">*</strong></label>
        <select class="form-control" name="classificacao_id" required>
            <option selected disabled>Selecione uma Classificação</option>
            @foreach ($classificacoes as $classificacao)
                <option value="{{ $classificacao->id }}" @if (
                    (isset($patrimonio) && $patrimonio->classificacao->id == $classificacao->id) ||
                        old('classificacao_id') == $classificacao->id) selected @endif>
                    {{ $classificacao->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-4">
        <label>Origem:<strong style="color: red">*</strong></label>
        <select class="form-control" name="origem_id" required>
            <option selected disabled>Selecione uma Origem</option>
            @foreach ($origens as $origem)
                <option value="{{ $origem->id }}" @if ((isset($patrimonio) && $patrimonio->origem->id == $origem->id) || old('origem_id') == $origem->id) selected @endif>
                    {{ $origem->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-4">
        <label>Situação:<strong style="color: red">*</strong></label>
        <select class="form-control" name="situacao_id" required>
            <option selected disabled>Selecione uma Situação</option>
            @foreach ($situacoes as $situacao)
                <option value="{{ $situacao->id }}" @if ((isset($patrimonio) && $patrimonio->situacao->id == $situacao->id) || old('situacao_id') == $situacao->id) selected @endif>
                    {{ $situacao->nome }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row mt-4">
    <div class="col-6">
        <label>Prédio:<strong style="color: red">*</strong></label>
        <select class="form-control" id="predio_select" name="predio_id" required>
            <option selected disabled>Selecione um Prédio</option>
            @foreach ($predios as $predio)
                <option value="{{ $predio->id }}" @if ((isset($patrimonio) && $patrimonio->sala->predio->id == $predio->id) || old('predio_id') == $predio->id) selected @endif>
                    {{ $predio->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-6">
        <label>Sala:<strong style="color: red">*</strong></label>
        <select class="form-control" id="sala_select" name="sala_id" required>
            <option selected disabled>Selecione uma Sala</option>
        </select>
    </div>
</div>

<div class="row mt-4">

    <div class="col-4">
        <label>Servidor:<strong style="color: red">*</strong></label>
        <select class="form-control" name="servidor_id" required>
            <option selected disabled>Selecione um Servidor</option>
            @foreach ($servidores as $servidor)
                <option value="{{ $servidor->id }}" @if ((isset($patrimonio) && $patrimonio->servidor->id == $servidor->id) || old('servidor_id') == $servidor->id) selected @endif>
                    {{ $servidor->user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-4">
        <label for="data_compra">Data de compra:<strong style="color: red">*</strong></label>
        <input class="form-control" type="date" id="data_compra" name="data_compra"
            @if (isset($patrimonio)) value="{{ $patrimonio->data_compra }}" @endif required>
    </div>

    <div class="col-4">
        <label for="valor">Valor do ítem:</label>
        <input class="form-control" type="number" id="valor" name="valor" step="0.01" min="0.01"
            placeholder="0.00" @if (isset($patrimonio)) value="{{ $patrimonio->valor }}" @endif required>
    </div>

</div>

<div class="row mt-4">
    <div class="col-3">
        <div class="row">
            <label>Bem Privado?</label>
            <div class="col-6">
                <input class="form-check-input" type="radio" name="nota_fiscal_radio" id="nota_fiscal_sim"
                    @if (isset($patrimonio) && $patrimonio->nota_fiscal != null) checked @endif>
                <label class="form-check-label" for="nota_fiscal_sim">Sim</label>
            </div>
            <div class="col-6">
                <input class="form-check-input" type="radio" name="nota_fiscal_radio" id="nota_fiscal_nao"
                    @if ((isset($patrimonio) && $patrimonio->nota_fiscal == null) || !isset($patrimonio)) checked @endif value="false">
                <label class="form-check-label" for="nota_fiscal_nao">
                    Não
                </label>
            </div>
        </div>
    </div>

    <div class="col-5" id="anexo_nota_fiscal" style="display: none;">
        <label>Anexar Nota Fiscal:<strong style="color: red">*</strong></label>
        <input class="form-control @error('nota_fiscal') is-invalid @enderror" id="nota_fiscal" type="file"
            name="nota_fiscal" value="" autocomplete="nota_fiscal"
            @if (isset($patrimonio) && $patrimonio->nota_fiscal != null) style="width: 135px" @endif>
        @error('nota_fiscal')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @if (isset($patrimonio) && $patrimonio->nota_fiscal != null)
            <span
                style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 250px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um
                Arquivo Já Foi Enviado</span>
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <label for="observacao">Observações pertinentes a este patrimônio:</label>
        <textarea class="form-control @error('observacao') is-invalid @enderror" id="observacao" name="observacao">
@if (isset($patrimonio))
{{ $patrimonio->observacao }}@else{{ old('observacao') }}
@endif
</textarea>
        @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<script>
    $("#predio_select").on('change', function() {
        var predio_id = $("#predio_select").val();
        $.ajax({
            type: 'GET',
            url: '{{ route('patrimonio.getSalas') }}',
            data: 'predio_id=' + predio_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                $('#sala_select').empty();
                data.forEach(function(sala) {
                    $('#sala_select').append(new Option(sala.nome, sala.id))
                });
            },
            error: (data) => {
                console.log(data);
            }
        });

        $(document).ready(function() {
            @if (isset($patrimonio->nota_fiscal) && $patrimonio->nota_fiscal != null)
                $("#nota_fiscal_sim").attr('checked', true);
                $("#nota_fiscal_sim").click();
            @else
                $("#nota_fiscal_nao").attr('checked', true);
            @endif

        });
    });

    $("#nota_fiscal_sim").click(function() {
        $("#anexo_nota_fiscal").show().find('input, textarea').prop('disabled', false);
        @if (isset($patrimonio->nota_fiscal) && $patrimonio->nota_fiscal->nota_fiscal == null)
            $("#nota_fiscal").prop('required', true);
        @endif
    });
    $("#nota_fiscal_nao").click(function() {
        $("#anexo_nota_fiscal").hide().find('input, textarea').prop('disabled', true);
        $("#nota_fiscal").prop('required', false);
    });
</script>
