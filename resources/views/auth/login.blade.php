@extends('layouts.app')

<link rel="stylesheet" href="/css/home/login.css">



@section('content')
<div class="container teste-t">

    <div class="row">
        <section class="col-md-6 d-flex flex-column justify-content-center">
            <h2><strong>Patrimônio</strong></h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                 Labore facere quod voluptatem accusamus at id aliquam iste 
                 quam odio, pariatur alias consequuntur deleniti 
                consequatur debitis non libero ea explicabo! Adipisci.</p>
        </section>
    
    
        
        <div class="col-md-6 d-flex justify-content-end">
            <form class="shadow form-home" method="POST" action="{{ route('login') }}">
                @csrf
                <h4 class="text-md-center"><strong>Login</strong></h4>
                
                
                <div>
                    <label for="email">{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
            
                <div>
                    <label for="password">{{ __('Senha') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
            
        
                <div>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Lembre-se de mim') }}
                    </label>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                </div>

                <div class="text-md-center row">
                    <button type="submit" class="btn btn-primary col">
                        {{ __('Entrar') }}
                    </button>
                </div>
                <div class="text-md-center">
                    <p>Não possui conta? <a href="{{ route('register') }}">Crie agora</a> </p>
                </div>
            </form>
        </div>
    </div>
 
</div>
@endsection