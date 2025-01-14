<div class="form-group">
    <form wire:submit="submitForm">
        @csrf
        <!-- Campo de modelo -->
        <div class="row">
            <div class="col-md-8  mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" wire:model="modelo" class="form-control @error('modelo') is-invalid @enderror"
                    placeholder="Insira aqui qual o modelo do veículo"
                    value="{{ old('modelo', $veiculo->modelo ?? '') }}">
                @error('modelo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class=" col-md-4 mb-3">
                <label for="ano_modelo" class="form-label">Ano do Veículo</label>
                <input type="number" wire:model="ano_modelo" min="1900" max="2099" placeholder="ex: 2021"
                    class="form-control @error('ano_modelo') is-invalid @enderror"
                    value="{{ old('ano_modelo', $veiculo->ano_modelo ?? '') }}">
                @error('ano_modelo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Campo de Marca-->
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" wire:model="marca" class="form-control @error('marca') is-invalid @enderror"
                    placeholder="Marca" value="{{ old('marca', $veiculo->marca ?? '') }}">
                @error('marca')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- input de arquivo de imagem -->
            <div class="col-md-4 mb-3">
                <label for="imagem">Imagem do Veículo:</label>
                <input type="file" wire:model="imagem" class="form-control @error('tipo') is-invalid @enderror"
                    accept="image/*">
                @error('imagem')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <!-- Campo de Placa -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" wire:model="placa" class="form-control @error('placa') is-invalid @enderror"
                    placeholder="Insira aqui a placa do veiculo" value="{{ old('placa', $veiculo->placa ?? '') }}">
                @error('placa')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de chassi -->
            <div class="col-md-6 mb-3">
                <label for="chassi" class="form-label">Chassi</label>
                <input type="text" wire:model="chassi" class="form-control @error('chassi') is-invalid @enderror"
                    placeholder="Chassi do Veículo" value="{{ old('chassi', $veiculo->chassi ?? '') }}">
                @error('chassi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Campos de cor -->
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" wire:model="cor" class="form-control @error('cor') is-invalid @enderror"
                    placeholder="Cor" value="{{ old('cor', $veiculo->cor ?? '') }}">
                @error('cor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="tipo" class="form-label">Tipo de Viculo</label>
                <input type="text" wire:model="tipo" class="form-control @error('tipo') is-invalid @enderror"
                    placeholder="(ex: carro, Moto)" value="{{ old('tipo', $veiculo->tipo ?? '') }}">
                @error('tipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Campo de Seleção de Cliente -->
                <livewire:select-cliente />
            </div>
            @error('cliente_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botão de Enviar -->
        <div class="mb-3 mt-5">
            <button type="submit" class="btn btn-success w-100">Salvar</button>
        </div>
    </form>
</div>
