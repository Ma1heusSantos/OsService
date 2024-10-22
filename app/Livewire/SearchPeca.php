<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Peca;

class SearchPeca extends Component
{
    public $search = '';
    public $pecas; 

    public function mount($pecas) 
    {
        $this->pecas = $pecas; 
    }
    public function render()
    {
        $this->pecas = Peca::where('nome', 'LIKE', '%' . $this->search . '%')
        ->orWhere('cod_peca', 'LIKE', '%' . $this->search . '%')
        ->with('categoriaPeca')->get();
        return view('livewire.search-peca',['pecas'=>$this->pecas]);
        
    }
}