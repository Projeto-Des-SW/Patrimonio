@extends('layouts.app')
@section('content')
    @include('layouts.components.header', ['page_title' => 'Editar Sala', 'back' => true])

    <form method="POST" action="{{ route('sala.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('sala.form')

        <div class="row mt-4">
            <div class="d-flex justify-content-start">
                <button type="submit" style="width: 150px" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('sala.delete', ['sala_id' => $sala->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('DELETE')

        <div class="row mt-4">
            <div class="d-flex justify-content-start">
                <button style="width: 150px" class="btn btn-danger" type="submit"> Deletar </button>
            </div>
        </div>
    </form>
@endsection
