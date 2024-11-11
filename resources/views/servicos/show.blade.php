@extends('layouts.template')

@section('title')
    Ordens de Serviço
@endsection


@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Serviços</h4>
            <a href="{{ route('create.servicos') }}" class="btn mt-2 mt-sm-0"
                style="background-color:#6f42c1; color:#fff">Adicionar um novo serviço</a>
        </div>
        <div class="card-body">
            <livewire:buscar-servico :servicos="$servicos" />
        </div>
    </div>
@endsection
