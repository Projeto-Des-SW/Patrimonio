@extends('layouts.app')

@section('css')
    <style>
        .labels {
            color: #1A2876;
            font-weight: 700
        }

        .selects {
            color: grey;
            opacity: 0.7;
            font-weight: 400
        }
    </style>
@endsection

@section('content')
    <div class="mt-5 mx-auto" style="width: 83%">
        <div class="mb-5">
            <div class="row align-items-start">
                <h1 class="display-6" style="font-weight: 500; color: grey">
                    <strong>
                        <a href="#" class="text-decoration-none link-primary">Patrimônio</a>
                        > Cadastrar patrimônio
                    </strong>
                </h1>
            </div>
        </div>
        <div>
            <form action="{{ route('patrimonio.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="nome" class="form-label labels">Nome do
                                item:</label>
                            <input type="text" class="form-control" name="nome" id="nome" required>
                        </div>
                        <div class="col">
                            <label for="descricao" class="form-label labels">Descrição:</label>
                            <input type="text" class="form-control" name="descricao" id="descricao" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="classificacao" class="form-label labels">Classificação:</label>
                            <select class="form-select selects" aria-label="Selecione uma classificação" id="subgrupo_id"
                                name="subgrupo_id">
                                <option selected>Selecione uma classificação</option>
                                @foreach ($subgrupos as $subgrupo)
                                    <option value="{{ $subgrupo->id }}">{{ $subgrupo->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="origem" class="form-label labels">Origem:</label>
                            <select class="form-select selects" aria-label="Selecione uma Origem" id="origem_id"
                                name="origem_id">
                                <option selected>Selecione uma Origem</option>
                                @foreach ($origens as $origem)
                                    <option value="{{ $origem->id }}">{{ $origem->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="situacao" class="form-label labels">Situação:</label>
                            <select class="form-select selects" aria-label="Selecione uma Situação" id="situacao_id"
                                name="situacao_id">
                                <option selected>Selecione uma Situação</option>
                                @foreach ($situacoes as $situacao)
                                    <option value="{{ $situacao->id }}">{{ $situacao->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="predio" class="form-label labels">Predio:</label>
                            <select class="form-select selects" onchange="filtrarSalas()" aria-label="Selecione um predio"
                                id="predio_id" name="predio_id">
                                <option selected>Selecione um predio</option>
                                @foreach ($predios as $predio)
                                    <option value="{{ $predio->id }}">{{ $predio->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="sala" class="form-label labels">Sala:</label>
                            <select class="form-select selects" aria-label="Selecione uma sala" id="sala_id"
                                name="sala_id">
                                <option selected>Selecione uma sala</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="servidor" class="form-label labels">Servidor:</label>
                            <select class="form-select selects" aria-label="Selecione um servidor" id="servidor_id"
                                name="servidor_id">
                                <option selected>Selecione um servidor</option>
                                @foreach ($servidores as $servidor)
                                    <option value="{{ $servidor->id }}">{{ $servidor->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="data_compra" class="form-label labels">Data de compra:</label>
                            <input type="date" class="form-control selects" name="data_compra" id="data_compra">
                        </div>
                        <div class="col">
                            <label for="valor" class="form-label labels">Valor do item:</label>
                            <input type="number" class="form-control" name="valor" id="valor" required>
                        </div>
                        <div class="col">
                            <label for="contaContabil" class="form-label labels">Conta contábil:</label>
                            <input type="text" class="form-control" name="contaContabil" id="contaContabil" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="empenho" class="form-label labels">Empenho:</label>
                            <input type="text" class="form-control" name="empenho" id="empenho" required>
                        </div>
                        <div class="col">
                            <label for="nota_fiscal" class="form-label labels">Nota fiscal:</label>
                            <input type="text" class="form-control" name="nota_fiscal" id="nota_fiscal">
                        </div>
                        <div class="col">
                            <label for="processoLicitacao" class="form-label labels">Processo de licitação:</label>
                            <select class="form-select selects" aria-label="Selecione o processo de licitação"
                                id="processoLicitacao" name="processoLicitacao">
                                <option selected>Selecione o processo de licitação</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <label for="#" class="mb-2 labels">Bem privado?</label>
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
                            <label for="observacao" class="form-label labels">Observações pertinentes a este
                                patrimônio:</label>
                            <textarea class="form-control" id="observacao" name="observacao" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button class="btn btn-primary submit" style="bg-color: #3252C1">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Convertendo os dados PHP para JavaScript
        var predios = {!! json_encode($predios) !!};

        function filtrarSalas() {
            // Obter o valor selecionado do prédio
            var predioSelecionadoId = document.getElementById("predio_id").value;

            // Encontrar o prédio selecionado nos dados carregados
            var predioSelecionado = predios.find(function(predio) {
                return predio.id == predioSelecionadoId;
            });

            // Obter as salas do prédio selecionado
            var salasDoPredio = predioSelecionado ? predioSelecionado.salas : [];

            // Atualizar as opções do select de salas
            var selectSala = document.getElementById("sala_id");

            // Limpar as opções existentes
            selectSala.innerHTML = "";

            // Adicionar as novas opções
            for (var i = 0; i < salasDoPredio.length; i++) {
                var option = document.createElement("option");
                option.text = salasDoPredio[i].nome;
                option.value = salasDoPredio[i].id;
                selectSala.add(option);
            }
        }
    </script>
@endsection
