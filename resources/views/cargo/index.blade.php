@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="/css/patrimonio.css">


<div class="container">
    <div>
        <h3>
            Cargos  <a href="{{ route('cargo.create') }}"> <img class="rounded-4" style="background-color: #1A2876" src="{{asset('images/adicionar.png')}}" alt=""></a>
        </h3>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-11">
            <form action="{{route('patrimonio.busca.get')}}" method="get">
                <div class="input-group">
                    <input  class="form-control" type="text" name="busca" id="busca" placeholder="Pesquisar por nome">
                    <button style="background-color: #1A2876" class="btn" type="submit"><img src="{{asset('images/busca.png')}}" alt=""></button>
                </div>
            </form>
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary">filtro</button>
        </div>
    </div>

    <br>
    <table class="table table-hover shadow-lg" style="border-radius: 10px; overflow:hidden;">
        <thead class="text-md-center" style="background-color: #1A2876; color: white;">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cargos as $cargo)
                <tr class="text-md-center">
                    <td class="py-4">{{ $cargo->id }}</td>
                    <td class="py-4">{{ $cargo->nome }}</td>
                    <td class="py-4">{{ $cargo->created_at }}</td>
                    <td class="py-4">
                        <a href="{{ route('cargo.edit', ['cargo_id' => $cargo->id]) }}">
                            <img src="{{asset('/images/pencil.png')}}" width="24px" alt="Icon de edição">

                        </a>
                        <a href="{{ route('cargo.delete', ['cargo_id' => $cargo->id]) }}">
                            <img src="{{asset('/images/delete.png')}}" width="24px" alt="Icon de remoção">
                        </a>
                            
    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>


    <script>
        $(document).ready(function() {
            $('#cargo_table').DataTable({
                searching: true,
                "language": {
                    "search": "Pesquisar: ",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Exibindo página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "zeroRecords": "Nenhum registro disponível",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próximo"
                    }
                },
                "columnDefs": [{
                    "targets": [3],
                    "orderable": false
                }]
            });
        });
    </script>
@endsection
