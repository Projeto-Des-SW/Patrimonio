<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal bg-light">
            <div class="modal-header-predio">
                <a href="#" data-bs-dismiss="modal" aria-label="Fechar">
                    <img src="{{ asset('assets/back.svg') }}" alt="Voltar">
                </a>
                <h5 class="modal-title mx-auto" id="{{ $modalId }}Label">{{ $modalTitle }}</h5>
            </div>
            <div class="modal-body">
                <form action="{{ $formAction }}" method="POST">
                    @csrf

                    @foreach ($fields as $field)
                        @if ($field['type'] == 'text')
                            <div class="mb-3">
                                <label for="{{ $field['name'] }}" class="form-label">{{ $field['name'] }}</label>
                                <input type="{{ $field['type'] }}" class="form-control" id="{{ $field['id'] }}"
                                    name="{{ $field['name'] }}" @if(isset($field['value'])) value="{{ $field['value'] }}" @endif">
                            </div>
                        @elseif ($field['type'] == 'hidden')
                            <input type="{{ $field['type'] }}" class="form-control" id="{{ $field['id'] }}"
                                name="{{ $field['name'] }}" @if(isset($field['value'])) value="{{ $field['value'] }}" @endif>
                        @endif
                    @endforeach
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
