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

        label, button, input {
            font-family: "Ubuntu Sans", serif;
        }
        
        h2{
            font-family: "Playfair Display", serif;
        }

        .ladoDireito2 {
        width: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        color: #ffffff; 
        }


        .ladoEsquerdo {
        width: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        color: #ffffff; 
        background-color: #866ec7;
        }


        
        @media screen and (max-width: 450px) {
            
            .ladoDireito{
                display: none;
               
            }
            .ladoDireito2{
                display: none;
            }

            .ladoEsquerdo{
                flex: 1;
            }
            
        }

        
       
    </style>
@endsection

@section('conteudo')
    <div class="d-flex full-height">
        <!-- Lado esquerdo -->   
        <div  class="ladoEsquerdo">
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
        <div   class="ladoDireito2" >
        <div  class="ladoDireito" style="width: 100%; height: 100%; background: url({{ asset('assets/imagemLogin.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
        </div>
    </div><!-- Div principal -->
@endsection
