@extends('layouts.app')
@section('content')
    <h3 class="text-center">Cadastro de Setor @if(isset($setor_pai)) - {{$setor_pai->nome}} @endif </h3>
    <form method="POST" action="{{route('setor.store')}}" enctype="multipart/form-data">
        @csrf
        @include('setor.form')
        <div class="row mt-4">
            <button style="max-width: 200px; margin-left: 15px" type="submit" class="btn btn-success w-100">Criar</button>
        </div>
    </form>
@endsection
