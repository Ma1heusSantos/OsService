<div class="form-group">
    <form wire:submit="submitForm">
        @csrf
        <!-- Campo de nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Descrição:</label>
            <textarea type="text" class="form-control" id="descricao" wire:model="descricao"
                placeholder="Insira aqui a descrição do serviço"></textarea>
        </div>

        <!-- Campo de preço -->
        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input type="text" class="form-control money" id="preco" wire:model="preco"
                placeholder="Informe o preço do serviço">
        </div>


        <!-- Campo de Categoria da peça -->
        <livewire:select-categoria :categorias="$categorias" />
        <livewire:select-cliente />

        <!-- Componente que mostra a quantidade de peças -->
        <livewire:buscar-peca id="buscarPecaComponent" />

        <input type="hidden" wire:model="pecas">

        <!-- Botão de Enviar -->
        <div class="mb-3">
            <button type="submit" class="btn btn-success w-100">Salvar</button>
        </div>
    </form>
    <script defer>
        $(document).ready(function($) {
            var $money = $(".money");
            $money.mask('000.000.000,00', {
                reverse: true
            });

        });
    </script>
</div>
