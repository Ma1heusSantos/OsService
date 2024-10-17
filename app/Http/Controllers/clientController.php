<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Cliente;
use App\Models\Endereco;
use Exception;

class clientController extends Controller
{
    public function show(){
        $clientes = Cliente::all();
        return view('client.show',['clientes'=>$clientes]);
    }
    public function create(){
        return view('client.create');
    }
    public function store(Request $request){
        try{
            Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'cpf' => 'nullable|unique:cliente,cpf|required_without:cnpj', 
                'cnpj' => 'nullable|unique:cliente,cnpj|required_without:cpf', 
                'telefone' => 'nullable|string|required_without:celular', 
                'celular' => 'nullable|string|required_without:telefone', 
                'razao_social' => 'nullable|string|max:255',
                'ie' => 'nullable|string|max:20',
                'rua' => 'required|string|max:255',
                'numero' => 'required|integer',
                'bairro' => 'required|string|max:255',
                'complemento' => 'nullable|string|max:255',
                'cidade' => 'required|string|max:255',
                'estado' => 'required|string|max:2',
                'cep' => 'required|string|size:8' 
            ])->validate();   
    
            $cliente = Cliente::create([
                'name' => $request->name,
                'cpf' => $request->cpf, 
                'cnpj' => $request->cnpj, 
                'telefone' => $request->telefone, 
                'celular' => $request->celular, 
                'razao_social' => $request->razao_social,
                'ie' => $request->ie
            ]);
            Endereco::create([
                // 'empresa_id'=>,
                'rua'=> $request->rua,
                'numero'=> $request->numero,
                'bairro'=> $request->bairro,
                'complemento'=> $request->complemento,
                'cidade'=> $request->cidade,
                'estado'=>$request->estado,
                'cep'=> $request->cep,
                'cliente_id'=>$cliente->id
            ]);

            return redirect()->route('show.client')->with('success', 'Cliente criado com sucesso!');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function revealClient($id){
        $cliente = Cliente::find($id);
        return view('client.revealClient',['cliente'=>$cliente]);
    }
}