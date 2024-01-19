<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            {{ config('app.name', 'Laravel') }}
        </a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    
                @else

                    <div class="nav-link nav-item">
                        <a href="{{route('patrimonio.index')}}">Patrimônio</a>
                        <a href="{{route('predio.index')}}">Prédios</a>
                        <a href="{{route('cargo.index')}}">Cargos</a>
                        <a href="{{route('classificacao.index')}}">Classificacão Contábil</a>
                        <a href="{{route('movimento.index')}}">Movimentacões</a>
                        <a href="{{route('setor.index')}}">Setores</a>
                    </div>


                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Sair') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<script>
    
</script>