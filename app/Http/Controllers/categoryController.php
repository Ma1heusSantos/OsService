<?php

namespace App\Http\Controllers;

use App\Models\CategoriaPeca;
use App\Models\CategoriaServico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class categoryController extends Controller
{
    public function create(){
        return view('category.create');
    }
    public function show(){
        $categoriasPeca = CategoriaPeca::all();
        $categoriasServico = CategoriaServico::all();

        return view('category.show',['categoriasPeca'=>$categoriasPeca,'categoriasServico'=>$categoriasServico]);
    }
    public function store(Request $request){
        if($request->tipo_categoria == 1){
            CategoriaPeca::create([
                'descricao'=>$request->descricao
            ]);
        }else{
            CategoriaServico::create([
                'descricao' => $request->descricao
            ]);
        }
        return redirect()->route('show.categoria')->with('success', 'Categoria criada com sucesso!');
    }
    public function deletePeca($id){
   
        try{
            $categoria = CategoriaPeca::with('pecas')->find($id);
            if (!$categoria) {
                return redirect()->back()->withErrors('Categoria não encontrada.')->withInput();
            }else{
                DB::beginTransaction();
                foreach ($categoria->pecas as $peca) {
                    $peca->delete();
                }
                $categoria->delete();
                DB::commit();
            }
            return redirect()->route('show.categoria')->with('success', 'Categoria excluida com sucesso!');
        }catch(Exception $e){
            Log::info($e->getMessage());
            DB::rollback();
        }   
    }

    public function deleteServico($id){
   
        try{
            $categoria = CategoriaServico::with('servicos')->find($id);
            if (!$categoria) {
                return redirect()->back()->withErrors('Categoria não encontrada.')->withInput();
            }else{
                DB::beginTransaction();
                foreach($categoria->servicos as $servicos){
                    $servicos->delete();
                }
                $categoria->delete();
                DB::commit();
            }
            return redirect()->route('show.categoria')->with('success', 'Categoria excluida com sucesso!');
        }catch(Exception $e){
            Log::info($e->getMessage());
            DB::rollback();
        }
    }
    public function updatePeca($id){
        $categoria = CategoriaPeca::find($id);
        return view('category.update',['categoria'=>$categoria]);
    }
    public function saveCategoriaPeca(Request $request,$id){
       try{
            $categoria = CategoriaPeca::find($id);
            $categoria->update([
            'descricao'=> $request->descricao
            ]);
            return redirect()->route('show.categoria')->with('success', "Categoria editada com sucesso!");
       }catch(Exception $e){
            Log::info('erro'.$e->getMessage());
       }
    }
    public function updateServico($id){
        $categoria = CategoriaServico::find($id);
        return view('category.updateServico',['categoria'=>$categoria]);
    }
    public function saveCategoriaServico(Request $request,$id){
        try{
            $categoria = CategoriaServico::find($id);
            $categoria->update([
            'descricao'=> $request->descricao
            ]);
            return redirect()->route('show.categoria')->with('success', "Categoria editada com sucesso!");
       }catch(Exception $e){
            Log::info('erro'.$e->getMessage());
       }
    }
}