<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf

        <!-- Campo de Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Insira aqui o nome do usuário" value="{{ old('name', $cliente->name ?? '') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo de CPF e CNPJ -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control cpf @error('cpf') is-invalid @enderror" id="cpf"
                    name="cpf" placeholder="CPF" value="{{ old('cpf', $cliente->cpf ?? '') }}">
                @error('cpf')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="col-md-6 mb-3">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control cnpj @error('cnpj') is-invalid @enderror" id="cnpj"
                    name="cnpj" placeholder="CNPJ" value="{{ old('cnpj', $cliente->cnpj ?? '') }}">
                @error('cnpj')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <!-- Campo de Telefone e Celular -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control tel  @error('telefone') is-invalid @enderror" id="telefone"
                    name="telefone" placeholder="(00) 0000-0000"
                    value="{{ old('telefone', $cliente->telefone ?? '') }}">
                @error('telefone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="col-md-6 mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control celular @error('celular') is-invalid @enderror" id="celular"
                    name="celular" placeholder="(00) 00000-0000" value="{{ old('celular', $cliente->celular ?? '') }}">
                @error('celular')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <!-- Campo de Razão Social e IE -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="razao_social" class="form-label">Razão Social</label>
                <input type="text" class="form-control @error('razao_social') is-invalid @enderror" id="razao_social"
                    name="razao_social" placeholder="Razão Social"
                    value="{{ old('razao_social', $cliente->razao_social ?? '') }}">
            </div>
            @error('razao_social')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="col-md-6 mb-3">
                <label for="ie" class="form-label">Inscrição Estadual (IE)</label>
                <input type="text" class="form-control @error('ie') is-invalid @enderror" id="ie"
                    name="ie" placeholder="Inscrição Estadual" value="{{ old('ie', $cliente->ie ?? '') }}">
            </div>
            @error('ie')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campos de Endereço -->
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="rua" class="form-label">Rua</label>
                <input type="text" class="form-control @error('rua') is-invalid @enderror" id="rua"
                    name="rua" placeholder="Rua" value="{{ old('rua', $cliente->endereco->rua ?? '') }}">
                @error('rua')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control @error('numero') is-invalid @enderror" id="numero"
                    name="numero" placeholder="Número" value="{{ old('numero', $cliente->endereco->numero ?? '') }}">
                @error('numero')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro"
                    name="bairro" placeholder="Bairro"
                    value="{{ old('bairro', $cliente->endereco->bairro ?? '') }}">
                @error('bairro')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control @error('complemento') is-invalid @enderror"
                    id="complemento" name="complemento" placeholder="Complemento"
                    value="{{ old('complemento', $cliente->endereco->complemento ?? '') }}">
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
                    value="{{ old('cidade', $cliente->endereco->cidade ?? '') }}">
                @error('cidade')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control @error('estado') is-invalid @enderror" id="estado"
                    name="estado" placeholder="Estado"
                    value="{{ old('estado', $cliente->endereco->estado ?? '') }}">
                @error('estado')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control @error('cep') is-invalid @enderror" id="cep"
                    name="cep" placeholder="CEP" value="{{ old('cep', $cliente->endereco->cep ?? '') }}">
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
