@extends('layouts.template')

@section('title')
    Detalhes do Cliente
@endsection

@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Detalhes do Cliente</h4>
            {{-- <a href="{{ route('clients.index') }}" class="btn mt-2 mt-sm-0" style="background-color:#6f42c1; color:#fff">Voltar
                à Lista de Clientes</a> --}}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3" style="color:#6f42c1; font-weight: 600;">{{ $cliente->name }}</h5>
                    <p><strong>Telefone:</strong> {{ $cliente->telefone ?? 'não informado' }}</p>
                    <p><strong>Celular:</strong> {{ $cliente->celular ?? 'não informado' }}</p>
                    <p><strong>E-mail:</strong> {{ $cliente->email ?? 'não informado' }}</p>
                    {{-- <p><strong>Endereço:</strong> {{ $cliente->endereco ?? 'N/A' }}</p> --}}
                </div>
                <div class="col-md-6">
                    <p><strong>Razão Social:</strong> {{ $cliente->razao_social ?? 'não informado' }}</p>
                    <p><strong>CPF/CNPJ:</strong> {{ $cliente->cpf_cnpj ?? 'não informado' }}</p>
                    <p><strong>Inscrição Estadual (IE):</strong> {{ $cliente->ie ?? 'não informado' }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="#" class="btn btn-outline-warning me-2">Editar</a>
                <não informado" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Excluir</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
