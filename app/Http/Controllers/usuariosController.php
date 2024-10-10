<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class usuariosController extends Controller
{
    public function show(){
        // $usuarios = User::orderBy("name");
        return view('usuarios.show');
    }

    public function create(){
        $empresa = Empresa::all();
        return view('usuarios.create',['empresa'=>$empresa]);
    }

    public function store(Request $request ){
        Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
            'password_confirmation' =>'same:password'
        ])->validate();

        User::create([
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'empresa_id'=> Auth::user()->empresa_id,
            'role'=> $request->role
        ]);
    }
}