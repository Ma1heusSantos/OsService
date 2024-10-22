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
      try{
         Validator::make($request->all(), [
             'cod_peca' => 'required|unique:peca,cod_peca|max:255',
             'nome' => 'required|string|max:255', 
             'preco' => 'required', 
         ])->validate();  
         
 
         $peca = Peca::create([
             'cod_peca' => $request->cod_peca,
             'nome' => $request->nome, 
             'preco' => $request->preco, 
             'categoria_id'=> (int)$request->categoria_id,
             'empresa_id'=> Auth::user()->empresa_id
         ]);


         return redirect()->route('show.peca')->with('success', 'Peça criada com sucesso!');
     }catch(Exception $e){
         Log::info($e->getMessage());
         return redirect()->back()->withErrors($e->getMessage())->withInput();
     }
   }
}