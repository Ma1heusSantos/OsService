<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf

        <!-- Campo de código da peça -->
        <div class="mb-3">
            <label for="cod_servico" class="form-label">Código do servico</label>
            <input type="text" class="form-control" id="cod_servico" name="cod_servico"
                placeholder="Insira aqui o código do servico" value="{{ $servico->codigo ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descricao</label>
            <input type="text" class="form-control" id="descricao" name="descricao"
                placeholder="Insira aqui a descricao do servico" value="{{ $servico->descricao ?? '' }}">
        </div>

        <!-- Campo de preço -->
        <div class="mb-3">
            <label for="valor" class="form-label">Valor(R$)</label>
            <input type="text" class="form-control money" id="valor" name="valor"
                placeholder="Informe o valor do serviço" value="{{ $servico->valor ?? '' }}">
        </div>

        <!-- Campo de Categoria do serviço -->
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria da peça</label>
            <select class="form-select" id="categoria" name="categoria_id">
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
    <script>
        $(document).ready(function($) {
            var $money = $(".money");
            $money.mask('000.000.000,00', {
                reverse: true
            });
        });
    </script>
</div>
