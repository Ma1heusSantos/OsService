@extends('layouts.template')

@section('title')
    Usuários
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
            <h4 class="fw-bold" style="color:#6f42c1;">Alterar Usuários</h4>
        </div>
        <div class="card-body">
            <x-user.form :action="route('update.users', [$user->id])" />
        </div>
    </div>
@endsection
