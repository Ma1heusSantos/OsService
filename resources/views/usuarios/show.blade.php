@extends('layouts.template')

@section('title')
    Usuários
@endsection

@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Usuários</h4>
            <button class="btn mt-2 mt-sm-0" style="background-color:#6f42c1; color:#fff">Adicionar Novo Usuário</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">E-mail</th>
                            <th scope="col">Função</th>
                            <th scope="col" class="text-center">Editar</th>
                            <th scope="col" class="text-center">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($users as $user) --}}
                        <tr>
                            <td>email@example.com</td>
                            <td>Administrador</td>
                            <td class="text-center">
                                <a href="#" class="text-warning">
                                    <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="#" class="text-danger">
                                    <i class="fa-solid fa-trash-can fa-xl"></i>
                                </a>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
