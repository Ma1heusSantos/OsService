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
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="CPF"
                    value="{{ old('cpf') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" placeholder="CNPJ"
                    value="{{ old('cnpj') }}">
            </div>
        </div>

        <!-- Campo de Telefone e Celular -->
        <div class="row">
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
        <div class="row">
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

        <!-- Campo de Endereço (Rua, Número, Bairro, Complemento, Cidade, Estado, CEP) -->
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="rua" class="form-label">Rua</label>
                <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua"
                    value="{{ old('rua') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número"
                    value="{{ old('numero') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro"
                    value="{{ old('bairro') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento"
                    placeholder="Complemento" value="{{ old('complemento') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade"
                    value="{{ old('cidade') }}">
            </div>
            <div class="col-md-3 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado"
                    value="{{ old('estado') }}">
            </div>
            <div class="col-md-3 mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"
                    value="{{ old('cep') }}">
            </div>
        </div>

        <!-- Botão de Enviar -->
        <div class="mt-3">
            <button type="submit" class="btn btn-success w-100" style="background-color: #866ec7;">Salvar</button>
        </div>
    </form>
</div>
