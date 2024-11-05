<?php

namespace App\Http\Controllers;

use App\Models\CategoriaPeca;
use Illuminate\Http\Request;
use App\Models\Peca;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;

class pecaController extends Controller
{
   public function show(){
    $pecas = Peca::with('categoriaPeca')->get();
    return view('peca.show',['pecas'=>$pecas]);

   }
   
   public function create(){
      $categorias = CategoriaPeca::all();
      return view('peca.create',['categorias'=>$categorias]);
   }
   public function store(Request $request){
    $preco = str_replace(['.', ','], ['', '.'], $request->preco); 
    $preco = (float) $preco;
      try{
         Validator::make($request->all(), [
             'cod_peca' => 'required|unique:peca,cod_peca|max:255',
             'nome' => 'required|string|max:255', 
             'preco' => 'required', 
         ])->validate();  
         
 
         $peca = Peca::create([
             'cod_peca' => $request->cod_peca,
             'nome' => $request->nome, 
             'preco' => $preco,
             'quantidade'=>$request->quantidade, 
             'categoria_id'=> (int)$request->categoria_id,
             'empresa_id'=> Auth::user()->empresa_id
         ]);


         return redirect()->route('show.peca')->with('success', 'Peça criada com sucesso!');
     }catch(Exception $e){
         Log::info($e->getMessage());
         return redirect()->back()->withErrors($e->getMessage())->withInput();
     }
   }

   public function delete($id){
    try{
            $peca = Peca::find($id);
            if (!$peca) {
                return redirect()->back()->withErrors('Peça não encontrada.')->withInput();
            }else{
                $peca->delete();
            }
            return redirect()->route('show.peca');
        }catch(Exception $e){
        Log::info($e->getMessage());
    }
    
   }

   public function update($id){
    $peca = Peca::find($id);
    $categorias = CategoriaPeca::all();
    return view('peca.update',['peca'=> $peca,'categorias'=>$categorias]);
}
public function savePeca(Request $request,$id){
    $peca = Peca::find($id);
    $preco = str_replace(['.', ','], ['', '.'], $request->preco); 
    $preco = (float) $preco;

    if (!$peca) {
        return redirect()->back()->withErrors('Peça não encontrada.')->withInput();
    }

    try{
        Validator::make($request->all(), [
            'cod_peca' => 'unique:peca,cod_peca|max:255',
            'nome' => 'max:255', 
            
        ])->validate();
        
        $fields = [
            'cod_peca' => !empty($request->cod_peca) ? $request->cod_peca : $peca->cod_peca,    
            'nome' => !empty($request->nome) ? $request->nome : $peca->nome,
            'preco' => $request->preco ? $preco: $peca->preco,
            'quantidade'=>$request->quantidade ? $request->quantidade:$peca->quantidade, 
            'categoria' => $request->categoria ? (int)$request->categoria : $peca->categoria
            
        ];

        $peca->update($fields);

        return redirect()->route('show.peca',$peca->id)->with('success', 'Usuário criado com sucesso!');
    }catch(Exception $e){
        Log::info($e->getMessage());
        return redirect()->back()->withErrors($e->getMessage())->withInput();
    }
}

}