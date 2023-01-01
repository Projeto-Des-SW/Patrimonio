@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-9">
            <h3 class="text-center">Lista de Patrimonios</h3>
        </div>
        <div class="col-3">
            <a class="w-100 btn btn-primary" href="{{route('patrimonio.create')}}">Cadastrar</a>
        </div>
    </div>

    <table class="table table-hover table-responsive mx-2 mt-4">
        <thead>
        <tr style="background-color: #d3d3d4">
            <th scope="col">Nome</th>
            <th scope="col">Sala</th>
            <th scope="col">Classificação</th>
            <th scope="col">Situação</th>
            <th scope="col">Origem</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patrimonios as $patrimonio)
            <tr>
                <td>{{$patrimonio->nome}}</td>
                <td>{{$patrimonio->sala->nome}}</td>
                <td>{{$patrimonio->classificacao->nome}}</td>
                <td>{{$patrimonio->situacao->nome}}</td>
                <td>{{$patrimonio->origem->nome}}</td>
                <td class="text-center"><a class="btn btn-primary" href="{{route('patrimonio.edit', ['patrimonio_id' => $patrimonio->id])}}">Editar</a>
                    <a class="btn btn-danger" href="{{route('patrimonio.delete', ['patrimonio_id' => $patrimonio->id])}}">Deletar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
