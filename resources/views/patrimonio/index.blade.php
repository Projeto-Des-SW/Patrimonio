@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="">
            @include('layouts.components.header', ['page_title' => 'Patrimônios', 'back' => false])
        </div>

    </div>

    <table class="table table-hover table-responsive mx-2 mt-4" id="patrimonio_table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do ítem</th>
            <th scope="col">Prédio</th>
            <th scope="col">Sala</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patrimonios as $patrimonio)
            <tr>
                <td>{{$patrimonio->id}}</td>
                <td>{{$patrimonio->nome}}</td>
                <td>{{$patrimonio->sala->predio->nome}}</td>
                <td>{{$patrimonio->sala->nome}}</td>
                <td class="d-flex justify-content-around">
                    <a class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center action-button"
                       href="{{route('patrimonio.edit', ['patrimonio_id' => $patrimonio->id])}}">
                        <img class="icon-button" src="{{URL::asset('/assets/edit_icon.svg')}}" alt="Icon de edição">
                    </a>
                    <a class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center action-button"
                       href="{{route('patrimonio.delete', ['patrimonio_id' => $patrimonio->id])}}">
                        <img src="{{URL::asset('/assets/delete.svg')}}" width="20px" alt="Icon de remoção">
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" data-param1="{{ $patrimonio }}" data-param2="{{ $patrimonio -> classificacao }}">
                        <img src="{{URL::asset('/assets/money.svg')}}" width="11px" alt="Depreciação do Item">
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex" style="max-width:600px">
        <a class="w-100 btn btn-primary" style="margin-right: 10px" href="{{route('patrimonio.create')}}">Cadastrar
            item</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px" href="{{route('classificacao.index')}}">Classificação Contábil</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px">Origens</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px">Situações</a>
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
                        <p class="info-label">Valor inicial do item: <span class="info-value" id="valor_inicial">R$</span></p>
                        <p class="info-label">Depreciação atual do item: <span class="info-value" id="depreciacao_atual"></span></p>
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
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var patrimonio = button.data('param1')
            var classificacao = button.data('param2')

            var modal = $(this)

            var depreciacaoMensal = ((patrimonio.valor - classificacao.residual) / classificacao.vida_util).toFixed(2);

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
    $(document).ready(function () {
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

