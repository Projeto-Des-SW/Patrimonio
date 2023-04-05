@php
    $active = '';
    $icon_name;
    $route_name = \Illuminate\Support\Facades\Route::currentRouteName();
    if ($route_name == $route_route_name || Str::startsWith($route_name, $route_route_name)) {
        $active = 'active';
    }
@endphp
<li class="nav-item btn btn-outline-primary my-1 mx-2 {{ $active }} d-flex align-items-center" style="border: none;">
    <object type="image/svg+xml" data="{{ URL::asset('/assets/sidebar-icons/' . $icon_name) }}">
        <img class="sidebar-icon" src="{{ URL::asset('/assets/sidebar-icons/' . $icon_name) }}" width="15px" alt="Icon navbar"> 
    </object>
    <a style="margin-left: 20px" class="nav-link" href="{{ $route_link }}">{{ $route }}</a>
</li>
