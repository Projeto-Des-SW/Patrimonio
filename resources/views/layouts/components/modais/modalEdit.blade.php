<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
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
                @isset($campoId)
                    <input type="hidden" name="predio_id" value="{{ $campoId }}">
                @endisset
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    @if(isset($campoAdicional))                  
                    <div class="mb-3">
                        <label for="{{ $inputName }}" class="form-label">{{ $label }}</label>
                        <input type="text" class="form-control" id="{{ $inputName }}" name="{{ $inputName }}">
                    </div>
                    @endif
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
