<div id="searchbar" class="my-5">
    <div class="d-flex align-items-center mb-2">
        <h3 id="title">{{ $title }}</h3>

        @if (isset($addButton))
            <a href="{{ $addButton }}" class="ms-2">
                <img src="{{ asset('assets/plus-circle-fill.svg') }}" alt="Ícone de Adição" id="addButton">
            </a>
        @endif
    </div>

    @if (isset($searchForm))
        <div class="d-flex justify-content-center align-items-center">
            <div class="flex-fill">
                <form class="mb-0" action="{{ $searchForm }}" method="get">
                    <div class="input-group">
                        <input class="form-control" type="text" name="busca" id="busca"
                            placeholder="Pesquisar por nome">
                        <button class="btn" type="submit" id="searchButton">
                            <img src="{{ asset('images/busca.png') }}" alt="Buscar">
                        </button>
                    </div>
                </form>
            </div>
            <div class="ms-3">
                <button class="px-0" id="filterButton">
                    <img src="{{ asset('assets/Vector.svg') }}" alt="Ícone de filtro" class="me-1">
                    <span>Filtrar</span>
                </button>
            </div>
        </div>
    @endif
</div>
