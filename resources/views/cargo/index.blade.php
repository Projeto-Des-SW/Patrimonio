@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.components.header', ['page_title' => 'Cargos', 'back' => false])
    </div>

    <div class="container">
        <table class="table table-hover shadow-lg" style="border-radius: 10px; overflow:hidden;">
            <thead class="text-md-center" style="background-color: #1A2876; color: white;">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cargos as $cargo)
                    <tr class="text-md-center">
                        <td class="py-4">{{ $cargo->id }}</td>
                        <td class="py-4">{{ $cargo->nome }}</td>
                        <td class="py-4">{{ $cargo->created_at }}</td>
                        <td class="py-4">
                            <a href="{{ route('cargo.edit', ['cargo_id' => $cargo->id]) }}">
                                <img src="{{asset('/images/pencil.png')}}" width="24px" alt="Icon de edição">

                            </a>
                            <a href="{{ route('cargo.delete', ['cargo_id' => $cargo->id]) }}">
                                <img src="{{asset('/images/delete.png')}}" width="24px" alt="Icon de remoção">
                            </a>
                                
        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-3">
        <a class="w-100 btn btn-primary" href="{{ route('cargo.create') }}">Cadastrar</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#cargo_table').DataTable({
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
