@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="">
            @include('layouts.components.header', ['page_title' => 'Patrimônios', 'back' => false])

        </div>

    </div>

    <table class="table table-hover table-responsive mx-2 mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Prédio</th>
            <th scope="col">Sala</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patrimonios as $patrimonio)
            <tr>
                <td>{{$patrimonio->id}}</td>
                <td>{{$patrimonio->nome}}</td>
                <td>{{$patrimonio->sala->predio->nome}}</td>
                <td>{{$patrimonio->sala->nome}}</td>
                <td>
                    <a class="btn btn-primary rounded-circle"
                       href="{{route('patrimonio.edit', ['patrimonio_id' => $patrimonio->id])}}">
                        <img src="{{URL::asset('/assets/edit_icon.svg')}}" width="15px" alt="Icon de edição">
                    </a>
                    <a class="btn btn-danger rounded-circle"
                       href="{{route('patrimonio.delete', ['patrimonio_id' => $patrimonio->id])}}">
                        <img src="{{URL::asset('/assets/delete.svg')}}" width="20px" alt="Icon de remoção">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex" style="max-width:600px">
        <a class="w-100 btn btn-primary" style="margin-right: 10px" href="{{route('patrimonio.create')}}">Cadastrar
            item</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px" href="{{route('classificacao.index')}}">Classificações</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px">Origens</a>
        <a class="w-100 btn btn btn-outline-primary" style="margin-right: 10px">Situações</a>
    </div>

@endsection
