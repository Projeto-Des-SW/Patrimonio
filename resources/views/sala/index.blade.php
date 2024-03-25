@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/layouts/searchbar.css">
    <link rel="stylesheet" href="/css/layouts/table.css">
    <link rel="stylesheet" href="/css/modal.css">
@endpush

@section('content')
    @if (isset($predio))
        @include('layouts.components.searchbar', [
            'title' => 'Prédios > Salas',
            'titleLink' => Route('predio.index', ['predio_id' => $predio->id]),
            'addButtonModal' => ['modal' => 'cadastrarSalaModal'],
            'searchForm' => route('sala.buscar'),
        ]);
    @else
        @include('layouts.components.searchbar', [
            'title' => 'Salas',
            'searchForm' => route('sala.buscar'),
        ]);
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {{-- <div class="Nome-predio text-center">
                <h3 style="color: #3252c1; font-weight: bold;" >{{ $predio->nome }}</h3>
            </div> --}}
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
                                    <a onclick="openEditSalaModal('{{ $sala->id }}', '{{ $sala->predio_id }}')"
                                        style="cursor: pointer;">
                                        <img src="{{ asset('/images/pencil.png') }}" width="24px" alt="Icon de edição">
                                    </a>
                                    <form action="{{ route('sala.delete', ['sala_id' => $sala->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none;">
                                            <img src="{{ asset('/images/delete.png') }}" width="24px"
                                                alt="Icon de remoção">
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

    @include('layouts.components.modais.ModalCreate', [
        'modalId' => 'cadastrarSalaModal',
        'modalTitle' => 'Cadastrar Sala',
        'formAction' => route('sala.store'),
        'fields' => [
            ['name' => 'predio_id', 'id' => 'predio_id', 'type' => 'hidden', 'value' => $predio->id],
            ['name' => 'nome', 'id' => 'nome', 'type' => 'text'],
            ['name' => 'telefone', 'id' => 'telefone', 'type' => 'text'],
        ]
    ])

    @include('layouts.components.modais.ModalEdit', [
        'modalId' => 'editarSalaModal',
        'modalTitle' => 'Editar Sala',
        'formAction' => route('sala.update', ['sala_id' => '']),
    ])
@endsection

@push('scripts')
    <script>
        function openEditSalaModal(salaId, predioId) {
            $('#editarSalaModal').modal('show');
            $('#sala_id').val(salaId);
            $('#predio_id').val(predioId);
        }
    </script>
@endpush
