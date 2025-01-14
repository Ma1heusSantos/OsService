<div>
    <input type="text" name='search' id="search" class="form-control mb-4 w-100" wire:model.live="search"
        placeholder="Pesquise por um veículo">

    @if (isset($veiculos) && !$veiculos->isEmpty())
        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white shadow-sm rounded">
                <thead class="table-light">
                    <tr class="text-center">
                        <th scope="col">Imagem</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">placa</th>
                        <th scope="col">Cor</th>
                        <th scope="col">tipo</th>
                        <th scope="col">Chassi</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veiculos as $veiculo)
                        <tr class="text-center">
                            <td>
                                @if ($veiculo->imagem)
                                    <img src="{{ asset($veiculo->imagem) }}" alt="Imagem do Veículo"
                                        style="max-width: 100px; max-height: 100px;">
                                @else
                                    Não Informado
                                @endif
                            </td>
                            <td class="fw-bold" style="color:#6f42c1;">{{ $veiculo->cliente->name }}</td>
                            <td>{{ $veiculo->placa }}</td>
                            <td>{{ $veiculo->cor }}</td>
                            <td>{{ $veiculo->tipo }}</td>

                            <td class="fw-bold">{{ $veiculo->chassi ?? 'Não informado' }}</td>
                            <td>{{ $veiculo->modelo }}</td>
                            <td>{{ $veiculo->marca }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('update.veiculos', $veiculo->id) }}"
                                        class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir{{ $veiculo->id }}"
                                        class="btn btn-sm btn-outline-danger delete-user"> Excluir
                                    </a>
                                    <x-veiculo.modal-excluir :veiculo="$veiculo" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center">Não há nenhum serviço cadastrado.</p>
    @endif
</div>
