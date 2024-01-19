@extends('layouts.app')
@section('content')
    <div class="row">
    @include('layouts.components.header', ['page_title' => 'Prédios', 'back' => false])
    </div>
    <div class="container">
        <table class="table table-hover shadow-lg" style="border-radius: 10px; overflow:hidden; " >
            <thead class="text-md-center" style="background-color: #1A2876; color: white;">
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
    </div>
    <div class="col-3">
            <a class="w-100 btn btn-primary" href="{{route('predio.create')}}">Cadastrar</a>
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
