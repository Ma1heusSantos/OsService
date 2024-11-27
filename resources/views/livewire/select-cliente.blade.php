<div>
    <div class="mb-3">
        <label for="cliente">Cliente:</label>
        <div class="d-flex">
            <input type="text" class="form-control" id="cliente" wire:model.live="clienteSelecionado"
                placeholder="Digite o nome de um cliente" autocomplete="off" wire:keydown="atualizaCliente">
        </div>

        @if (session()->has('error'))
            <div class="alert alert-danger mt-1">
                {{ session('error') }}
            </div>
        @endif

        @if (!empty($resultados))
            <ul
                style="position: absolute; background: white; border: 1px solid #ddd; width: 100%; max-height: 150px; overflow-y: auto; z-index: 1000; padding: 0; margin-top: 5px; list-style: none;">
                @foreach ($resultados as $cliente)
                    <li style="padding: 8px; cursor: pointer;" wire:click="selectCliente('{{ $cliente->name }}')">
                        {{ $cliente->name }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
