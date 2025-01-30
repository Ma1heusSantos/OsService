@extends('layouts.template')

@section('title')
    Usuários
@endsection

@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Alterar Mecânico</h4>
        </div>
        <div class="card-body">
            <livewire:form-update-veiculo :veiculo="$veiculo" />
        </div>
    </div>
@endsection
