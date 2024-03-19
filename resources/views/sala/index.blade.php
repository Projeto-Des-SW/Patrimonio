@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/modal.css">

@push('styles')
    <link rel="stylesheet" href="/css/layouts/searchbar.css">
    <link rel="stylesheet" href="/css/layouts/table.css">
@endpush

@include('layouts.components.searchbar', [
    'title' => 'Predios > Salas',
    'titleLink' => Route('sala.index', ['predio_id' => $predio->id]),
    'addButtonModal' => ['modal' => 'cadastrarSalaModal'], 
    'searchForm' =>('#')]);

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="Nome-predio text-center">
                <h3 style="color: #3252c1; font-weight: bold;" >{{ $predio->nome }}</h3>
            </div>
            <table class="table table-hover mt-2">
                <thead class="text-md-center">
                    <tr>
                        <th class="col-2">Id</th>
                        <th class="col-2">Nome</th>
                        <th class="col-2">Telefone</th>
                        <th class="col-2">Data de Criação</th>
                        <th class="col-2">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-md-center">
                    @foreach ($salas as $sala)
                        <tr>
                            <td>{{ $sala->id }}</td>
                            <td>{{ $sala->nome }}</td>
                            <td>{{ $sala->telefone }}</td>
                            <td>{{ $sala->created_at }}</td>
                            <td class="text-center d-flex justify-content-center">
                                <a onclick="openEditSalaModal('{{ $sala->id }}', '{{ $sala->predio_id }}')" style="cursor: pointer;">
                                    <img src="{{ asset('/images/pencil.png') }}" width="24px" alt="Icon de edição">
                                </a>
                                <form action="{{ route('sala.delete', ['sala_id' => $sala->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none;">
                                            <img src="{{ asset('/images/delete.png') }}" width="24px" alt="Icon de remoção">
                                        </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-5">
                {{ $salas->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>


<!-- Modal Cadastrar Sala -->
<div class="modal fade" id="cadastrarSalaModal" tabindex="-1" aria-labelledby="cadastrarSalaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 800px;">
        <div class="modal-content custom-modal bg-light">
            <div class="modal-header-predio">  
                <a href="#" data-bs-dismiss="modal" aria-label="Fechar">
                    <img src="{{ asset('assets/back.svg') }}" alt="Voltar">
                </a>
                <h5 class="modal-title mx-auto" id="cadastrarSalaModalLabel">Cadastrar Sala</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('sala.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="predio_id" value="{{ $predio->id }}">
                    <div class="mb-3">
                        <label for="nome" class="form-label">
                            Nome <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control mb-3" id="nome" name="nome">
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">
                            Telefone <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control mb-3" id="telefone" name="telefone">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary button-add"> Adicionar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Editar Sala -->
<div class="modal fade" id="editarSalaModal" tabindex="-1" aria-labelledby="editarSalaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal bg-light">
            <div class="modal-header-predio">  
                <a href="#" data-bs-dismiss="modal" aria-label="Fechar">
                    <img src="{{ asset('assets/back.svg') }}" alt="Voltar">
                </a>
                <h5 class="modal-title mx-auto" id="editarSalaModalLabel">Editar Sala</h5>
            </div>
            <div class="modal-body">
                <form id="editarSalaForm" action="{{ route('sala.update', ['sala_id' => '']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="predio_id" id="predio_id">
                    <input type="hidden" name="sala_id" id="sala_id">
                    <div class="mb-3">
                        <label for="nome" class="form-label">
                            Nome <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control mb-3" id="editar_nome" name="nome">
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">
                            Telefone <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control mb-3" id="editar_telefone" name="telefone">
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

    function openEditSalaModal(salaId,predioId) {
        $('#editarSalaModal').modal('show');
        $('#sala_id').val(salaId);
        $('#predio_id').val(predioId);
    }

</script>

@endsection
