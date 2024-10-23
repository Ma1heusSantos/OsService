<div>
    <input type="text" name='search' id="search" class="form-control mb-4 w-100" wire:model.live="search"
        placeholder="Pesquise por uma peça">

    @if (!$pecas->isEmpty())
        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white shadow-sm rounded">
                <thead class="table-light">
                    <tr class="text-center">
                        <th scope="col" style="width: 10%;">Código da peça</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pecas as $peca)
                        <tr class="text-center">
                            <td class="fw-bold" style="color:#6f42c1;">{{ $peca->cod_peca }}</td>
                            <td>{{ $peca->nome }}</td>
                            <td>R$ {{ number_format($peca->preco, 2, ',', '.') }}</td>
                            <td>{{ $peca->categoriaPeca->descricao ?? 'Sem Categoria' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('update.peca', $peca->id) }}"
                                        class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir{{ $peca->id }}"
                                        class="btn btn-sm btn-outline-danger delete-user"> Excluir
                                    </a>
                                    <x-peca.modal-excluir :peca="$peca" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center">Não há nenhuma peça cadastrada.</p>
    @endif
</div>
