<div>
    <input type="text" name='search' id="search" class="form-control mb-4 w-100" wire:model.live="search"
        placeholder="Pesquise por um servico">

    @if (isset($servicos) && !$servicos->isEmpty())
        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white shadow-sm rounded">
                <thead class="table-light">
                    <tr class="text-center">
                        <th scope="col" style="width: 10%;">Código</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicos as $servico)
                        <tr class="text-center">
                            <td class="fw-bold" style="color:#6f42c1;">{{ $servico->codigo ?? 'sem código' }}</td>
                            <td>{{ $servico->descricao }}</td>
                            <td>R$ {{ number_format($servico->valor, 2, ',', '.') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('update.servicos', $servico->id) }}"
                                        class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir{{ $servico->id }}"
                                        class="btn btn-sm btn-outline-danger delete-user"> Excluir
                                    </a>
                                    <x-servico.modal-excluir :servico="$servico" />
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
