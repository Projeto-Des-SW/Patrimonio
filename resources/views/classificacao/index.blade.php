@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.components.header', ['page_title' => 'Classificação Contábil', 'back' => false])
    </div>

    <table class="table table-hover table-responsive mx-2 mt-4" id="classificacao_table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de Criação</th>
                <th class="text-center" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classificacaos as $classificacao)
                <tr>
                    <td>{{ $classificacao->id }}</td>
                    <td>{{ $classificacao->codigo }}</td>
                    <td>{{ $classificacao->nome }}</td>
                    <td>{{ $classificacao->created_at }}</td>
                    <td class="text-center d-flex justify-content-around">
                        <a class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center action-button"
                            href="{{ route('classificacao.edit', ['classificacao_id' => $classificacao->id]) }}">
                            <img src="{{ URL::asset('/assets/edit_icon.svg') }}" width="15px" alt="Icon de edição">
                        </a>

                        <form action="{{ route('classificacao.delete', ['classificacao_id' => $classificacao->id]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center action-button">
                                <img src="{{ URL::asset('/assets/delete.svg') }}" width="20px" alt="Icon de remoção">
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-3">
        <a class="w-100 btn btn-primary" href="{{ route('classificacao.create') }}">Cadastrar</a>
    </div>


    <script>
        $(document).ready(function() {
            $('#classificacao_table').DataTable({
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
                    "targets": [3],
                    "orderable": false
                }]
            });
        });
    </script>
@endsection
