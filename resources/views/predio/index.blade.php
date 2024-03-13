@extends('layouts.app')
@section('content')
   
<link rel="stylesheet" href="/css/patrimonio.css">

<div class="container">

    <div>
        <h3>
            Prédio <a href="{{route('predio.create')}}"><img class="rounded-4" style="background-color: #1A2876" src="{{asset('images/adicionar.png')}}" alt=""></a>
        </h3>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-11">
            <form action="#" method="get">
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

    <table class="table table-hover shadow-lg" >
        <thead class="text-md-center">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($predios as $predio)
            <tr class="text-md-center">
                <td class="py-4">{{$predio->id}}</td>
                <td class="py-4">{{$predio->nome}}</td>
                <td class="py-4">{{$predio->created_at}}</td>
                <td class="py-4">
                    <div>
                        <a class="" href="{{route('predio.edit', ['predio_id' => $predio->id])}}">
                            <img src="{{asset('/images/pencil.png')}}" width="24px" alt="Icon de edição">
                        </a>
                        <a href="{{route('predio.delete', ['predio_id' => $predio->id])}}">
                        
                            <img src="{{asset('/images/delete.png')}}" width="24px" alt="Icon de remoção">
                        
                        <a class="" href="{{route('sala.index', ['predio_id' => $predio->id])}}">
                            <img src="{{asset('/images/Vector.png')}}" width="19px" alt="Icon de salas">
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
    











    <script>
        $(document).ready(function () {
            $('#predio_table').DataTable({
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
