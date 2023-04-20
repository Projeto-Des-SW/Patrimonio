@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="">
            @include('layouts.components.header', ['page_title' => 'Movimentações de Patrimônios', 'back' => false])
        </div>

    </div>

    <table class="table table-hover table-responsive mx-2 mt-4" id="movimento_table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Servidor de Origem</th>
            <th scope="col">Servidor de Destino</th>
            <th scope="col">Tipo do Movimento</th>
            <th scope="col">Itens do Movimento</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movimentos as $movimento)
            <tr>
                <td>{{$movimento->id}}</td>
                <td>{{$movimento->servidor_origem->user->name}}</td>
                <td>{{$movimento->servidor_destino->user->name}}</td>
                <td>{{$movimento->tipo_movimento->nome}}</td>
                <td>
                    @foreach($movimento->itens_movimento->take(3) as $index => $item)
                        {{Str::limit($item->nome, 15)}}@if($index < 2)
                            ,
                        @endif
                    @endforeach
                </td>
                <td class="d-flex justify-content-around">
                    @if($movimento->status != 'Concluido')
                        <a class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center action-button"
                           href="{{route('movimento.edit', ['movimento_id' => $movimento->id])}}">
                            <img src="{{URL::asset('/assets/edit_icon.svg')}}" width="15px" alt="Icon de edição">
                        </a>
                        <a class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center action-button"
                           href="{{route('movimento.delete', ['movimento_id' => $movimento->id])}}">
                            <img src="{{URL::asset('/assets/delete.svg')}}" width="20px" alt="Icon de remoção">
                        </a>
                    @else
                        <button class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center action-button" disabled>
                            <img src="{{URL::asset('/assets/edit_icon.svg')}}" width="15px" alt="Icon de edição">
                        </button>
                        <button class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center action-button" disabled>
                            <img src="{{URL::asset('/assets/delete.svg')}}" width="20px" alt="Icon de remoção">
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex" style="max-width:600px">
        <a class="w-100 btn btn-primary" style="margin-right: 10px" href="{{route('movimento.create')}}">Cadastrar
            item</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px" href="{{route('classificacao.index')}}">Classificações</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px">Origens</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px">Situações</a>
    </div>

    <script>
        $(document).ready(function () {
            $('#movimento_table').DataTable({
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
                    "targets": [0, 5],
                    "orderable": false
                }]
            });
        });
    </script>

@endsection
