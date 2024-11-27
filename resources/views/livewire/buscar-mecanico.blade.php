<div>
    <input type="text" name='search' id="search" class="form-control mb-4 w-100" wire:model.live="search"
        placeholder="Pesquise por um mecânico">

    @if (isset($mecanicos) && !$mecanicos->isEmpty())
        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white shadow-sm rounded">
                <thead class="table-light">
                    <tr class="text-center">
                        <th scope="col" style="width: 10%;">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mecanicos as $mecanico)
                        <tr class="text-center"
                            onclick="window.location='{{ route('reveal.mecanico', [$mecanico->id]) }}'"
                            style="cursor: pointer;">
                            <td class="fw-bold" style="color:#6f42c1;">{{ $mecanico->id ?? 'sem código' }}</td>
                            <td>{{ $mecanico->nome }}</td>
                            <td>{{ $mecanico->telefone }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('update.mecanicos', $mecanico->id) }}"
                                        class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir{{ $mecanico->id }}"
                                        class="btn btn-sm btn-outline-danger delete-user"> Excluir
                                    </a>
                                    <x-mecanicos.modal-excluir :mecanico="$mecanico" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center">Não há nenhum mecânico cadastrado.</p>
    @endif
</div>
