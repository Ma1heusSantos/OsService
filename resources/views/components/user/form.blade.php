<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf

        <!-- Campo de name -->
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Insira aqui o E-mail do usuário" value="{{ old('name', $user->name ?? '') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Campo de E-mail -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" autocomplete="off" placeholder="Insira aqui o E-mail do usuário"
                value="{{ old('email', $user->email ?? '') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo de Senha -->
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" autocomplete="off" class="form-control @error('password') is-invalid @enderror"
                id="password" name="password" placeholder="Digite a senha do usuário">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirme sua Senha</label>
            <input type="password" autocomplete="off"
                class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                name="password_confirmation" placeholder="Confirme sua senha">
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo de Função -->
        <div class="mb-3">
            <label for="role" class="form-label">Função do Usuário</label>
            <select class="form-select" id="role" name="role" value="{{ old('role', $user->role ?? '') }}">
                <option value="" disabled selected>Selecione a função do usuário</option>
                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <!-- Botão de Enviar -->
        <div class="mb-3">
            <button type="submit" class="btn btn-success w-100">Salvar</button>
        </div>
    </form>
</div>
