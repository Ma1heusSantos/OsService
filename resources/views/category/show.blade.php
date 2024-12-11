@extends('layouts.template')

@section('title')
    Categorias
@endsection


@section('conteudo')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Categorias</h4>
            <a href="{{ route('create.categoria') }}" class="btn mt-2 mt-sm-0"
                style="background-color:#6f42c1; color:#fff">Adicionar Categoria</a>
        </div>
        <div class="card-body">
            <livewire:search-categoria :categoriasPeca="$categoriasPeca" :categoriasServico="$categoriasServico" />

        </div>
    </div>
@endsection
