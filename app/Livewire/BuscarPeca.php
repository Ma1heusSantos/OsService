<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Peca;

class BuscarPeca extends Component
{
    public $query;
    public $resultados = [];

    protected $listeners = ['selectPeca'];

    public function updatedQuery()
    {
        $this->resultados = Peca::where('nome', 'like', '%' . $this->query . '%')->get();
    }

    public function selectPeca($nomePeca)
    {
        $this->query = $nomePeca;  // Atualiza o campo de entrada com o valor selecionado
        $this->resultados = [];    // Limpa a lista de resultados para ocultar o dropdown
    }

    public function render()
    {
        return view('livewire.buscar-peca');
    }
}