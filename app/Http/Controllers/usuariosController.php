<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function show(){
        // $usuarios = User::orderBy("name");
        return view('usuarios.show');
    }
}