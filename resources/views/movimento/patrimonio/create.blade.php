<div class="row mt-4">
    <div class="col-11">
        <h3>Adicionar Patrimônios a Movimentação</h3>
    </div>
    <div class="col-1">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#patrimonioModal"
                style="float: right;">
            <img src="{{URL::asset('/assets/plus.svg')}}" width="40px" alt="Icon de remoção">
        </button>
    </div>

    <table class="table table-hover table-responsive mx-2 mt-4">
        <thead>
        <tr style="background-color: #d3d3d4">
            <th scope="col">#</th>
            <th scope="col">Nome do ítem</th>
            <th scope="col">Prédio</th>
            <th scope="col">Sala</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movimento->itens_movimento as $patrimonio)
            <tr>
                <td>{{$patrimonio->id}}</td>
                <td>{{$patrimonio->nome}}</td>
                <td>{{$patrimonio->sala->predio->nome}}</td>
                <td>{{$patrimonio->sala->nome}}</td>
                <td>
                    <a class="btn btn-danger rounded-circle"
                       href="{{route('movimento.patrimonio.delete', ['movimento_patrimonio_id' => $patrimonio->pivot->id])}}">
                        <img src="{{URL::asset('/assets/delete.svg')}}" width="20px" alt="Icon de remoção">
                    </a>
                </td>
            </tr>
        @endforeach
        @empty($movimento->itens_movimento[0])
            <tr>
                <td colspan="5" class="text-center">Ainda não há patrimônios atrelados a essa movimentação</td>
            </tr>
        @endempty
        </tbody>
    </table>

    @if(isset($movimento->itens_movimento[0]))
        <div class="row">
            <div class="col-4 offset-8">
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#conclusaoModal">Concluir</button>
            </div>
        </div>
    @endif
</div>

@include('movimento.patrimonio.modal_form')
@include('movimento.patrimonio.modal_conclusao')
