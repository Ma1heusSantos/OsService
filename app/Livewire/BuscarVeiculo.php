<?php

namespace App\Livewire;

use App\Models\Veiculo;
use Livewire\Component;

class BuscarVeiculo extends Component
{
    public $veiculos = [];
    public $search = "";

    public function mount() 
    {
        $this->veiculos = Veiculo::all(); 
    }
    public function render()
    {
        $this->veiculos = Veiculo::where('modelo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('placa', 'LIKE', '%' . $this->search . '%')
            ->orWhere('chassi', 'LIKE', '%' . $this->search . '%')
            ->get(); 
        return view('livewire.buscar-veiculo');
    }
}