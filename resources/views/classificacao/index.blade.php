@extends('layouts.app')
@section('content')
    <div class="row">
    @include('layouts.components.header', ['page_title' => 'Classificações', 'back' => false])        
    </div>

    <table class="table table-hover table-responsive mx-2 mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Data de Criação</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classificacaos as $classificacao)
            <tr>
                <td>{{$classificacao->id}}</td>
                <td>{{$classificacao->nome}}</td>
                <td>{{$classificacao->created_at}}</td>
                <td class="text-center">
                <a class="btn btn-primary rounded-circle" href="{{route('classificacao.edit', ['classificacao_id' => $classificacao->id])}}">
                        <img src="{{URL::asset('/assets/edit_icon.svg')}}" width="15px" alt="Icon de edição"> 
                    </a> 
                    <a
                        class="btn btn-danger rounded-circle" href="{{route('classificacao.delete', ['classificacao_id' => $classificacao->id])}}">
                        <img src="{{URL::asset('/assets/delete.svg')}}" width="20px" alt="Icon de remoção">                         
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-3">
            <a class="w-100 btn btn-primary" href="{{route('classificacao.create')}}">Cadastrar</a>
        </div>

@endsection
