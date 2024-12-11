<?php

namespace App\Http\Controllers;

use App\Models\CategoriaServico;
use App\Models\Cliente;
use App\Models\Mecanico;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

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
}