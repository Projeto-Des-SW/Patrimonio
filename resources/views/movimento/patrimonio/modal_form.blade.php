

<div class="modal fade" id="patrimonioModal" tabindex="-1" aria-labelledby="patrimonioModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('movimento.patrimonio.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="movimento_id" value="{{$movimento->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="patrimonioModalLabel">Adicionar Patrimônio ao Movimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>Patrimônio:<strong style="color: red">*</strong></label>
                    <select class="form-control" name="patrimonio_id" required>
                        <option selected disabled>Selecione um Patrimônio</option>
                        @foreach($patrimonios as $patrimonio)
                            <option value="{{$patrimonio->id}}">{{$patrimonio->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

