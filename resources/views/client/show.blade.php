@extends('layouts.template')
@section('title')
    Clientes
@endsection

@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Clientes</h4>
            <a href="{{ route('create.client') }}" class="btn mt-2 mt-sm-0"
                style="background-color:#6f42c1; color:#fff">Adicionar Novo
                cliente</a>
        </div>
        <div class="card-body">
            @if (!$clientes->isEmpty())
                <p class="text-center"> olhe so um cliente rapaziada!</p>
            @else
                <p class="text-center">não há nenhum usuário cadastrado.</p>
            @endif
        </div>
    @endsection
