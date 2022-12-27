@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-9">
            <h3 class="text-center">Lista de Servidores</h3>
        </div>
        <div class="col-3">
            <a class="w-100 btn btn-primary" href="{{route('servidor.create')}}">Cadastrar</a>
        </div>
    </div>

    <table class="table table-hover table-responsive mt-4">
        <thead>
        <tr style="background-color: #d3d3d4">
            <th scope="col">Nome</th>
            <th scope="col">E-Mail</th>
            <th scope="col">CPF</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Cargo</th>
            <th scope="col">Tipo do Usuário</th>
            <th scope="col">Status</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($servidors as $servidor)
            <tr>
                <td>{{\App\Models\User::withTrashed()->find($servidor->user_id)->name}}</td>
                <td>{{\App\Models\User::withTrashed()->find($servidor->user_id)->email}}</td>
                <td>{{\App\Models\User::withTrashed()->find($servidor->user_id)->tipo_usuario->nome}}</td>
                <td>{{$servidor->cpf}}</td>
                <td>{{$servidor->matricula}}</td>
                <td>{{$servidor->cargo->nome}}</td>
                <td>
                    @if($servidor->deleted_at == null)
                        <span style="color: #185718">Ativo</span>
                    @else
                        <span style="color: darkred">Desativado</span>
                    @endif
                </td>

                <td class="text-center">
                    <a class="btn btn-primary"
                                           href="{{route('servidor.edit', ['servidor_id' => $servidor->id])}}">Editar</a>
                    @if($servidor->deleted_at == null)
                    <a class="btn btn-danger" href="{{route('servidor.delete', ['servidor_id' => $servidor->id])}}">Desativar</a>
                    @else
                        <a class="btn btn-success" href="{{route('servidor.restore', ['servidor_id' => $servidor->id])}}">Reativar</a>
                    @endif

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
