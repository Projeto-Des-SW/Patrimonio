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

@include('layouts.components.modais.ModalCreate', [
    'modalId' => 'cadastrarCargoModal',
    'modalTitle' => 'Cadastrar Cargo',
    'formAction' => route('cargo.store')
])

@include('layouts.components.modais.ModalEdit', [
    'modalId' => 'editarCargoModal',
    'modalTitle' => 'Editar Cargo',
    'formAction' => route('cargo.update', ['cargo_id' => ''])
])

<script>
    function openEditarCargoModal(cargoId, cargoNome) {
        $('#editarCargoModal').modal('show');
        $('#cargo_id').val(cargoId);
        $('#nome').val(cargoNome);
    }
</script>

@endsection
