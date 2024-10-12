@extends('layouts.app')

@section('title')
    Login
@endsection

@section('style')
    <style>
        html,
        body {
            height: 100%;
        }

        .full-height {
            height: 100vh;
        }

        .right-side {
            margin: 20px 20px 20px 0;
        }
    </style>
@endsection

@section('conteudo')
    <div class="d-flex full-height">
        <!-- Lado esquerdo (bg-black) -->
        <div class="w-50 d-flex align-items-center justify-content-center text-white">
            <div class="col-md-6 left-side d-flex flex-column justify-content-center">
                <h2 class="mb-4 text-black">Os Service</h2>
                <!-- Form -->
                <form method="post" action="{{ route('autentica.Usuario') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-black">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-black">Senha</label>
                        <input type="password" class="form-control" name='password' id="password"
                            placeholder="min 8 chars">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>

        <!-- Lado direito (bg-primary) -->
        <div class="w-50 bg-primary d-flex align-items-center justify-content-center text-white">
            <div class="col-md-6 right-side">
                <h2>The simplest way to manage your workforce</h2>
                <p>Enter your credentials to access your account</p>
                <div class="mt-4">
                    <h5>Dashboard</h5>
                    <div class="d-flex align-items-center justify-content-between">
                        <p>Productive Time: 12.4 hrs</p>
                        <p>Focused Time: 8.5 hrs</p>
                    </div>
                    <p>Team Utilization:</p>
                    <ul>
                        <li>Marketing: 75%</li>
                        <li>Customer Success: 65%</li>
                        <li>Development: 90%</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
