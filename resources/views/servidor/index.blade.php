@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-9">
            <h3 class="text-center">Servidores</h3>
        </div>
    </div>

    <table class="table table-hover table-responsive mt-4">
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
                <td>
                    <a class="btn btn-primary rounded-circle" href="{{route('servidor.edit', ['servidor_id' => $servidor->id])}}">
                        <img src="{{URL::asset('/assets/edit_icon.svg')}}" width="15px" alt="Icon de edição"> 
                    </a>
                    @if($servidor->deleted_at == null)
                    <a class="btn btn-danger" href="{{route('servidor.delete', ['servidor_id' => $servidor->id])}}">DESATIVAR</a>
                    @else
                        <a class="btn btn-success" href="{{route('servidor.restore', ['servidor_id' => $servidor->id])}}">ATIVAR</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex" style="max-width: 300px">
        <a class="w-100 btn btn-primary" style="margin-right: 10px" href="{{route('servidor.create')}}">Cadastrar</a>
        <a class="w-100 btn btn-outline-primary" href="{{route('servidor.create')}}">Cargos</a>
    </div>


@endsection
