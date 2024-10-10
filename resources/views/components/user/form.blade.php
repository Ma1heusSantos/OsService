<div class="form-group">
    <form action="" method="post">
        <!-- Campo de E-mail -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail *</label>
            <input type="email" class="form-control" id="email" name="email"
                placeholder="Insira aqui o E-mail do usuário" required value="{{ old('email') }}" autofocus>
        </div>

        <!-- Campo de Senha -->
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password"
                placeholder="Digite a senha do usuário">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirme sua Senha</label>
            <input type="password_confirmation" class="form-control" id="password_confirmation"
                name="password_confirmation" placeholder="Confirme sua senha">
        </div>

        <!-- Campo de Função -->
        <div class="mb-3">
            <label for="role" class="form-label">Função do Usuário</label>
            <select class="form-select" id="role" name="role" autofocus>
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
