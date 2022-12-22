@extends('layouts.app')
@section('content')
    <h3 class="text-center">Edição de Prédio</h3>
    <form method="POST" action="{{route('predio.update')}}" enctype="multipart/form-data">
        @csrf
        @include('predio.form')
        @include('layouts.components.btn_forms')
    </form>
@endsection
