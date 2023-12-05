@extends('layouts.app')
@section('content')
    @include('layouts.components.header', ['page_title' => 'Editar servidor', 'back' => true])
    <form method="POST" action="{{ route('servidor.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('servidor.form')
        <div style="margin-top: 30px" class="d-flex justify-content-between">
            <button style="max-width: 150px" type="submit" class="btn btn-success w-100">Salvar</button>
        </div>
    </form>

    <form action="{{ route('servidor.delete', ['servidor_id' => $servidor->id]) }}" method="post">
        @csrf
        @method('DELETE')

        <div style="margin-top: 30px" class="d-flex justify-content-between">
            <button style="width: 150px" class="btn btn-danger" type="submit"> Deletar </button>
        </div>
    </form>
@endsection
