<div class="form-group">
    <form wire:submit="submitForm">
        @csrf
    
        <!-- Campo de Categoria da peça -->
        <livewire:select-categoria :categorias="$categorias" />
        @error('categoria_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        
        <div class="row">
            <!-- Campo de selção de mecânicos -->
            <div class="col-md-6">
                <label for="mecanico_id" class="form-label">Mecânico:</label>
                <select class="form-control" id="mecanico_id" wire:model="mecanico_id">
                    <option value="" selected>Selecione um Mecânico</option>
                    @foreach ($mecanicos as $mecanico)
                        <option value="{{ $mecanico->id }}">{{ $mecanico->nome }}</option>
                    @endforeach
                </select>
                @error('mecanico_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <!-- Campo de Seleção de Cliente -->
                <livewire:select-cliente />
            </div>
            @error('cliente_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


      

         <!-- Campo de nome -->
         <div class="mb-3 d-flex align-items-center">
    <!-- Campo de descrição -->
    <div style="flex: 1; margin-right: 15px;">
        <label for="nome" class="form-label">Descrição:</label>
        <textarea type="text" class="form-control" id="descricao" wire:model="descricao"
            placeholder="Insira aqui a descrição do serviço" style="width: 718px; height: 60px;"></textarea>
    </div>

    <!-- Campo de valor total -->
    <div style="flex: 1;margin-left: 160px; ">
        <label for="valorTotal" class="form-label">Valor Total do Serviço:</label>
        <div class="form-control" style="height: 80px; width: 260px; text-align-center;">
            <p class="fw-bold" style="color: #6f42c1; margin: 0; font-size: 40px;">R$ {{ money($preco) }}</p>
        </div>
    </div>
</div>

<div class="row mb-3 d-flex">
            <div class="col-md-6">
                <!-- Campo de Seleção de Serviço -->
                <livewire:adicionar-servico />
            </div>
            <div class="col-md-6">
                <!-- Componente que mostra a quantidade de peças -->
                <livewire:buscar-peca id="buscarPecaComponent" />

                <input type="hidden" wire:model="pecas">
            </div>
        </div>
        <!-- Botão de Enviar -->
        <div class="mb-3 mt-5">
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
