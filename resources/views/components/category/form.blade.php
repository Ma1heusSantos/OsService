<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf

        <!-- Campo de código da peça -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao"
                placeholder="Insira aqui a descricao da categoria"
                value="{{ old('descricao', $categoria->descricao ?? '') }}" autofocus>
        </div>

        @if (!isset($categoria))
            <!-- Campo de Categoria da peça -->
            <div class="mb-3">
                <label for="tipo_categoria" class="form-label">Selecione o tipo de categoria que você quer criar</label>
                <select class="form-select" required id="tipo_categoria" name="tipo_categoria">
                    <option value="" disabled selected>Selecione um tipo</option>
                    <option value="1">Peça</option>
                    <option value="2">Serviço</option>
                </select>
            </div>
        @endif
        <!-- Botão de Enviar -->
        <div class="mb-3">
            <button type="submit" class="btn btn-success w-100">Salvar</button>
        </div>
    </form>
</div>
