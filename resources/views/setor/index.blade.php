@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="">
            <h3 class="text-center">Lista de @if (isset($setor_pai))
                    Setores de {{ $setor_pai->nome }}
                @else
                    Coordenações
                @endif
            </h3>
        </div>
    </div>

    <div class="container">
        <table class="table table-hover shadow-lg" style="border-radius: 10px; overflow:hidden; ">
            <thead class="text-md-center" style="background-color: #1A2876; color: white;">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($setores as $setor)
                    <tr class="text-md-center">
                        <td class="py-4">{{ $setor->id }}</td>
                        <td class="py-4">{{ $setor->nome }}</td>
                        <td class="py-4">{{ $setor->codigo }}</td>
                        <td class="py-4">
                            <div>
                                <a href="{{ route('setor.edit', ['setor_id' => $setor->id]) }}">
                                    <img src="{{asset('/images/pencil.png')}}" width="24px" alt="Icon de edição">
                                </a>
                                <a href="{{ route('setor.delete', ['setor_id' => $setor->id]) }}" method="post">
                                    <img src="{{asset('/images/delete.png')}}" width="24px" alt="Icon de remoção">
                                </a>
                                <a href="{{ route('setor.index', ['setor_pai_id' => $setor->id]) }}">
                                    <img src="{{asset('/images/vision.png')}}" width="24px" alt="Icon de remoção">
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <td class="text-center" colspan="4">Ainda não existem setores cadastrados</td>
                    @endempty
            </tbody>
        </table>
    </div>
    @if (isset($setor_pai))
        <div class="row mt-4">
            <div class="col-3">
                <button class="btn btn-secondary w-100" onclick="window.history.go(-1); return false;">Voltar</button>
            </div>
        </div>
    @endif

    <div class="col-3">
        @if (isset($setor_pai))
            <a class="w-100 btn btn-primary" style="max-width: 200px"
                href="{{ route('setor.create', ['setor_pai_id' => $setor_pai->id]) }}">Cadastrar</a>
        @else
            <a class="w-100 btn btn-primary" style="max-width: 200px" href="{{ route('setor.create') }}">Cadastrar</a>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#setor_table').DataTable({
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
