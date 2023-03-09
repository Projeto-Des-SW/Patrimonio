@extends('layouts.app')
@section('content')
    @include('layouts.components.header', ['page_title' => 'Editar Sala', 'back' => true])

    <form method="POST" action="{{route('sala.update')}}" enctype="multipart/form-data">
        @csrf
        @include('sala.form')
        <div class="row mt-4">
            <div class="col-3 ">
                <button type="submit" class="btn btn-success w-100">Alterar</button>
            </div>
        </div>
    </form>
@endsection
