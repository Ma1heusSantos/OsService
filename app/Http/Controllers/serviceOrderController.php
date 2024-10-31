<?php

namespace App\Http\Controllers;

use App\Models\CategoriaServico;
use App\Models\Cliente;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class serviceOrderController extends Controller
{
    public function show(){
        $serviceOrder = ServiceOrder::all();
        return view('serviceOrder.show',['serviceOrder'=>$serviceOrder]);
    }

    public function create(){
        $categorias = CategoriaServico::all();
        $clientes = Cliente::all();
        return view('serviceOrder.create',['categorias'=>$categorias,'clientes'=>$clientes]);
    }

    public function store(Request $request){
        dd($request);
    }
}