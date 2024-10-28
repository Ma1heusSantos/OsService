@extends('layouts.template')

@section('title')
    Clientes
@endsection


@section('conteudo')
    @dd($serviceOrder)
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Ordens de Serviço</h4>
            <a href="{{ route('create.client') }}" class="btn mt-2 mt-sm-0"
                style="background-color:#6f42c1; color:#fff">Adicionar uma nova Ordem de serviço</a>
        </div>
        <div class="card-body">
            <livewire:search-service-order :serviceOrder="$serviceOrder" />
        </div>
    </div>
@endsection
