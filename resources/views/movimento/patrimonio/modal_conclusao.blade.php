<div class="modal fade" id="conclusaoModal" tabindex="-1" aria-labelledby="conclusaoModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('movimento.concluir')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="movimento_id" value="{{$movimento->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="patrimonioModalLabel">Concluir Movimentação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Selecione o Destino dos Materiais da Movimentação</h3>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label>Prédio:<strong style="color: red">*</strong></label>
                            <select class="form-control" id="predio_select" name="predio_id" required>
                                <option selected disabled>Selecione um Prédio</option>
                                @foreach($predios as $predio)
                                    <option value="{{$predio->id}}">{{$predio->nome}}</option>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btn_concluir" disabled>Concluir Movimentação</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#predio_select").on('change', function () {
        var predio_id = $("#predio_select").val();
        $.ajax({
            type: 'POST',
            url: '{{ route('getSalas') }}',
            data: 'predio_id=' + predio_id,
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: (data) => {
                $('#sala_select').empty();
                data.forEach(function (sala) {
                    $('#sala_select').append(new Option(sala.nome, sala.id))
                });
            },
            error: (data) => {
                console.log(data);
            }
        });
        $("#btn_concluir").prop('disabled', false)
    });
</script>

