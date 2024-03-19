@extends('layouts.app')
@section('content')
   
<link rel="stylesheet" href="/css/patrimonio.css">
<link rel="stylesheet" href="/css/modal.css">

@include('layouts.components.searchbar', ['title' => 'Predios', 'addButtonModal' => ['modal' => 'cadastrarPredioModal'], 'searchForm' => route('predio.busca.get')]);


<div class="container">
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
</div>


<!-- Modal Cadastrar Prédio -->
<div class="modal fade" id="cadastrarPredioModal" tabindex="-1" aria-labelledby="cadastrarPredioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal bg-light">
            <div class="modal-header-predio">  
                <a href="#" data-bs-dismiss="modal" aria-label="Fechar">
                    <img src="{{ asset('assets/back.svg') }}" alt="Voltar">
                </a>
                <h5 class="modal-title mx-auto" id="cadastrarPredioModalLabel">Cadastrar Prédio</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('predio.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nome" class="form-label">
                            Nome <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control mb-3" id="nome" name="nome">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary button-add"> Adicionar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Editar Prédio -->
<div class="modal fade" id="editarPredioModal" tabindex="-1" aria-labelledby="editarPredioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal bg-light">
            <div class="modal-header-predio">  
                <a href="#" data-bs-dismiss="modal" aria-label="Fechar">
                    <img src="{{ asset('assets/back.svg') }}" alt="Voltar">
                </a>
                <h5 class="modal-title mx-auto" id="editarPredioModalLabel">Editar Prédio</h5>
            </div>
            <div class="modal-body">
                <form id="editarForm" action="{{ route('predio.update', ['predio_id' => '']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="predio_id" id="predio_id">
                    <div class="mb-3">
                        <label for="nome" class="form-label">
                            Nome <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control mb-3" id="nome" name="nome">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary button-edit"> Salvar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
