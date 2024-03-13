@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.components.header', ['page_title' => 'Classificação Contábil', 'back' => false])
    </div>

    <div class="container">
        <table class="table table-hover shadow-lg" style="border-radius: 10px; overflow:hidden;">
            <thead class="text-md-center" style="background-color: #1A2876; color: white;">
                <tr>
                    <th>#</th>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classificacaos as $classificacao)
                    <tr class="text-md-center">
                        <td class="py-4">{{ $classificacao->id }}</td>
                        <td class="py-4">{{ $classificacao->codigo }}</td>
                        <td class="py-4">{{ $classificacao->nome }}</td>
                        <td class="py-4">{{ $classificacao->created_at }}</td>
                        <td class="py-4">
                            <div>
                                <a href="{{ route('classificacao.edit', ['classificacao_id' => $classificacao->id]) }}">
                                    <img src="{{asset('/images/pencil.png')}}" width="24px" alt="Icon de edição">
                                </a>
                               
                                @include('classificacao.modal_delete')
                                <button type="button"  data-toggle="modal" data-target="#deleteModal">
                                    <img src="{{asset('/images/delete.png')}}" width="24px" alt="Icon de remoção">
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{ $classificacaos->links('pagination::bootstrap-4') }}
        </div>
    </div>
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
