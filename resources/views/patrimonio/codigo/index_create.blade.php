@extends('layouts.app')
@section('content')
    @include('layouts.components.header', ['page_title' => 'Códigos do Patrimônio '. $patrimonio->nome, 'back' => true])
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right">
        <img src="{{URL::asset('/assets/plus.svg')}}" width="40px" alt="Icon de remoção">
    </button>
    <div class="row">
        @foreach($patrimonio->codigos as $index => $codigo)

            <div class="col-4 mt-2">
                <label for="codigo">Código {{$index+1}}:</label>
                <input class="form-control @error('codigo') is-invalid @enderror" id="codigo" type="text"
                       name="codigo" @if(isset($codigo->codigo)) value="{{$codigo->codigo}}"
                       @endif required
                       autocomplete="codigo" autofocus>
                @error('codigo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <a href="{{route('patrimonio.codigo.delete', ['codigo_id' => $codigo->id])}}">Deletar</a>
            </div>

        @endforeach
        @empty($patrimonio->codigos[0])
            <p>Não há códigos cadastrados ainda.</p>
        @endempty

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{route('patrimonio.codigo.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Código ao Patrimônio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('patrimonio.codigo.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
