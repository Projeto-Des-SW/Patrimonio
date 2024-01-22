@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mb-4">
            <div class="row align-items-start">
                <h1 class="display-5">
                    <strong>
                        <a href="#" class="text-decoration-none link-primary">Patrimônio</a>
                        > Cadastrar patrimônio
                    </strong>
                </h1>
            </div>
        </div>
        <div>
            <form action="route('patrimonio.store')" method="post">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="nomeItem" class="form-label">Nome do item:</label>
                            <input type="text" class="form-control" name="nomeItem" id="nomeItem">
                        </div>
                        <div class="col">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <input type="text" class="form-control" name="descricao" id="descricao">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="classificacao" class="form-label">Classificação:</label>
                            <select class="form-select" aria-label="Selecione uma classificação" id="classificacao"
                                name="classificacao">
                                <option selected>Selecione uma classificação</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="origem" class="form-label">Origem:</label>
                            <select class="form-select" aria-label="Selecione uma Origem" id="origem" name="origem">
                                <option selected>Selecione uma Origem</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="situacao" class="form-label">Situação:</label>
                            <select class="form-select" aria-label="Selecione uma Situação" id="situacao" name="situacao">
                                <option selected>Selecione uma Situação</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="predio" class="form-label">Predio:</label>
                            <select class="form-select" aria-label="Default select example" id="predio" name="predio">
                                <option selected>Selecione um predio</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="sala" class="form-label">Sala:</label>
                            <select class="form-select" aria-label="Default select example" id="sala" name="sala">
                                <option selected>Selecione uma sala</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="servidor" class="form-label">Servidor:</label>
                            <select class="form-select" aria-label="Default select example" id="servidor" name="servidor">
                                <option selected>Selecione um servidor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="dataCompra" class="form-label">Data de compra:</label>
                            <input type="date" class="form-control" name="dataCompra" id="dataCompra">
                        </div>
                        <div class="col">
                            <label for="valorItem" class="form-label">Valor do item:</label>
                            <input type="number" class="form-control" name="valorItem" id="valorItem">
                        </div>
                        <div class="col">
                            <label for="contaContabil" class="form-label">Conta contábil:</label>
                            <input type="number" class="form-control" name="contaContabil" id="contaContabil">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="empenho" class="form-label">Empenho:</label>
                            <input type="text" class="form-control" name="empenho" id="empenho">
                        </div>
                        <div class="col">
                            <label for="notaFiscal" class="form-label">Nota fiscal:</label>
                            <input type="text" class="form-control" name="notaFiscal" id="notaFiscal">
                        </div>
                        <div class="col">
                            <label for="processoLicitacao" class="form-label">Processo de licitação:</label>
                            <select class="form-select" aria-label="Selecione o processo de licitação"
                                id="processoLicitacao" name="processoLicitacao">
                                <option selected>Selecione o processo de licitação</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <label for="#" class="mb-2">Bem privado?</label>
                            <div class="form-check d-flex justify-content-between px-0">
                                <input class="btn-check" type="radio" name="bemPrivado" id="privadoSim">
                                <label class="btn btn-primary col-5" for="privadoSim">
                                    Sim
                                </label>
                                <input class="btn-check" type="radio" name="bemPrivado" id="privadoNao" checked>
                                <label class="btn btn-primary col-5" for="privadoNao">
                                    Não
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="observacoes" class="form-label">Observações pertinentes a este
                                patrimônio:</label>
                            <textarea class="form-control" id="observacoes" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button class="btn btn-primary submit">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- <form method="POST" action="{{ route('patrimonio.store') }}" enctype="multipart/form-data">
        @csrf
        @include('patrimonio.form')
        <div class="row mt-4">
            <div class="">
                <button style="max-width: 200px" type="submit" class="btn btn-success w-100">Salvar</button>
            </div>
        </div>
    </form> --}}
@endsection
