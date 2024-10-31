<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf

        <!-- Campo de código da peça -->
        <div class="mb-3">
            <label for="cod_service" class="form-label">Código da ordem de serviço:</label>
            <input type="text" class="form-control" id="cod_service" name="cod_service"
                placeholder="Insira aqui o código da ordem de serviço" value="{{ old('cod_service') }}" autofocus>
        </div>

        <!-- Campo de nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Descrição:</label>
            <textarea type="text" class="form-control" id="descricao" name="descricao"
                placeholder="Insira aqui a descrição do serviço" value="{{ old('descricao') }}"></textarea>
        </div>

        <!-- Campo de preço -->
        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input type="text" class="form-control money" id="preco" name="preco"
                placeholder="Informe o preço do serviço" value="{{ old('preco') }}">
        </div>

        <!-- Campo de Categoria da peça -->
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria do serviço:</label>
            <select class="form-select" id="categoria" name="categoria_id">
                <option value="" disabled selected>Selecione a categoria do serviço</option>
                @foreach ($categorias as $categoria)
                    <option value={{ $categoria->id }} {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente:</label>
            <select class="form-select" id="cliente" name="cliente_id">
                <option value="" disabled selected>Selecione um cliente</option>
                @foreach ($clientes as $cliente)
                    <option value={{ $cliente->id }} {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Componente que mostra a quantidade de peças -->
        <x-serviceOrder.contador-peca />

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
