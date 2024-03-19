@extends('layouts.app')
@section('content')
   
<link rel="stylesheet" href="/css/modal.css">

@push('styles')
    <link rel="stylesheet" href="/css/layouts/searchbar.css">
    <link rel="stylesheet" href="/css/layouts/table.css">
@endpush

@include('layouts.components.searchbar', ['title' => 'Predios', 'addButtonModal' => ['modal' => 'cadastrarPredioModal'], 'searchForm' => route('predio.busca.get')])


<div class="row justify-content-center">
    <div class="col-md-10">
        <table class="table table-hover" >
            <thead class="text-md-center">
                <tr>
                    <th class = "col-2">ID</th> 
                    <th class = "col-3">Nome</th>
                    <th class = "col-3">Data de Criação</th>
                    <th class = "col-2">Ações</th>
                </tr>
            </thead>
                <tbody>
                @foreach($predios as $predio)
                    <tr class="text-md-center">
                        <td class="py-4">{{$predio->id}}</td>
                        <td class="py-4">{{$predio->nome}}</td>
                        <td class="py-4">{{$predio->created_at}}</td>
                        <td class="py-4">
                            <div class="d-flex align-items-center">
                                <a onclick="openEditModal('{{ $predio->id }}')" style="cursor: pointer; margin-right: 5px; text-decoration: none;  margin-left: 60px">
                                    <img src="{{ asset('/images/pencil.png') }}" width="24px" alt="Icon de edição">
                                </a>
                                <form id="deleteForm{{$predio->id}}" action="{{ route('predio.delete', ['predio_id' => $predio->id]) }}" method="POST" onsubmit="return confirmDelete(event, {{$predio->id}})">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; padding: 0; margin-right: 5px;">
                                        <img src="{{ asset('/images/delete.png') }}" width="24px" alt="Icon de remoção">
                                    </button>
                                </form>
                                <a href="{{ route('sala.index', ['predio_id' => $predio->id]) }}" style="text-decoration: none;">
                                    <img src="{{ asset('/images/Vector.png') }}" width="19px" alt="Icon de salas">
                                </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-5">
                {{ $predios->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>


@include('layouts.components.modais.ModalCreate', [
    'modalId' => 'cadastrarPredioModal',
    'modalTitle' => 'Cadastrar Prédio',
    'formAction' => route('predio.store')
])

@include('layouts.components.modais.ModalEdit', [
    'modalId' => 'editarPredioModal',
    'modalTitle' => 'Editar Prédio',
    'formAction' => route('predio.update', ['predio_id' => ''])
])

    <script>
            function openEditModal(predioId) {
        $('#editarPredioModal').modal('show');
        $('#predio_id').val(predioId);
    }   
        function confirmDelete(event, predioId) {
        event.preventDefault();
        if (confirm("Tem certeza que deseja excluir este prédio?")) {
            document.getElementById("deleteForm"+predioId).submit();
        }
    }

    </script>

@endsection
