<div class="form-group">
    <form action="{{ $action }}" method="post">
        @csrf
        <!-- Campo de modelo -->
        <div class="row">
            <div class="col-md-8  mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo"
                    name="modelo" placeholder="Insira aqui qual o modelo do veículo"
                    value="{{ old('modelo', $veiculo->modelo ?? '') }}">
                @error('modelo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class=" col-md-4 mb-3">
                <label for="ano_modelo" class="form-label">Ano do Veículo</label>
                <input type="number" min="1900" max="2099" placeholder="ex: 2021"
                    class="form-control @error('ano_modelo') is-invalid @enderror" id="ano_modelo" name="ano_modelo"
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
                <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca"
                    name="marca" placeholder="Marca" value="{{ old('marca', $veiculo->marca ?? '') }}">
                @error('marca')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- input de arquivo de imagem -->
            <div class="col-md-4 mb-3">
                <label for="imagem">Imagem do Veículo:</label>
                <input type="file" class="form-control @error('tipo') is-invalid @enderror" id="imagem"
                    name="imagem" accept="image/*">
                @error('imagem')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <!-- Campo de Placa -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control @error('placa') is-invalid @enderror" id="placa"
                    name="placa" placeholder="Insira aqui a placa do veiculo"
                    value="{{ old('placa', $veiculo->placa ?? '') }}">
                @error('placa')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de chassi -->
            <div class="col-md-6 mb-3">
                <label for="chassi" class="form-label">Chassi</label>
                <input type="text" class="form-control @error('chassi') is-invalid @enderror" id="chassi"
                    name="chassi" placeholder="Chassi do Veículo" value="{{ old('chassi', $veiculo->chassi ?? '') }}">
                @error('chassi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Campos de cor -->
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" class="form-control @error('cor') is-invalid @enderror" id="cor"
                    name="cor" placeholder="Cor" value="{{ old('cor', $veiculo->cor ?? '') }}">
                @error('cor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="tipo" class="form-label">Tipo de Viculo</label>
                <input type="text" class="form-control @error('tipo') is-invalid @enderror" id="tipo"
                    name="tipo" placeholder="(ex: carro, Moto)" value="{{ old('tipo', $veiculo->tipo ?? '') }}">
                @error('tipo')
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
