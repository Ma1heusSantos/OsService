<div style="position: relative;">
    <div>
        <label for="servico" class='mt-3'>Serviços</label>
        <div class="d-flex">
            <input type="text" id="servico" class="form-control " wire:model.live="query"
                placeholder="Adicione um novo servico" autocomplete="off">
            <button type="button" class="btn col-4" wire:click="adicionarServico"
                style="background-color:#6f42c1;color:#fff">
                Adicionar um serviço
            </button>
        </div>

        @if (!empty($resultados))
            <ul
                style="position: absolute; background: white; border: 1px solid #ddd; width: 100%; max-height: 150px; overflow-y: auto; z-index: 1000; padding: 0; margin-top: 5px; list-style: none;">
                @foreach ($resultados as $servico)
                    <li style="padding: 8px; cursor: pointer;" wire:click="selectServico('{{ $servico->descricao }}')">
                        {{ $servico->descricao }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    @if (!empty($servicos))
        <!-- Div para mostrar todas as peças adicionadas -->
        <div class="mt-4">
            <h5>Serviços Adicionados:</h5>
            @foreach ($servicos as $index => $servico)
                <div class="d-flex align-items-center mb-2">
                    <input type="text" class="text-center mr-2" style="width: 2.0rem"
                        value="{{ $servico['quantidade'] }}" readonly>
                    <span class="me-3">{{ $servico['descricao'] }}</span>
                    <button type="button" class="btn btn-sm btn-danger ms-2"
                        wire:click="removeElemento({{ $index }})">x</button>
                </div>
            @endforeach
        </div>
    @endif
</div>
