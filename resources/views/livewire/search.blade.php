<div>
    <input type="text" name='search' id="search" class="form-control mb-4 w-100" wire:model.live="search"
        placeholder="Pesquise por um cliente">
    @if (!$clientes->isEmpty())
        <ul class="list-group">
            @foreach ($clientes as $cliente)
                <a href="{{ route('reveal.client', $cliente->id) }}">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-between align-items-center">
                            <div class="text-center">
                                <h5 class="mb-1" style="color:#6f42c1;font-size:24px; font-weight: 600;">
                                    {{ !empty($cliente->name) ? $cliente->name : $cliente->razao_social }}
                                </h5>
                                <p class="mb-0" style="color: #6c757d; font-size:13px;">
                                    {{ !empty($cliente->telefone) ? $cliente->telefone : $cliente->celular }}
                                </p>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('update.client', $cliente->id) }}"
                                class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $cliente->id }}"
                                class="btn btn-sm btn-outline-danger delete-user"> Excluir
                            </a>
                            <x-client.modal-excluir :cliente="$cliente" />
                        </div>
                    </li>
                </a>
            @endforeach
        </ul>
    @else
        <p class="text-center">Não há nenhum usuário cadastrado.</p>
    @endif
    @livewireScripts
</div>
