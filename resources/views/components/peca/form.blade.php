<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf

        <!-- Campo de código da peça -->
        <div class="mb-3">
            <label for="cod_peca" class="form-label">Código da peça</label>
            <input type="text" class="form-control" id="cod_peca" name="cod_peca"
                placeholder="Insira aqui o código da peça" value="{{ old('cod_peca') }}" autofocus>
        </div>

        <!-- Campo de nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome"
                placeholder="Insira aqui o nome da peça" value="{{ old('nome') }}" autofocus>
        </div>

        <!-- Campo de preço -->
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco"
                placeholder="Informe o preço da peça" value="{{ old('preco') }}">
        </div>

        <!-- Campo de Categoria da peça -->
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria da peça</label>
            <select class="form-select" id="categoria" name="categoria_id" autofocus>
                <option value="" disabled selected>Selecione a categoria</option>
                @foreach ($categorias as $categoria)
                    <option value={{ $categoria->id }} {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botão de Enviar -->
        <div class="mb-3">
            <button type="submit" class="btn btn-success w-100">Salvar</button>
        </div>
    </form>
</div>
