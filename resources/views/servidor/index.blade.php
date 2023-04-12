@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="">
            @include('layouts.components.header', ['page_title' => 'Servidores', 'back' => false])

        </div>
    </div>

    <table class="table table-hover table-responsive mt-4" id="servidor_table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Cargo</th>
            <th scope="col">Status</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($servidors as $servidor)
            <tr>
                <td>{{\App\Models\User::withTrashed()->find($servidor->user_id)->id}}</td>
                <td>{{\App\Models\User::withTrashed()->find($servidor->user_id)->name}}</td>
                <td>{{$servidor->matricula}}</td>
                <td>{{$servidor->cargo->nome}}</td>
                <td>
                    @if($servidor->deleted_at == null)
                        <span>Ativo</span>
                    @else
                        <span>Desativado</span>
                    @endif
                </td>
                <td class="d-flex justify-content-around">
                    <a class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center action-button" href="{{route('servidor.edit', ['servidor_id' => $servidor->id])}}">
                        <img src="{{URL::asset('/assets/edit_icon.svg')}}" width="15px" alt="Icon de edição">
                    </a>
                    @if($servidor->deleted_at == null)
                    <a class="btn btn-danger d-flex align-items-center" href="{{route('servidor.delete', ['servidor_id' => $servidor->id])}}">DESATIVAR</a>
                    @else
                        <a class="btn btn-success d-flex align-items-center" href="{{route('servidor.restore', ['servidor_id' => $servidor->id])}}">ATIVAR</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex" style="max-width: 300px">
        <a class="w-100 btn btn-primary" style="margin-right: 10px" href="{{route('servidor.create')}}">Cadastrar</a>
        <a class="w-100 btn btn-outline-primary" href="{{ route('cargo.index') }}">Cargos</a>
    </div>

    <script>
        $(document).ready(function () {
            $('#servidor_table').DataTable({
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
                    "targets": [5],
                    "orderable": false
                }]
            });
        });
    </script>


@endsection
