@extends('layouts.template')

@section('title')
    Detalhes do Mecânico
@endsection

@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Detalhes do Mecânico</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 class="fw-bold" style="color:#6f42c1;">{{ $mecanico->nome }}</h5>
                    <p><i class="bi bi-telephone"></i> <strong>Telefone:</strong>
                        {{ $mecanico->telefone ?? 'não informado' }}</p>
                    <p><i class="bi bi-envelope"></i> <strong>E-mail:</strong> {{ $mecanico->email ?? 'não informado' }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p><i class="bi bi-building"></i> <strong>CPF:</strong>
                        {{ $mecanico->cpf ?? 'não informado' }}</p>
                    <p><i class="bi bi-card-list"></i> <strong>Especialidade:</strong>
                        {{ $mecanico->especialidade ?? 'não informado' }}</p>
                    <p><i class="bi bi-file-earmark-text"></i> <strong>Data de Nascimento:</strong>
                        {{ $mecanico->data_nascimento ?? 'não informado' }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold" style="color:#6f42c1;">Endereço:</h6>
                    <p><i class="bi bi-geo-alt"></i> <strong>Rua:</strong>
                        {{ $mecanico->endereco->rua ?? 'não informado' }}</p>
                    <p><i class="bi bi-hash"></i> <strong>Número:</strong>
                        {{ $mecanico->endereco->numero ?? 'não informado' }}</p>
                    <p><i class="bi bi-signpost-split"></i> <strong>Bairro:</strong>
                        {{ $mecanico->endereco->bairro ?? 'não informado' }}</p>
                    <p><i class="bi bi-building"></i> <strong>Complemento:</strong>
                        {{ $mecanico->endereco->complemento ?? 'não informado' }}</p>
                    <p><i class="bi bi-geo"></i> <strong>Cidade:</strong>
                        {{ $mecanico->endereco->cidade ?? 'não informado' }}</p>
                    <p><i class="bi bi-map"></i> <strong>Estado:</strong>
                        {{ $mecanico->endereco->estado ?? 'não informado' }}</p>
                    <p><i class="bi bi-mailbox"></i> <strong>CEP:</strong>
                        {{ $mecanico->endereco->cep ?? 'não informado' }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <div class="btn-group">
                    <a href="{{ route('update.mecanicos', $mecanico->id) }}"
                        class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $mecanico->id }}"
                        class="btn btn-sm btn-outline-danger delete-user"> Excluir
                    </a>
                    <x-mecanicos.modal-excluir :mecanico="$mecanico" />
                </div>
            </div>
        </div>
    </div>
@endsection
