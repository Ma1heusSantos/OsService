<div style="position: relative;">
    <div>
        <label for="peca" class='mt-3'>Peças</label>
        <div class="d-flex">
            <input type="text" id="peca" class="form-control" wire:model.live="query"
                placeholder="Digite o nome da peça para buscar" autocomplete="off">
            <button type="button" class="btn col-4" wire:click="adicionarPeca"
                style="background-color:#6f42c1;color:#fff">
                Adicionar uma nova peça
            </button>
        </div>

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (!empty($resultados))
            <ul
                style="position: absolute; background: white; border: 1px solid #ddd; width: 100%; max-height: 150px; overflow-y: auto; z-index: 1000; padding: 0; margin-top: 5px; list-style: none;">
                @foreach ($resultados as $peca)
                    <li style="padding: 8px; cursor: pointer;" wire:click="selectPeca('{{ $peca->nome }}')">
                        {{ $peca->nome }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    @if (!empty($pecas))
        <!-- Div para mostrar todas as peças adicionadas -->
        <div class="mt-4">
            <h5>Peças Adicionadas:</h5>
            @foreach ($pecas as $index => $peca)
                <div class="d-flex align-items-center mb-2">
                    <span class="me-3">{{ $peca['nome'] }}</span>
                    <button type="button" class="btn btn-sm btn-secondary me-2"
                        wire:click="incrementarQtd({{ $index }})">+</button>
                    <input type="text" class="text-center" style="width: 2.0rem" value="{{ $peca['quantidade'] }}"
                        readonly>
                    <button type="button" class="btn btn-sm btn-secondary ms-2"
                        wire:click="decrementarQtd({{ $index }})">-</button>
                </div>
            @endforeach
        </div>
    @endif
</div>
