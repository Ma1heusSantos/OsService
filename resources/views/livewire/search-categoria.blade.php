<div>
    <input type="text" name="search" id="search" class="form-control mb-4" wire:model.live="search"
        placeholder="Pesquise por uma categoria">

    <div class="row flex flex-column">
        @if (!$categoriasPeca->isEmpty())
            <div class="col-md-12 mb-3">
                <div class="table-responsive" style="height: 20rem; overflow-y: auto;">
                    <table class="table table-hover align-middle table-bordered">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th scope="col" style="width: 10%;color:#6f42c1;">Código</th>
                                <th scope="col"style="width: 50%; color:#6f42c1;">Categorias de Peças</th>
                                <th scope="col" style="color:#6f42c1;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoriasPeca as $categoria)
                                <tr class="text-center">
                                    <td class="fw-bold" style="color:#6f42c1;">{{ $categoria->id }}</td>
                                    <td>{{ $categoria->descricao }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('update.categoria.peca', $categoria->id) }}"
                                                class="btn btn-sm btn-outline-warning">Editar</a>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#modalExcluir{{ $categoria->id }}"
                                                class="btn btn-sm btn-outline-danger">Excluir</a>
                                            <x-category.modal-excluir :categoria="$categoria" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if (!$categoriasServico->isEmpty())
            <div class="col-md-12">
                <div class="table-responsive" style="height: 20rem; overflow-y: auto;">
                    <table class="table table-hover align-middle table-bordered">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th scope="col" style="width: 10%;color:#6f42c1;">Código</th>
                                <th scope="col" style="width: 50%; color:#6f42c1;">Categorias de
                                    Serviços</th>
                                <th scope="col" style="color:#6f42c1;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoriasServico as $categoria)
                                <tr class="text-center">
                                    <td class="fw-bold" style="color:#6f42c1;">{{ $categoria->id }}</td>
                                    <td>{{ $categoria->descricao }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('update.categoria.servico', $categoria->id) }}"
                                                class="btn btn-sm btn-outline-warning">Editar</a>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#modalExcluirServico{{ $categoria->id }}"
                                                class="btn btn-sm btn-outline-danger">Excluir</a>
                                            <x-category.modal-excluir-servico :categoria="$categoria" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
