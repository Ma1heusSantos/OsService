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
                'estado' => 'required|string|max:12',
                'cep' => 'required|max:9' 
            ])->validate();   
    
            $cliente = Cliente::create([
                'name' => $request->name,
                'cpf' => $request->cpf, 
                'cnpj' => $request->cnpj, 
                'telefone' => $request->telefone, 
                'celular' => $request->celular, 
                'razao_social' => $request->razao_social,
                'ie' => $request->ie,
                'empresa_id'=> Auth::user()->empresa_id
            ]);
            Endereco::create([
                'empresa_id'=>Auth::user()->empresa_id,
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

    public function update($id){
        $cliente = Cliente::find($id);
        return view('client.edit',['cliente'=> $cliente]);
    }
    public function saveClient(Request $request,$id){
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->back()->withErrors('Cliente não encontrado.')->withInput();
        }

        try{
            Validator::make($request->all(), [
                'name' => 'string|max:255',
                'cpf' => 'nullable|unique:cliente', 
                'cnpj' => 'nullable|unique:cliente', 
                'telefone' => 'nullable|string', 
                'celular' => 'nullable|string|', 
                'razao_social' => 'nullable|string|max:255',
                'ie' => 'nullable|string|max:20',
                'rua' => 'string|max:255',
                'numero' => 'integer',
                'bairro' => 'string|max:255',
                'complemento' => 'nullable|string|max:255',
                'cidade' => 'string|max:255',
                'estado' => 'string|max:12',
                'cep' => 'max:9' 
            ])->validate();
            
            $fields = [
                'name' => !empty($request->name) ? $request->name : $cliente->name,
                'cpf' => !empty($request->cpf) ? $request->cpf : $cliente->cpf,
                'cnpj' => $request->cnpj ? $request->cnpj : $cliente->cnpj,
                'telefone' => $request->telefone ? $request->telefone : $cliente->telefone,
                'celular' => !empty($request->celular) ? $request->celular : $cliente->celular,
                'razao_social' => !empty($request->razao_social) ? $request->razao_social : $cliente->razao_social,
                'ie' => !empty($request->ie) ? $request->ie : $cliente->ie,
                'rua' => !empty($request->rua) ? $request->rua : $cliente->rua,
                'numero' => !empty($request->numero) ? $request->numero : $cliente->numero,
                'bairro' => !empty($request->bairro) ? $request->bairro : $cliente->bairro,
                'complemento' => !empty($request->complemento) ? $request->complemento : $cliente->complemento,
                'cidade' => !empty($request->cidade) ? $request->cidade : $cliente->cidade,
                'estado' => !empty($request->estado) ? $request->estado : $cliente->estado,
                'cep' => !empty($request->cep) ? $request->cep : $cliente->cep, 
            ];

            $cliente->update($fields);

            return redirect()->route('reveal.client',$cliente->id)->with('success', 'Usuário criado com sucesso!');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function delete($id){
   
        try{
            $cliente = Cliente::find($id);
            if (!$cliente) {
                return redirect()->back()->withErrors('Cliente não encontrado.')->withInput();
            }else{
                $cliente->delete();
            }
            return redirect()->route('show.client');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
        
    }

    public function revealClient($id){
       $cliente = Cliente::with('endereco')->find($id);
        return view('client.revealClient',['cliente'=>$cliente]);
    }
}