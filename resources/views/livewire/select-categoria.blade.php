<div class="mb-3">
    <label for="categoria">Categoria do serviço:</label>
    <div class="d-flex">
        <input type="text" class="form-control" id="categoria" wire:model.live="categoriaSelecionada"
            placeholder="Digite o nome da categoria do serviço" autocomplete="off" wire:keydown="atualizaCategoria">
    </div>

    @if (!empty($resultados))
        <ul
            style="position: absolute; background: white; border: 1px solid #ddd; width: 100%; max-height: 150px; overflow-y: auto; z-index: 1000; padding: 0; margin-top: 5px; list-style: none;">
            @foreach ($resultados as $categoria)
                <li style="padding: 8px; cursor: pointer;" wire:click="selectCategoria('{{ $categoria->descricao }}')">
                    {{ $categoria->descricao }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
