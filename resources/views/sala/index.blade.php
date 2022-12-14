@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-9">
            <h3 class="text-center">Lista de Salas</h3>
        </div>
        <div class="col-3">
            <a class="w-100 btn btn-primary" href="{{route('sala.create', ['predio_id' => $predio->id])}}">Cadastrar</a>
        </div>
    </div>

    <table class="table table-hover table-responsive mx-2 mt-4">
        <thead>
        <tr style="background-color: #d3d3d4">
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de Criação</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salas as $sala)
            <tr>
                <td>{{$sala->nome}}</td>
                <td>{{$sala->telefone}}</td>
                <td>{{$sala->created_at}}</td>
                <td class="text-center"><a class="btn btn-primary" href="{{route('sala.edit', ['sala_id' => $sala->id])}}">Editar</a> <a
                        class="btn btn-danger" href="{{route('sala.delete', ['sala_id' => $sala->id])}}">Deletar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row mt-4">
        <div class="col-3"><a class="btn btn-secondary w-100" href="{{route('predio.index')}}">Voltar</a></div>
    </div>

@endsection
