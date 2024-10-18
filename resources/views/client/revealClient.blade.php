@extends('layouts.template')

@section('title')
    Detalhes do Cliente
@endsection

@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Detalhes do Cliente</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 class="fw-bold" style="color:#6f42c1;">{{ $cliente->name }}</h5>
                    <p><i class="bi bi-telephone"></i> <strong>Telefone:</strong>
                        {{ $cliente->telefone ?? 'não informado' }}</p>
                    <p><i class="bi bi-phone"></i> <strong>Celular:</strong> {{ $cliente->celular ?? 'não informado' }}
                    </p>
                    <p><i class="bi bi-envelope"></i> <strong>E-mail:</strong> {{ $cliente->email ?? 'não informado' }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p><i class="bi bi-building"></i> <strong>Razão Social:</strong>
                        {{ $cliente->razao_social ?? 'não informado' }}</p>
                    <p><i class="bi bi-card-list"></i> <strong>CPF/CNPJ:</strong>
                        {{ $cliente->cpf_cnpj ?? 'não informado' }}</p>
                    <p><i class="bi bi-file-earmark-text"></i> <strong>Inscrição Estadual (IE):</strong>
                        {{ $cliente->ie ?? 'não informado' }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold" style="color:#6f42c1;">Endereço:</h6>
                    <p><i class="bi bi-geo-alt"></i> <strong>Rua:</strong>
                        {{ $cliente->endereco->rua ?? 'não informado' }}</p>
                    <p><i class="bi bi-hash"></i> <strong>Número:</strong>
                        {{ $cliente->endereco->numero ?? 'não informado' }}</p>
                    <p><i class="bi bi-signpost-split"></i> <strong>Bairro:</strong>
                        {{ $cliente->endereco->bairro ?? 'não informado' }}</p>
                    <p><i class="bi bi-building"></i> <strong>Complemento:</strong>
                        {{ $cliente->endereco->complemento ?? 'não informado' }}</p>
                    <p><i class="bi bi-geo"></i> <strong>Cidade:</strong>
                        {{ $cliente->endereco->cidade ?? 'não informado' }}</p>
                    <p><i class="bi bi-map"></i> <strong>Estado:</strong>
                        {{ $cliente->endereco->estado ?? 'não informado' }}</p>
                    <p><i class="bi bi-mailbox"></i> <strong>CEP:</strong>
                        {{ $cliente->endereco->cep ?? 'não informado' }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <div class="btn-group">
                    <a href="{{ route('update.client', $cliente->id) }}"
                        class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $cliente->id }}"
                        class="btn btn-sm btn-outline-danger delete-user"> Excluir
                    </a>
                    <x-client.modal-excluir :cliente="$cliente" />
                </div>
            </div>
        </div>
    </div>
@endsection
