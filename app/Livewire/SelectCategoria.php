<?php

namespace App\Livewire;

use App\Models\CategoriaServico;
use Livewire\Component;

class SelectCategoria extends Component
{
    public $categorias;
    public $categoriaSelecionada = '';
    public $resultados = [];

    public function atualizaCategoria()
    {
        $this->resultados = CategoriaServico::where('descricao', 'LIKE', '%' . $this->categoriaSelecionada . '%')->get();
    }
    
    public function selectCategoria($nomeCategoria)
    {
        $this->categoriaSelecionada = $nomeCategoria;
        $this->dispatch('atualizarCategoria', categoria_id: $this->categoriaSelecionada);  
        $this->resultados = []; 

    }

    public function render()
    {
        return view('livewire.select-categoria');
    }
}