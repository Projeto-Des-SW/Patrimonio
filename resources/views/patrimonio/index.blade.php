@extends('layouts.app')
@section('content')
   
 <link rel="stylesheet" href="/css/patrimonio.css">


<div class="container">
    <div>
        <h3>
            Patrimônio <a href="{{ route('patrimonio.create') }}"> <img class="rounded-4" style="background-color: #1A2876" src="{{asset('images/adicionar.png')}}" alt=""></a>
        </h3>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-11">
            <form action="{{route('patrimonio.busca.get')}}" method="get">
                <div class="input-group">
                    <input  class="form-control" type="text" name="busca" id="busca" placeholder="Pesquisar por nome">
                    <button style="background-color: #1A2876" class="btn" type="submit"><img src="{{asset('images/busca.png')}}" alt=""></button>
                </div>
            </form>
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary">filtro</button>
        </div>
    </div>
    <div>
        <table class="table table-hover shadow-lg">
                <thead class="text-md-center">
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
                                    <a href="{{ route('patrimonio.edit', ['patrimonio_id' => $patrimonio->id]) }}">
                                        <img src="{{asset('/images/pencil.png')}}" width="24px" alt="Icon de edição">
                                    </a>
                                    <a href="{{ route('patrimonio.delete', ['patrimonio_id' => $patrimonio->id]) }}">
                                        <img src="{{asset('/images/delete.png')}}" width="24px" alt="Icon de remoção">
        
                                    </a>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                                        data-param1="{{ $patrimonio }}" data-param2="{{ $patrimonio->classificacao }}">
                                        <img src="{{asset('/images/info.png')}}" width="24px" alt="Icon de edição">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-5">
                {{ $patrimonios->links('pagination::bootstrap-4') }}
            </div>
    </div>
           
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
