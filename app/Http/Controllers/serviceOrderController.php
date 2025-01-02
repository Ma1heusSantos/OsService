<?php

namespace App\Http\Controllers;

use App\Models\CategoriaServico;
use App\Models\Cliente;
use App\Models\Mecanico;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class serviceOrderController extends Controller
{
    public function show(){
        $serviceOrder = ServiceOrder::with('categoriaServico', 'cliente','mecanico')->get();
        return view('serviceOrder.show',['serviceOrder'=>$serviceOrder]);
    }

    public function create(){
        $categorias = CategoriaServico::all();
        $clientes = Cliente::all();
        $mecanicos = Mecanico::all();
        return view('serviceOrder.create',['categorias'=>$categorias,'clientes'=>$clientes,'mecanicos'=>$mecanicos]);
    }
    public function delete($id){
        try{
            $ordem = ServiceOrder::find($id);
            if (!$ordem) {
                return redirect()->back()->withErrors('Ordem de serviço não encontrado.')->withInput();
            }else{
                $ordem->delete();
            }
            return redirect()->route('serviceOrder.show');
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
    }
    public function details($id){
        $serviceOrder = ServiceOrder::with([
            'cliente', 
            'categoriaServico', 
            'user', 
            'pecas', 
            'servicos', 
            'mecanico'
        ])->find($id);
        return view('serviceOrder.details',['serviceOrder'=> $serviceOrder]);
    }
}