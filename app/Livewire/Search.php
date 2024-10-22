<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public function render()
    {
        $clientes = Cliente::where('name', 'LIKE', '%' . $this->search . '%')
        ->orWhere('razao_social', 'LIKE', '%' . $this->search . '%')->get();
        return view('livewire.search',['clientes'=>$clientes]);
        
    }
}