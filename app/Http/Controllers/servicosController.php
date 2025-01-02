<?php

namespace App\Http\Controllers;

use App\Models\CategoriaServico;
use App\Models\Servicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Log;

class servicosController extends Controller
{
    public function show(){
        $servicos = Servicos::all();
        return view('servicos.show',['servicos'=>$servicos]);
    }
    public function create(){
        $categorias = CategoriaServico::all();
        return view('servicos.create',['categorias'=>$categorias]);
    }
    public function store(Request $request){
        $valor = str_replace(['.', ','], ['', '.'], $request->valor); 
        $valor = (float) $valor;
      try{
         Validator::make($request->all(), [
             'cod_servico' => 'unique:servicos,codigo|max:255',
             'descricao' => 'required|string|max:255', 
             'valor' => 'required', 
         ])->validate();  
         
 
         Servicos::create([
             'codigo' => $request->cod_servico,
             'descricao' => $request->descricao, 
             'valor' => $valor,
             'categoria_id'=>$request->categoria_id
         ]);


         return redirect()->route('show.servicos')->with('success', 'Serviço criado com sucesso!');
     }catch(Exception $e){
         Log::info($e->getMessage());
         return redirect()->back()->withErrors($e->getMessage())->withInput();
     }
    }
    public function delete($id){
        try{
            $servico = Servicos::find($id);
            if (!$servico) {
                return redirect()->back()->withErrors('Servico não encontrado.')->withInput();
            }else{
                $servico->delete();
            }
            return redirect()->route('show.servicos');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
    }
    public function update($id){
        $servico = Servicos::find($id);
        return view('servicos.update',['servico'=>$servico]);
    }

    public function saveServico(Request $request,$id){
        $servico = Servicos::find($id);
        $valor = str_replace(['.', ','], ['', '.'], $request->valor); 
        $valor = (float) $valor;
    
        if (!$servico) {
            return redirect()->back()->withErrors('Serviço não encontrado.')->withInput();
        }
    
        try{
            Validator::make($request->all(), [
                'codigo' => 'unique:servicos,codigo|max:255',
                'descricao' => 'string|max:255', 
                'valor' => 'required', 
                
            ])->validate();
            
            $fields = [
                'codigo' => !empty($request->cod_servico) ? $request->cod_servico : $servico->codigo,    
                'descricao' => !empty($request->descricao) ? $request->descricao : $servico->descricao,
                'valor' => $request->valor ? $valor: $servico->valor,
                
            ];
    
            $servico->update($fields);
    
            return redirect()->route('show.servicos',$servico->id)->with('success', 'Servico criado com sucesso!');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}