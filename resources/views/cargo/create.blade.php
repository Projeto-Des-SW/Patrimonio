@extends('layouts.app')
@section('content')
    @include('layouts.components.header', ['page_title' => 'Criar Prédio', 'back' => true])

    <form method="POST" action="{{route('cargo.store')}}" enctype="multipart/form-data">
        @csrf
        @include('cargo.form')
        <div class="row mt-4">
           
            <div class="col-3">
                <button type="submit" class="btn btn-success w-100">Cadastrar</button>
            </div>
        </div>
    </form>
@endsection
