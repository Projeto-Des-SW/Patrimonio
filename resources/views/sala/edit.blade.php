@extends('layouts.app')
@section('content')
    @include('layouts.components.header', ['page_title' => 'Editar Sala', 'back' => true])

    <form method="POST" action="{{route('sala.update')}}" enctype="multipart/form-data">
        @csrf
        @include('sala.form')
        <div class="row mt-4">
            <div class="d-flex justify-content-between">
                    <button type="submit" style="width: 150px" class="btn btn-success">Salvar</button>
                    <a style="width: 150px" class="btn btn-danger" href="{{route('sala.delete', ['sala_id' => $sala->id])}}"> Deletar </a>
            </div>
        </div>
    </form>
@endsection
