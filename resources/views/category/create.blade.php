@extends('layouts.template')

@section('title')
    Ordens de Serviço
@endsection


@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Criar categorias</h4>
        </div>
        <div class="card-body">
            <x-category.form :action="route('store.categoria')" />
        </div>
    </div>
@endsection
