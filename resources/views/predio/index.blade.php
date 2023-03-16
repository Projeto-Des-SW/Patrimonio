@extends('layouts.app')
@section('content')
    <div class="row">
    @include('layouts.components.header', ['page_title' => 'Prédios', 'back' => false])
    </div>

    <table class="table table-hover table-responsive mx-2 mt-4">
        <thead>
        <tr style="background-color: #d3d3d4">
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Data de Criação</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($predios as $predio)
            <tr>
                <td>{{$predio->id}}</td>
                <td>{{$predio->nome}}</td>
                <td>{{$predio->created_at}}</td>
                <td class="text-center">
                    <a class="btn btn-primary rounded-circle" href="{{route('predio.edit', ['predio_id' => $predio->id])}}">
                        <img src="{{URL::asset('/assets/edit_icon.svg')}}" width="15px" alt="Icon de edição"> 
                    </a>    
                    <a class="btn btn-danger rounded-circle" href="{{route('predio.delete', ['predio_id' => $predio->id])}}">
                        <img src="{{URL::asset('/assets/delete.svg')}}" width="20px" alt="Icon de remoção">                         
                    </a> 
                    <a class="btn btn-primary rounded-circle" href="{{route('sala.index', ['predio_id' => $predio->id])}}">
                        <img src="{{URL::asset('/assets/salas.svg')}}" width="20px" alt="Icon de salas">                         
                    </a>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-3">
            <a class="w-100 btn btn-primary" href="{{route('predio.create')}}">Cadastrar</a>
        </div>

@endsection
