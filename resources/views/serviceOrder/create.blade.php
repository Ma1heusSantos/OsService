@extends('layouts.template')

@section('title')
    Peças
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Cadastrar Ordem de Serviço</h4>
        </div>
        <div class="card-body">
            <x-serviceOrder.form :action="route('store.service')" :categorias="$categorias" :clientes="$clientes" />
        </div>
    </div>
@endsection
