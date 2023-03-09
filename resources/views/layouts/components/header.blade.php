<div class="border-bottom border-dark mb-2">
  <h3 class="text-dark">
  @if ($back)
  <a href="{{ URL::previous() }}" style="text-decoration: none;">
    <img src="{{URL::asset('/assets/back.svg')}}" alt="Voltar">
  </a>
  @endif
    {{$page_title}}
  </h3>  
</div>