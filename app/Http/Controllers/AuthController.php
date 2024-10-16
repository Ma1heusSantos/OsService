<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use function Laravel\Prompts\password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(){
        return view('auth.login');
    }

    public function autenticaUsuario(Request $request) {
        try {
            Validator::make($request->all(), [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ])->validate();
    
            $usuario = User::where('email', $request->email)->first();
    
            if ($usuario && Hash::check($request->password, $usuario->password)) {
                Auth::login($usuario, $request->has('remember'));
                $request->session()->regenerate();
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->withErrors([
                    'email' => 'As credenciais fornecidas não correspondem a nenhum usuário.'
                ]);
            }
    
        } catch (Exception $e) {
            Log::error("Erro ao tentar logar: " . $e->getMessage());
            return redirect()->route('login')->with('Error', $e->getMessage());
        }
    }
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
    
    
}