<nav class="bg-white">
    <ul class="navbar-nav px-6" style="width: 240px;">
        @auth

            @if(Auth::user()->hasAnyRoles(['Administrador']))
                @include('layouts.components.navitem', ['route' => __('Prédios'), 'route_link' => route('predio.index'), 'route_route_name' => 'predio', 'icon_name' => 'predio.svg'])
                @include('layouts.components.navitem', ['route' => __('Cargos'), 'route_link' => route('cargo.index'), 'route_route_name' => 'cargo', 'icon_name' => 'cargos.svg'])
                @include('layouts.components.navitem', ['route' => __('Classificação Contábil'), 'route_link' => route('classificacao.index'), 'route_route_name' => 'classificacao', 'icon_name' => 'classificacao.svg'])
                @include('layouts.components.navitem', ['route' => __('Servidores'), 'route_link' => route('servidor.index'), 'route_route_name' => 'servidor', 'icon_name' => 'servidor.svg'])
                @include('layouts.components.navitem', ['route' => __('Setores'), 'route_link' => route('setor.index'), 'route_route_name' => 'setor', 'icon_name' => 'setores.svg'])
                @include('layouts.components.navitem', ['route' => __('Patrimônios'), 'route_link' => route('patrimonio.index'), 'route_route_name' => 'patrimonio', 'icon_name' => 'patrimonio.svg'])
                @include('layouts.components.navitem', ['route' => __('Movimentações'), 'route_link' => route('movimento.index'), 'route_route_name' => 'movimento', 'icon_name' => 'movimentacao.svg'])
            @endif
        @endauth
    </ul>

</nav>
