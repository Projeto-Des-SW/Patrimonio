@extends('layouts.app')
@section('content')
    @include('layouts.components.header', ['page_title' => 'Editar Prédio', 'back' => true])

    <form method="POST" action="{{ route('cargo.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('cargo.form')

        <div class="row mt-4">
            <div class="d-flex justify-content-start">
                <button type="submit" style="width: 150px" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>

    <form action="{{ route('cargo.delete', ['cargo_id' => $cargo->id]) }}" method="post">
        @csrf
        @method('DELETE')

        <div class="row mt-4">
            <div class="d-flex justify-content-start">
                <button style="width: 150px" class="btn btn-danger" type="submit"> Deletar </button>
            </div>
        </div>
    </form>
@endsection
