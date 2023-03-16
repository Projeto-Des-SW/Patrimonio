@extends('layouts.app')
@section('content')
    @include('layouts.components.header', ['page_title' => 'Movimentar Patrimônios', 'back' => true])
    <form method="POST" action="{{route('movimento.store')}}" enctype="multipart/form-data">
        @csrf
        @include('movimento.form')
        <div class="row mt-4">
            <div class="">
                <button style="max-width: 200px" type="submit" class="btn btn-success w-100">Salvar</button>
            </div>
        </div>
    </form>
@endsection
