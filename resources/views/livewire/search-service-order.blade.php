<div>
    <input type="text" name='search' id="search" class="form-control mb-4 w-100" wire:model.live="search"
        placeholder="Pesquise por uma ordem de serviço">
    @if (!$serviceOrder->isEmpty())
        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white shadow-sm rounded">
                <thead class="table-light">
                    <tr class="text-center">
                        <th scope="col" style="width: 10%;">Código da ordem</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Status</th>
                        <th scope="col">Responsavel</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($serviceOrder as $service)
                        <tr class="text-center">
                            <td class="fw-bold" style="color:#6f42c1;">{{ $service->cod_service }}</td>
                            <td>{{ $service->descricao }}</td>
                            <td>R$ {{ money($service->preco) }}</td>
                            <td>R$ {{ $service->status }}</td>
                            <td>{{ $service->categoriaService->descricao ?? 'Sem Categoria' }}</td>
                            <td>R$ {{ money($service->cliente->name ?? 'cliente não informado') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('update.peca', $service->id) }}"
                                        class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir{{ $service->id }}"
                                        class="btn btn-sm btn-outline-danger delete-user"> Excluir
                                    </a>
                                    <x-peca.modal-excluir :service="$service" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center">Não há nenhuma ordem de serviço cadastrada.</p>
    @endif
</div>
