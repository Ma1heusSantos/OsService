<?php

namespace App\Livewire;

use App\Models\Mecanico;
use Livewire\Component;

class BuscarMecanico extends Component
{
    public $search;
    public $mecanicos;
    public function render()
    {
        $this->mecanicos = Mecanico::where('nome', 'like', '%' . $this->search . '%')
            ->where('status', '=', true)
            ->get();

        return view('livewire.buscar-mecanico');
    }
}