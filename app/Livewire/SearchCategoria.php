<?php

namespace App\Livewire;

use App\Models\CategoriaPeca;
use App\Models\CategoriaServico;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SearchCategoria extends Component
{
    public $search;
    public $categoriasPeca; 
    public $categoriasServico;  
    public function render()
    {
        $this->categoriasPeca = CategoriaPeca::where('descricao', 'like', '%' . $this->search . '%')->get();
        $this->categoriasServico = CategoriaServico::where('descricao', 'like', '%' . $this->search . '%')->get();
        
        return view('livewire.search-categoria');
    }
 
}