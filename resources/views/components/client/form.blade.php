<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf

        <!-- Campo de Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name"
                placeholder="Insira aqui o nome do usuário" value="{{ old('name') }}" autofocus>
        </div>

        <!-- Campo de CPF e CNPJ -->
        <div class="d-flex justify-content">
            <div class="col-md-6 mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="CPF"
                    value="{{ old('cpf') }}" autofocus>
            </div>

            <div class="col-md-6 mb-3">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" placeholder="CNPJ"
                    value="{{ old('cnpj') }}" autofocus>
            </div>
        </div>

        <!-- Campo de Telefone -->
        <div class="d-flex justify-content">
            <div class="col-md-6 mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control tel" id="telefone" name="telefone"
                    placeholder="(00) 0000-0000" value="{{ old('telefone') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control celular" id="celular" name="celular"
                    placeholder="(00) 00000-0000" value="{{ old('celular') }}">
            </div>
        </div>

        <!-- Campo de Razão Social e IE -->
        <div class="d-flex justify-content">
            <div class="col-md-6 mb-3">
                <label for="razao_social" class="form-label">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social"
                    placeholder="Razão Social" value="{{ old('razao_social') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="ie" class="form-label">Inscrição Estadual (IE)</label>
                <input type="text" class="form-control" id="ie" name="ie"
                    placeholder="Inscrição Estadual" value="{{ old('ie') }}">
            </div>
        </div>

        <!-- Botão de Enviar -->
        <div class="mt-3">
            <button type="submit" class="btn btn-success w-100 " style="background-color: #866ec7;">Salvar</button>
        </div>
    </form>
</div>
