<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf
        <!-- Campo de Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome"
                placeholder="Insira aqui o nome do mecânico" value="{{ $mecanico->nome ?? '' }}">
        </div>

        <!-- Campo de CPF e Status -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="CPF"
                    value="{{ $mecanico->cpf ?? '' }}">
            </div>
            {{-- dicidir quais os tipo de status temos --}}
            <div class="col-md-6 mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                    value="{{ $mecanico->data_nascimento ?? '' }}">
            </div>

        </div>

        <!-- Campo de Telefone e status -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control tel" id="telefone" name="telefone"
                    placeholder="(00) 0000-0000" value="{{ $mecanico->cpf ?? '' }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <input type="text" class="form-control" id="especialidade" name="especialidade"
                    placeholder="Especialidade do mecânico" value="{{ $mecanico->especialidade ?? '' }}">
            </div>

        </div>

        <!-- Campo de Endereço (Rua, Número, Bairro, Complemento, Cidade, Estado, CEP) -->
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="rua" class="form-label">Rua</label>
                <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua"
                    value="{{ $mecanico->endereco->rua ?? '' }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número"
                    value="{{ $mecanico->endereco->numero ?? '' }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro"
                    value="{{ $mecanico->endereco->bairro ?? '' }}">
            </div>
            <div class="col-md-3 mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento"
                    value="{{ $mecanico->endereco->complemento ?? '' }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade"
                    value="{{ $mecanico->endereco->cidade ?? '' }}">
            </div>
            <div class="col-md-3 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado"
                    value="{{ $mecanico->endereco->estado ?? '' }}">
            </div>
            <div class="col-md-3 mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"
                    value="{{ $mecanico->endereco->cep ?? '' }}">
            </div>
        </div>

        <!-- Botão de Enviar -->
        <div class="mt-3">
            <button type="submit" class="btn btn-success w-100" style="background-color: #866ec7;">Salvar</button>
        </div>
    </form>
</div>
