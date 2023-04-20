<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Patrimônio</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 3px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Relatório de Patrimônio</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Classificação</th>
                <th>Origem</th>
                <th>Situação</th>
                <th>Prédio</th>
                <th>Sala</th>
                <th>Servidor</th>
                <th>Data de Compra</th>
                <th>Valor do Item</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patrimonio as $item)
                <tr>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->descricao }}</td>
                    <td>{{ $item->classificacao->nome }}</td>
                    <td>{{ $item->origem->nome }}</td>
                    <td>{{ $item->situacao->nome }}</td>
                    <td>{{ $item->sala->nome }}</td>
                    <td>{{ $item->sala->nome }}</td>
                    <td>{{ $item->servidor->user->name }}</td>
                    <td>{{ $item->data_compra }}</td>
                    <td>{{ number_format($item->valor, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
