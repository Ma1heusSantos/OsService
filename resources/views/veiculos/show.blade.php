@extends('layouts.template')

@section('title')
    Ordens de Serviço
@endsection


@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Veiculos</h4>
            <a href="{{ route('create.veiculos') }}" class="btn mt-2 mt-sm-0"
                style="background-color:#6f42c1; color:#fff">Adicionar um novo Veiculo</a>
        </div>
        <div class="card-body">
            <livewire:search-veiculo :veiculos="$veiculos" />
        </div>
    </div>
@endsection
