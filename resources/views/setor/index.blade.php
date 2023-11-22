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

    <table class="table table-hover table-responsive mx-2 mt-4" id="setor_table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Código</th>
                <th class="text-center" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($setores as $setor)
                <tr>
                    <td>{{ $setor->id }}</td>
                    <td>{{ $setor->nome }}</td>
                    <td>{{ $setor->codigo }}</td>
                    <td class="text-center d-flex justify-content-around">
                        <a class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center action-button"
                            href="{{ route('setor.edit', ['setor_id' => $setor->id]) }}">
                            <img src="{{ URL::asset('/assets/edit_icon.svg') }}" width="15px" alt="Icon de edição">
                        </a>

                        <form action="{{ route('setor.delete', ['setor_id' => $setor->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button
                                class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center action-button"
                                type="submit">
                                <img src="{{ URL::asset('/assets/delete.svg') }}" width="20px" alt="Icon de remoção">
                            </button>
                        </form>

                        <a class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center action-button"
                            href="{{ route('setor.index', ['setor_pai_id' => $setor->id]) }}">
                            <img src="{{ URL::asset('/assets/setores.svg') }}" width="20px" alt="Icon de edição">
                        </a>
                    </td>
                </tr>
            @empty
                <td class="text-center" colspan="4">Ainda não existem setores cadastrados</td>
            @endempty
    </tbody>
</table>
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
