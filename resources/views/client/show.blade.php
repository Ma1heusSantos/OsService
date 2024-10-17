@extends('layouts.template')

@section('title')
    Clientes
@endsection


@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Clientes</h4>
            <a href="{{ route('create.client') }}" class="btn mt-2 mt-sm-0"
                style="background-color:#6f42c1; color:#fff">Adicionar Novo Cliente</a>
        </div>
        <div class="card-body">
            @if (!$clientes->isEmpty())
                <ul class="list-group">
                    @foreach ($clientes as $cliente)
                        <a href="{{ route('reveal.client', $cliente->id) }}">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-grow-1 justify-content-between align-items-center">
                                    <div class="text-center">
                                        <h5 class="mb-1" style="color:#6f42c1;font-size:24px; font-weight: 600;">
                                            {{ !empty($cliente->name) ? $cliente->name : $cliente->razao_social }}
                                        </h5>
                                        <p class="mb-0" style="color: #6c757d; font-size:13px;">
                                            {{ !empty($cliente->telefone) ? $cliente->telefone : $cliente->celular }}
                                        </p>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-warning mr-3">Editar</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger">Excluir</a>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            @else
                <p class="text-center">Não há nenhum usuário cadastrado.</p>
            @endif
        </div>
    </div>
@endsection
