@extends('layouts.app')
@section('content')
    <h3 class="text-center">Cadastro de Prédio</h3>
    <form method="POST" action="{{route('predio.store')}}" enctype="multipart/form-data">
        @csrf
        @include('predio.form')
        @include('layouts.components.btn_forms')
    </form>
@endsection
