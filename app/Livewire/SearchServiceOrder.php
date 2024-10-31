<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceOrder;

class SearchServiceOrder extends Component
{
    public $serviceOrder;
    public $search='';
    public function render()
    {
        $serviceOrder = ServiceOrder::where('cod_service','LIKE','%',$this->search,'%')
        ->orWhere('descricao','LIKE','%',$this->search,'%');
        return view('livewire.search-service-order',['serviceOrder'=>$serviceOrder]);
    }
}