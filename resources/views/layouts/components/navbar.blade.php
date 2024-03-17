<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top p-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
            @auth
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @if(Str::startsWith(request()->path(), 'patrimonio')) active @endif" href="{{ route('predio.index') }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Patrimônio
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('patrimonio.index') }}">Patrimônio</a></li>
                          <li><a class="dropdown-item" href="{{ route('classificacao.index') }}">Classificação contábil</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="{{ route('patrimonio.pdf') }}">Relatório</a></li>
                        </ul>
                      </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link @if(Str::startsWith(request()->path(), 'predio')) active @endif" href="{{ route('predio.index') }}">Prédios</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link @if(Str::startsWith(request()->path(), 'cargo')) active @endif" href="{{ route('cargo.index') }}">Cargos</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link @if(Str::startsWith(request()->path(), 'movimento')) active @endif" href="{{ route('movimento.index') }}">Movimentacões</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link @if(Str::startsWith(request()->path(), 'setor')) active @endif" href="{{ route('setor.index') }}">Setores</a>
                    </li>
                </ul>
                
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>
