@extends('layouts.app')
@section('content')
    @include('layouts.components.header', [
        'page_title' => 'Editar Classificação Contábil',
        'back' => true,
    ])

    <form method="POST" action="{{ route('classificacao.update') }}" enctype="multipart/form-data">
        @csrf
        @include('classificacao.form')
        <div class="row mt-4">
            <div class="d-flex justify-content-between">
                <button type="submit" style="width: 150px" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>

    {{-- <form action="{{ route('classificacao.delete', ['classificacao_id' => $classificacao->id]) }}" method="post">
        <button style="width: 150px" class="btn btn-danger" type="submit"> Deletar </button>
    </form> --}}
@endsection
