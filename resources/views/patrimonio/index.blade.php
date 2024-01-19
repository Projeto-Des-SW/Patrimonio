@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="">
            @include('layouts.components.header', ['page_title' => 'Patrimônios', 'back' => false])
        </div>

    </div>

    <div class="container">
        <table class="table table-hover shadow-lg" style="border-radius: 10px; overflow:hidden; ">
            <thead class="text-md-center" style="background-color: #1A2876; color: white;">
                <tr>
                    <th >ID</th>
                    <th >Nome</th>
                    <th >Prédio</th>
                    <th >Sala</th>
                    <th >Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patrimonios as $patrimonio)
                    <tr class="text-md-center">
                        <td class="py-4">{{ $patrimonio->id }}</td>
                        <td class="py-4">{{ $patrimonio->nome }}</td>
                        <td class="py-4">{{ $patrimonio->sala->predio->nome }}</td>
                        <td class="py-4">{{ $patrimonio->sala->nome }}</td>
                        <td class="py-4">
                            <div>
                                <a class=""
                                    href="{{ route('patrimonio.edit', ['patrimonio_id' => $patrimonio->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </a>
                                <a class=""
                                    href="{{ route('patrimonio.delete', ['patrimonio_id' => $patrimonio->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                                    data-param1="{{ $patrimonio }}" data-param2="{{ $patrimonio->classificacao }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex" style="max-width:300px">
        <a class="w-100 btn btn-primary" style="margin-right: 10px" href="{{ route('patrimonio.create') }}">Cadastrar
            item</a>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="info-label">Classificação: <span class="info-value" id="classificacao"></span></p>
                    <p class="info-label">Valor residual: <span class="info-value" id="valor_residual"></span></p>
                    <p class="info-label">Vida útil: <span class="info-value" id="vida_util"></span></p>

                    <div style="margin-top: 45px">
                        <p class="info-label">Meses de depreciação: <span class="info-value" id="meses"></span></p>
                        <p class="info-label">Valor inicial do item: <span class="info-value" id="valor_inicial">R$</span>
                        </p>
                        <p class="info-label">Depreciação atual do item: <span class="info-value"
                                id="depreciacao_atual"></span></p>
                        <p class="info-label">Valor atual do item: <span class="info-value" id="valor_atual"></span></p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

<script>
    function exibirModal() {
        $('#myModal').modal('show');
    }

    $(document).ready(function() {
        $('#myModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var patrimonio = button.data('param1')
            var classificacao = button.data('param2')

            var modal = $(this)

            var depreciacaoMensal = ((patrimonio.valor - classificacao.residual) / classificacao
                .vida_util).toFixed(2);

            console.log(classificacao)

            var data = new Date(patrimonio.data_compra);
            var dataAtual = new Date();

            var anoData = data.getFullYear();
            var mesData = data.getMonth();
            var anoAtual = dataAtual.getFullYear();
            var mesAtual = dataAtual.getMonth();

            var diferencaMeses = (anoAtual - anoData) * 12 + (mesAtual - mesData);

            var depreciacaoAtual = (diferencaMeses * depreciacaoMensal).toFixed(2)
            var valorAtual = (patrimonio.valor - (diferencaMeses * depreciacaoMensal)).toFixed(2)


            modal.find('#myModalLabel').text(`Depreciação: ${patrimonio.nome}`)

            modal.find('#classificacao').text(`${classificacao.nome}`)
            modal.find('#vida_util').text(`${classificacao.vida_util} meses`)
            modal.find('#valor_residual').text(`R$ ${classificacao.residual}`)

            modal.find('#meses').text(`${diferencaMeses} meses`)
            modal.find('#valor_inicial').text(`R$ ${Number(patrimonio.valor).toFixed(2)}`)
            modal.find('#depreciacao_atual').text(`R$ ${depreciacaoAtual}`)

            Number(valorAtual) > Number(classificacao.residual) ?
                modal.find('#valor_atual').text(`R$ ${valorAtual}`) :
                modal.find('#valor_atual').text(`R$ ${classificacao.residual} (Valor residual)`)

        })
    });
</script>

<script>
    $(document).ready(function() {
        $('#patrimonio_table').DataTable({
            searching: true,
            "language": {
                "search": "Pesquisar: ",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "zeroRecords": "Nenhum registro disponível",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            },
            "columnDefs": [{
                "targets": [4],
                "orderable": false
            }]
        });
    });
</script>
