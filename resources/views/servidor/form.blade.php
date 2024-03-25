<link rel="stylesheet" href="../../sass/forms.scss" type="text/css">

<div class="row">
    @if(isset($servidor))
        <input type="hidden" name="servidor_id" value="{{$servidor->id}}">
    @endif

    <div class="col-sm-6">
        <label for="name">Nome:<strong style="color: red">*</strong></label>
        <input class="form-control form-input @error('name') is-invalid @enderror" id="name" type="text"
               name="name" @if(isset($servidor)) value="{{$servidor->user->name}}"
               @else value="{{old('name')}}" @endif required
               autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-sm-6">
        <label for="email">E-mail:<strong style="color: red">*</strong></label>
        <input class="form-control @error('email') is-invalid @enderror"
               name="email" @if(isset($servidor)) value="{{$servidor->user->email}}"
               @else value="{{old('email')}}" @endif required
               autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-6">
        <label for="cpf">CPF:</label>
        <input class="form-control" id="cpf" type="text"
               name="cpf">
    </div>

    <div class="col-sm-6">
        <label for="matricula">Matrícula:<strong style="color: red">*</strong></label>
        <input class="form-control @error('matricula') is-invalid @enderror" id="matricula" type="text"
               name="matricula" @if(isset($servidor)) value="{{$servidor->matricula}}"
               @else value="{{old('matricula')}}" @endif required
               autocomplete="matricula" autofocus>
        @error('matricula')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-6">
        <label for="role">Tipo do Usuário:<strong style="color: red">*</strong></label>
        <select class="form-control @error('role_id') is-invalid @enderror" id="role"
                name="role_id" required>
            <option selected disabled>Selecione um Tipo de Usuário</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}"
                        @if(isset($servidor) && $servidor->user->role_id == $role->id || old('role_id') == $role->id) selected @endif>{{$role->nome}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-6">
        <label for="cargo">Cargo:<strong style="color: red">*</strong></label>
        <select class="form-control @error('cargo_id') is-invalid @enderror" id="cargo_id" name="cargo_id" required>
            <option selected disabled>Selecione um Cargo</option>
            @foreach($cargos as $cargo)
                <option value="{{$cargo->id}}"
                        @if(isset($servidor) && $servidor->cargo_id == $cargo->id || old('cargo_id') == $cargo->id) selected @endif>{{$cargo->nome}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-6">
        <label for="password">Senha:@if(!isset($servidor))
                <strong style="color: red">*</strong>
            @endif
        </label>
        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
               name="password" @if(!isset($servidor)) required
            @endif>
        @error('password')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-sm-6">
        <label for="password">Confirmar Senha:
            @if(!isset($servidor))
                <strong style="color: red">*</strong>
            @endif
        </label>
        <input class="form-control" id="password" type="password"
               name="confirm_password" @if(!isset($servidor)) required @endif>
    </div>
</div>
