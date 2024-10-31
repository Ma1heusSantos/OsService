<div style="position: relative;">
    <input type="text" class="form-control" wire:model.live="query" placeholder="Digite o nome da peça para buscar"
        autocomplete="off">

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
