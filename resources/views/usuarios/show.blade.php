@extends('layouts.template')

@section('title')
    Usuários
@endsection

@section('conteudo')
    <div class="card mt-5 bg-white shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between flex-column flex-sm-row align-items-center">
            <h4 class="fw-bold" style="color:#6f42c1;">Usuários</h4>
            <a href="{{ route('create.users') }}" class="btn mt-2 mt-sm-0"
                style="background-color:#6f42c1; color:#fff">Adicionar Novo
                Usuário</a>
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
                        @foreach ($usuarios as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="text-center">
                                    <a href="{{ route('update', $user->id) }}" class="text-warning">
                                        <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir{{ $user->id }}" class="text-danger delete-user">
                                        <i class="fa-solid fa-trash-can fa-xl"></i>
                                    </a>
                                </td>
                            </tr>
                            <x-user.modal-excluir :user="$user" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
