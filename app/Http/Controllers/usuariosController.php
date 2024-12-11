<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class usuariosController extends Controller
{
    public function show(){
        $usuarios = User::orderBy("name")->get();
        return view('usuarios.show',['usuarios'=> $usuarios]);
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request ){
        
            Validator::make($request->all(), [
                'name'=> 'required',
                'email' => 'required|unique:users|max:255',
                'password' => 'required|min:8',
                'password_confirmation' =>'same:password',
                'role' => 'required'
            ])->validate();
            try{
    
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> bcrypt($request->password),
                'empresa_id'=> Auth::user()->empresa_id,
                'role'=> $request->role
            ]);

            return redirect()->route('show.users')->with('success', 'Usuário criado com sucesso!');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Erro ao salvar o usuario. Tente novamente.'])->withInput();
        }
        
    }
    public function update($id){
        $user = User::find($id);
        return view('usuarios.update',['user'=>$user]);
    }
    public function updateUser(Request $request,$id){
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors('Usuário não encontrado.')->withInput();
        }

            Validator::make($request->all(), [
                'name'=>'nullable|string|max:255',
                'email' => 'email|unique:users,email,' . $user->id . '|max:255|nullable',
                'password' => 'nullable|min:8',
                'password_confirmation' => 'same:password|nullable',
                'role'=>'nullable'
            ])->validate();
            try{
            
            $fields = [
                'name' => !empty($request->name) ? $request->name : $user->name,
                'email' => !empty($request->email) ? $request->email : $user->email,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
                'empresa_id' => Auth::user()->empresa_id,
                'role' => !empty($request->role) ? $request->role : $user->role,
            ];

            $user->update($fields);

            return redirect()->route('show.users')->with('success', 'Usuário criado com sucesso!');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Erro ao salvar o usuario. Tente novamente.'])->withInput();
        }
    }
    public function delete($id){
   
        try{
            $user = User::find($id);
            if (!$user) {
                return redirect()->back()->withErrors('Usuário não encontrado.')->withInput();
            }else{
                $user->delete();
            }
            return redirect()->route('show.users');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
        
    }
}