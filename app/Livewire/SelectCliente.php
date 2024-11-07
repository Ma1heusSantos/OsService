<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class SelectCliente extends Component
{
    public $clientes;
    public $clienteSelecionado = '';
    public $resultados = [];

    public function atualizaCliente()
    {
        $this->resultados = Cliente::where('name', 'LIKE', '%' . $this->clienteSelecionado . '%')->get();
    }
    
    public function selectCliente($Cliente)
    {
        $this->clienteSelecionado = $Cliente;
        $this->dispatch('atualizarCliente', cliente_id: $this->clienteSelecionado);  
        $this->resultados = []; 

    }
    public function render()
    {
        return view('livewire.select-cliente');
    }
}