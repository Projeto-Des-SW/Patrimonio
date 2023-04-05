@php
    $active = '';
    $route_name = \Illuminate\Support\Facades\Route::currentRouteName();
    if ($route_name == $route_route_name || Str::startsWith($route_name, $route_route_name)) {
        $active = 'active';
    }
@endphp
<li class="nav-item btn btn-outline-primary my-1 mx-2 {{ $active }}" style="border: none;">
    <a class="nav-link" href="{{ $route_link }}">{{ $route }}</a>
</li>
