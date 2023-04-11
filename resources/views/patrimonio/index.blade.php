@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="">
            @include('layouts.components.header', ['page_title' => 'Patrimônios', 'back' => false])
        </div>

    </div>

    <table class="table table-hover table-responsive mx-2 mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" data-param1="{{ $patrimonio }}">
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
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px" href="{{route('classificacao.index')}}">Classificações</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px">Origens</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px">Situações</a>
    </div>

<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Título do Modal</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Conteúdo do Modal aqui...
                    <p>Param1: <span id="param1"></span></p>
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
            var button = $(event.relatedTarget) // Botão que acionou o modal
            var param1 = button.data('param1') // Extrai informações dos dados do botão
            console.log(param1)
            var modal = $(this)
            modal.find('#param1').text(param1) // Insere informações nos campos do modal
        })
    });

</script>
