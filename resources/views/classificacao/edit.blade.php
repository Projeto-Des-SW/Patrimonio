@extends('layouts.app')
@section('content')
@include('layouts.components.header', ['page_title' => 'Editar Classificação Contábil', 'back' => true])

    <form method="POST" action="{{route('classificacao.update')}}" enctype="multipart/form-data">
        @csrf
        @include('classificacao.form')
        <div class="row mt-4">
        <div class="d-flex justify-content-between">
                <button type="submit" style="width: 150px" class="btn btn-success">Salvar</button>
                <a style="width: 150px" class="btn btn-danger" href="{{route('classificacao.delete', ['classificacao_id' => $classificacao->id])}}"> Deletar </a>
            </div>
        </div>
    </form>
@endsection
