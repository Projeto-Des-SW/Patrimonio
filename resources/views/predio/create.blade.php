@extends('layouts.app')
@section('content')
    <h3 class="text-center">Cadastro de Prédio</h3>
    <form method="POST" action="{{route('predio.store')}}" enctype="multipart/form-data">
        @csrf
        @include('predio.form')
        <div class="row mt-4">
            <div class="col-3">
                <a class="btn btn-secondary w-100" href="{{route('predio.index')}}">Voltar</a>
            </div>
            <div class="col-3 offset-6">
                <button type="submit" class="btn btn-success w-100">Cadastrar</button>
            </div>
        </div>
    </form>
@endsection