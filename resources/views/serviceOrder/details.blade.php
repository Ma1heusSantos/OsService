@extends('layouts.template')

@section('title')
    Detalhes da Ordem de Serviço
@endsection

@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Detalhes da Ordem de Serviço</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <!-- Detalhes da Ordem de Serviço -->
                <div class="col-md-6">
                    <h5 class="fw-bold">Código da Ordem: {{ $serviceOrder->id }}</h5>
                    <p><i class="bi bi-list-task"></i> <strong>Status:</strong>
                        {{ $serviceOrder->status ?? 'não informado' }}</p>
                    <p><i class="bi bi-text-left"></i> <strong>Descrição:</strong>
                        {{ $serviceOrder->descricao ?? 'não informado' }}</p>
                    <p><i class="bi bi-cash-stack"></i> <strong>Valor:</strong> R$
                        {{ number_format($serviceOrder->preco, 2, ',', '.') ?? 'não informado' }}</p>
                </div>
                <!-- Detalhes do Mecânico -->
                <div class="col-md-6">
                    <h6 class="fw-bold" style="color:#6f42c1;">Mecânico</h6>
                    <p><i class="bi bi-person"></i> <strong>Nome:</strong>
                        {{ $serviceOrder->mecanico->nome ?? 'não informado' }}</p>
                    <p><i class="bi bi-gear"></i> <strong>Especialidade:</strong>
                        {{ $serviceOrder->mecanico->especialidade ?? 'não informado' }}</p>
                </div>
            </div>

            <div class="row mb-4">
                <!-- Detalhes do Cliente -->
                <div class="col-md-6">
                    <h6 class="fw-bold" style="color:#6f42c1;">Cliente</h6>
                    <p><i class="bi bi-person-circle"></i> <strong>Nome:</strong>
                        {{ $serviceOrder->cliente->name ?? 'não informado' }}</p>
                    <p><i class="bi bi-telephone"></i> <strong>Telefone:</strong>
                        {{ $serviceOrder->cliente->telefone ?? 'não informado' }}</p>
                    <p><i class="bi bi-envelope"></i> <strong>E-mail:</strong>
                        {{ $serviceOrder->cliente->email ?? 'não informado' }}</p>
                </div>
                <!-- Endereço do Cliente -->
                <div class="col-md-6">
                    <h6 class="fw-bold" style="color:#6f42c1;">Endereço do Cliente</h6>
                    <p><i class="bi bi-geo-alt"></i> <strong>Rua:</strong>
                        {{ $serviceOrder->cliente->endereco->rua ?? 'não informado' }}</p>
                    <p><i class="bi bi-hash"></i> <strong>Número:</strong>
                        {{ $serviceOrder->cliente->endereco->numero ?? 'não informado' }}</p>
                    <p><i class="bi bi-signpost-split"></i> <strong>Bairro:</strong>
                        {{ $serviceOrder->cliente->endereco->bairro ?? 'não informado' }}</p>
                    <p><i class="bi bi-geo"></i> <strong>Cidade:</strong>
                        {{ $serviceOrder->cliente->endereco->cidade ?? 'não informado' }}</p>
                    <p><i class="bi bi-map"></i> <strong>Estado:</strong>
                        {{ $serviceOrder->cliente->endereco->estado ?? 'não informado' }}</p>
                </div>
            </div>

            <div class="row">
                <!-- Peças e Serviços -->
                <div class="col-md-12">
                    <div class="table-responsive mb-3">
                        <h3 class="text-center fw-bold" style="color:#6f42c1;">Serviços</h3>
                        <table class="table table-hover align-middle bg-white shadow-sm rounded">
                            <thead>
                                <tr>
                                    <th style="width: 45%">Nome:</th>
                                    <th>Quantidade:</th>
                                    <th>Valor:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($serviceOrder->servicos) && !$serviceOrder->servicos->isEmpty())
                                    @foreach ($serviceOrder->servicos as $servico)
                                        <tr>
                                            <td>
                                                <strong>{{ $servico->descricao }}</strong>
                                            </td>
                                            <td>
                                                {{ $servico->pivot->quantidade }}
                                            </td>
                                            <td>
                                                {{ number_format($servico->pivot->preco, 2, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Nenhum serviço foi feito.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="table-responsive mb-3">
                        <h3 class="text-center fw-bold" style="color:#6f42c1;">Peças</h3>
                        <table class="table table-hover align-middle bg-white shadow-sm rounded">
                            <thead>
                                <tr>
                                    <th style="width: 46%">Nome:</th>
                                    <th>Quantidade:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($serviceOrder->pecas) && !$serviceOrder->pecas->isEmpty())
                                    <tr>
                                        @foreach ($serviceOrder->pecas as $peca)
                                            <td>
                                                <strong>{{ $peca->nome }}</strong>
                                            </td>
                                            <td>
                                                {{ $peca->pivot->quantidade }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @else
                                    <td colspan="3" class="text-center">Nenhuma peça foi utilizada.</td>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- Botões de Ações -->
            <div class="d-flex justify-content-end mt-4">
                {{-- <div class="btn-group">
                    <a href="{{ route('serviceOrder.edit', $serviceOrder->id) }}"
                        class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $serviceOrder->id }}"
                        class="btn btn-sm btn-outline-danger delete-service-order">Excluir</a>
                    <x-mecanicos.modal-excluir :serviceOrder="$serviceOrder" />
                </div> --}}
            </div>
        </div>
    </div>
@endsection
