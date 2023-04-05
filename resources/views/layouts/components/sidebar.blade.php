<nav class="bg-white">
    <ul class="navbar-nav px-6" style="width: 240px;">
        @auth
            @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 1)
                @include('layouts.components.navitem', ['route' => __('Prédios'), 'route_link' => route('predio.index'), 'route_route_name' => 'predio'])
                @include('layouts.components.navitem', ['route' => __('Cargos'), 'route_link' => route('cargo.index'), 'route_route_name' => 'cargo'])
                @include('layouts.components.navitem', ['route' => __('Classificações'), 'route_link' => route('classificacao.index'), 'route_route_name' => 'classificacao'])
                @include('layouts.components.navitem', ['route' => __('Servidores'), 'route_link' => route('servidor.index'), 'route_route_name' => 'servidor'])
                @include('layouts.components.navitem', ['route' => __('Setores'), 'route_link' => route('setor.index'), 'route_route_name' => 'setor'])
                @include('layouts.components.navitem', ['route' => __('Patrimônios'), 'route_link' => route('patrimonio.index'), 'route_route_name' => 'patrimonio'])
                @include('layouts.components.navitem', ['route' => __('Movimentações'), 'route_link' => route('movimento.index'), 'route_route_name' => 'movimento'])
            @endif
        @endauth
    </ul>

</nav>
