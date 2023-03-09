@extends('layouts.app')
@section('content')
    @include('layouts.components.header', ['page_title' => 'Editar Prédio', 'back' => true])

    <form method="POST" action="{{route('cargo.update')}}" enctype="multipart/form-data">
        @csrf
        @include('cargo.form')
        <div class="row mt-4">
            <div class="d-flex justify-content-between">
                    <button type="submit" style="width: 150px" class="btn btn-success">Salvar</button>
                    <a style="width: 150px" class="btn btn-danger" href="{{route('cargo.delete', ['cargo_id' => $cargo->id])}}"> Deletar </a>
            </div>
        </div>
    </form>
@endsection
