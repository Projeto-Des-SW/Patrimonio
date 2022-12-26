@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-9">
            <h3 class="text-center">Lista de Cargos</h3>
        </div>
        <div class="col-3">
            <a class="w-100 btn btn-primary" href="{{route('cargo.create')}}">Cadastrar</a>
        </div>
    </div>

    <table class="table table-hover table-responsive mx-2 mt-4">
        <thead>
        <tr style="background-color: #d3d3d4">
            <th scope="col">Nome</th>
            <th scope="col">Data de Criação</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cargos as $cargo)
            <tr>
                <td>{{$cargo->nome}}</td>
                <td>{{$cargo->created_at}}</td>
                <td class="text-center"><a class="btn btn-primary" href="{{route('cargo.edit', ['cargo_id' => $cargo->id])}}">Editar</a>
                    <a class="btn btn-danger" href="{{route('cargo.delete', ['cargo_id' => $cargo->id])}}">Deletar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
