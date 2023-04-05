<div class="header-border-bottom mb-2">
  <h3 style="color: #1A2876; width: 100%">
  @if ($back)
  <a href="{{ URL::previous() }}" style="text-decoration: none;">
    <img src="{{URL::asset('/assets/back.svg')}}" alt="Voltar">
  </a>
  @endif
    {{$page_title}}
  </h3>  
</div>

<div class="d-flex align-items-center">
    <img src="{{URL::asset('/assets/search-icon.svg')}}" height="28px" alt="Pesquisar">
    <input class="search-input" placeholder="Pesquisar">
</div>