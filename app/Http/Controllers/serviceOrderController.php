<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class serviceOrderController extends Controller
{
    public function show(){
        $serviceOrder = ServiceOrder::all();
        return view('serviceOrder.show',['serviceOrder'=>$serviceOrder]);
    }
}