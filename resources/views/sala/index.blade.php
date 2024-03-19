@extends('layouts.app')

@section('content')
    <div class="row">
        @include('layouts.components.header', [
            'page_title' => 'Salas - Prédio ' . $predio->nome,
            'back' => true,
        ])
    </div>

    <table class="table table-hover table-responsive mx-2 mt-4" id="sala_table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Data de Criação</th>
                <th class="text-center" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salas as $sala)
                <tr>
                    <td>{{ $sala->id }}</td>
                    <td>{{ $sala->nome }}</td>
                    <td>{{ $sala->telefone }}</td>
                    <td>{{ $sala->created_at }}</td>
                    <td class="text-center d-flex justify-content-around">
                        <a class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center action-button"
                            href="{{ route('sala.edit', ['sala_id' => $sala->id]) }}">
                            <img src="{{ URL::asset('/assets/edit_icon.svg') }}" width="15px" alt="Icon de edição">
                        </a>

                        <form action="{{ route('sala.delete', ['sala_id' => $sala->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            
                            <button
                                class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center action-button"
                                type="submit">
                                <img src="{{ URL::asset('/assets/delete.svg') }}" width="20px" alt="Icon de remoção">
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-3">
        <a class="w-100 btn btn-primary" href="{{ route('sala.create', ['predio_id' => $predio->id]) }}">Cadastrar</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#sala_table').DataTable({
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
@endsection
