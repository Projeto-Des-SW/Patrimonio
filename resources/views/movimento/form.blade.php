<div class="row">
    @if(isset($movimento))
        <input type="hidden" name="movimento_id" value="{{$movimento->id}}">
    @endif
    <div class="col-4">
        <label>Tipo de Movimento:<strong style="color: red">*</strong></label>
        <select class="form-control" name="tipo_movimento_id" required>
            <option selected disabled>Selecione um Tipo de Movimento</option>
            @foreach($tipo_movimentos as $tipo_movimento)
                <option value="{{$tipo_movimento->id}}"
                        @if(isset($movimento) && $tipo_movimento->id == $movimento->tipo_movimento_id)selected @endif>{{$tipo_movimento->nome}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-4">
        <label>Servidor de Origem:<strong style="color: red">*</strong></label>
        <select class="form-control" name="servidor_origem_id" required>
            <option selected disabled>Selecione o Servidor de Origem</option>
            @foreach($servidores as $servidor)
                <option value="{{$servidor->id}}"
                        @if(isset($movimento) && $servidor->id == $movimento->servidor_origem_id)selected @endif>{{$servidor->user->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-4">
        <label>Servidor de Destino:<strong style="color: red">*</strong></label>
        <select class="form-control" name="servidor_destino_id" required>
            <option selected disabled>Selecione o Servidor de Destino</option>
            @foreach($servidores as $servidor)
                <option value="{{$servidor->id}}"
                        @if(isset($movimento) && $servidor->id == $movimento->servidor_destino_id)selected @endif>{{$servidor->user->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row mt-4">
    <label>Observação:</label>
    <textarea class="form-control" name="observacao" id="observacao"
              placeholder="Digite uma observação sobre o movimento">@if(isset($movimento)){{$movimento->observacao}}@endif</textarea>
</div>


