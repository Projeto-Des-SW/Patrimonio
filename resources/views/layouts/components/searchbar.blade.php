<div class="my-5 col-md-8 mx-auto">
    <div class="d-flex align-items-center mb-2">
        <h3>{{ $title }}</h3>
        @if (isset($addButton))
            <a href="{{ $addButton }}" style="margin-left: 5px;">
                <img src="{{ asset('assets/plus-circle-fill.svg') }}" alt="Ícone de Adição"
                    style="width: 30px; height: 30px;">
            </a>
        @endif
        @if (isset($addButtonModal))
            <button style="background-color: transparent; border: none; margin-left: 5px;"
                    @if(isset($addButtonModal['modal']))
                        data-bs-toggle="modal" data-bs-target="#{{ $addButtonModal['modal'] }}" 
                    @endif>
                <img src="{{ asset('assets/plus-circle-fill.svg') }}" alt="Ícone de Adição"
                    style="width: 30px; height: 30px;">
            </button>
        @endif
    </div>

    @if (isset($searchForm))
        <div class="d-flex justify-content-center align-items-center">
            <div class="flex-fill">
                <form class="mb-0" action="{{ $searchForm }}" method="get">
                    <div class="input-group">
                        <input class="form-control" type="text" name="busca" id="busca"
                            placeholder="Pesquisar por nome">
                        <button style="background-color: #1A2876" class="btn" type="submit">
                            <img src="{{ asset('images/busca.png') }}" alt="Buscar">
                        </button>
                    </div>
                </form>
            </div>
            <div class="ms-3">
                <button style="background-color: transparent; border: none; display: flex; align-items: center;">
                    <img src="{{ asset('assets/Vector.svg') }}" alt="Ícone de filtro" style="margin-right: 10px;">
                    <span style="color: #1A2876;">Filtrar</span>
                </button>
            </div>
        </div>
    @endif
</div>
