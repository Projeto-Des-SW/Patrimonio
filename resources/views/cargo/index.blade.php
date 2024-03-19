@extends('layouts.app')
@section('content')

@push('styles')
    <link rel="stylesheet" href="/css/layouts/searchbar.css">
    <link rel="stylesheet" href="/css/layouts/table.css">
    <link rel="stylesheet" href="/css/modal.css">
@endpush

    @include('layouts.components.searchbar', [
        'title' => 'Cargos',
        'addButtonModal' => ['modal' => 'cadastrarCargoModal'],
        'searchForm' => route('patrimonio.busca.get'),
    ])

    <div class="col-md-10 mx-auto">
        @include('layouts.components.table', [
            'header' => ['ID', 'Nome', 'Data de Criação', 'Ações'],
            'content' => [$cargos->pluck('id'), $cargos->pluck('nome'), $cargos->pluck('created_at')],
            'acoes' => [
                ['modal' => 'editarCargoModal', 'id_param' => 'cargo_id', 'name_param' => 'nome', 'img' => asset('/images/pencil.png')],
                ['link' => 'cargo.delete', 'param' => 'cargo_id', 'img' => asset('/images/delete.png')]
            ]
        ])

    </div>

    <!-- Modal Cadastrar Cargo -->
<div class="modal fade" id="cadastrarCargoModal" tabindex="-1" aria-labelledby="cadastrarCargoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal bg-light">
            <div class="modal-header-predio">  
                <a href="#" data-bs-dismiss="modal" aria-label="Fechar">
                    <img src="{{ asset('assets/back.svg') }}" alt="Voltar">
                </a>
                <h5 class="modal-title mx-auto" id="cadastrarCargoModalLabel">Cadastrar Cargo</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('cargo.store') }}" method="POST">
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

<!-- Modal Editar Cargo -->
<div class="modal fade" id="editarCargoModal" tabindex="-1" aria-labelledby="editarCargoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal bg-light">
            <div class="modal-header-predio">  
                <a href="#" data-bs-dismiss="modal" aria-label="Fechar">
                    <img src="{{ asset('assets/back.svg') }}" alt="Voltar">
                </a>
                <h5 class="modal-title mx-auto" id="editarCargoModalLabel">Editar Cargo</h5>
            </div>
            <div class="modal-body">
                <form id="editarCargoForm" action="{{ route('cargo.update', ['cargo_id' => '']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cargo_id" id="cargo_id">
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
    function openEditarCargoModal(cargoId, cargoNome) {
        $('#editarCargoModal').modal('show');
        $('#cargo_id').val(cargoId);
    }
</script>

@endsection
