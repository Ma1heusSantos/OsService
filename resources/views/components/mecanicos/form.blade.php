<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf
        <!-- Campo de Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
                placeholder="Insira aqui o nome do mecânico" value="{{ old('nome', $mecanico->nome ?? '') }}">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo de CPF -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf"
                    name="cpf" placeholder="CPF" value="{{ old('cpf', $mecanico->cpf ?? '') }}">
                @error('cpf')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Data de Nascimento -->
            <div class="col-md-6 mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror"
                    id="data_nascimento" name="data_nascimento"
                    value="{{ old('data_nascimento', $mecanico->data_nascimento ?? '') }}">
                @error('data_nascimento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Campo de Telefone -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                    name="telefone" placeholder="(00) 0000-0000"
                    value="{{ old('telefone', $mecanico->telefone ?? '') }}">
                @error('telefone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Especialidade -->
            <div class="col-md-6 mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <input type="text" class="form-control @error('especialidade') is-invalid @enderror"
                    id="especialidade" name="especialidade" placeholder="Especialidade do mecânico"
                    value="{{ old('especialidade', $mecanico->especialidade ?? '') }}">
                @error('especialidade')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Campos de Endereço -->
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="rua" class="form-label">Rua</label>
                <input type="text" class="form-control @error('rua') is-invalid @enderror" id="rua"
                    name="rua" placeholder="Rua" value="{{ old('rua', $mecanico->endereco->rua ?? '') }}">
                @error('rua')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control @error('numero') is-invalid @enderror" id="numero"
                    name="numero" placeholder="Número" value="{{ old('numero', $mecanico->endereco->numero ?? '') }}">
                @error('numero')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro"
                    name="bairro" placeholder="Bairro" value="{{ old('bairro', $mecanico->endereco->bairro ?? '') }}">
                @error('bairro')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control @error('complemento') is-invalid @enderror" id="complemento"
                    name="complemento" placeholder="Complemento"
                    value="{{ old('complemento', $mecanico->endereco->complemento ?? '') }}">
                @error('complemento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade"
                    name="cidade" placeholder="Cidade"
                    value="{{ old('cidade', $mecanico->endereco->cidade ?? '') }}">
                @error('cidade')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control @error('estado') is-invalid @enderror" id="estado"
                    name="estado" placeholder="Estado"
                    value="{{ old('estado', $mecanico->endereco->estado ?? '') }}">
                @error('estado')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control @error('cep') is-invalid @enderror" id="cep"
                    name="cep" placeholder="CEP" value="{{ old('cep', $mecanico->endereco->cep ?? '') }}">
                @error('cep')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Botão de Enviar -->
        <div class="mt-3">
            <button type="submit" class="btn btn-success w-100" style="background-color: #866ec7;">Salvar</button>
        </div>
    </form>
</div>
