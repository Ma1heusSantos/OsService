<div>
    <input type="text" name='search' id="search" class="form-control mb-4 w-100" wire:model.live="search"
        placeholder="Pesquise por uma ordem de serviço">
    @if (!$serviceOrder->isEmpty())
        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white shadow-sm rounded">
                <thead class="table-light">
                    <tr class="text-center">
                        <th scope="col">Valor</th>
                        <th scope="col">Status</th>
                        <th scope="col">Mecânico</th>
                        <th scope="col">Categoria da O.S</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($serviceOrder as $service)
                        <tr class="text-center">
                            <td>R$ {{ money($service->preco) }}</td>
                            @if (isset($service->status) && $service->status == 'Concluido')
                                <td class="text-success">{{ $service->status }}</td>
                            @elseif (isset($service->status) && $service->status == 'Em andamento')
                                <td class="text-warning">{{ $service->status }}</td>
                            @elseif (isset($service->status) && $service->status == 'Cancelado')
                                <td class="text-danger">{{ $service->status }}</td>
                            @else
                                <td class="text-secondary">{{ $service->status }}</td>
                            @endif
                            <td>{{ $service->mecanico->nome ?? 'cliente não informado' }}</td>
                            <td>{{ $service->categoriaServico->descricao ?? 'Sem Categoria' }}</td>
                            <td>{{ $service->cliente->name ?? 'cliente não informado' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('serviceOrder.details', $service->id) }}"
                                        class="btn btn-sm btn-outline-primary mr-2">Detalhes</a>
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir{{ $service->id }}"
                                        class="btn btn-sm btn-outline-danger delete-user"> Excluir
                                    </a>
                                    <x-serviceOrder.modal-excluir :service="$service" />
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
