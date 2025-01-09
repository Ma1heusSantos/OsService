@extends('layouts.app')

@section('title')
    Login
@endsection

@section('style')
    <style>
        html,
        body {
            height: 100%; 
            background-color: #6F42C1;
            
        }

        .full-height {
            height: 100vh;
        }
        label, button, input {
            font-family: "Ubuntu Sans", serif;
        }
        
        h2{
            font-family: "Luminari", fantasy;
        }

       
 
    </style>
@endsection

@section('conteudo')
    <div class="d-flex full-height">
        <!-- Lado esquerdo -->
        <div class="w-50 d-flex align-items-center justify-content-center text-white">
            <div class="col-md-6 left-side d-flex flex-column justify-content-center">
                <h2 class="mb-4 text-center">Os Service</h2>
                <!-- Form -->
                <form method="post" action="{{ route('autentica.Usuario') }}">
                    @csrf
                    <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label ">Senha</label>
                        <input type="password" class="form-control" name='password' id="password"
                            placeholder="min 8 chars">
                    </div>
                    <button type="submit" style="background-color:#00C2A9;" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>

        <!-- Lado direito (bg-primary) -->
        <div style="background-color:#6f42c1;" class="w-50 d-flex align-items-center justify-content-center text-white  ">

        <div style="width: 100%; height: 100%; background: url({{ asset('assets/imagemLogin.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;">
        </div>

            </div>
        </div>
    </div>
@endsection
