<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Peca;

class BuscarPeca extends Component
{
    public $query;
    public $pecas = [];
    public $resultados = [];


    public function updatedQuery()
    {
        $this->resultados = Peca::where('nome', 'like', '%' . $this->query . '%')->get();
    }

    public function adicionarPeca()
    {
        if (!empty($this->query)) {
            $peca = Peca::where('nome', 'like', '%' . $this->query . '%')->get()->first();
            if (!$peca) {
                session()->flash('error', 'Peça não encontrada. Adicione uma peça e tente novamente.');
                return;
            }
            $this->pecas[] = ['id'=>$peca->id,'nome' => $this->query, 'quantidade' => 0];
            $this->query = '';
            $this->dispatch('atualizarPecas', pecas: $this->pecas);
        }
    }

    public function incrementarQtd($index)
    {
        if (isset($this->pecas[$index])) {
            $peca = Peca::find($this->pecas[$index]['id']); 
            $this->pecas[$index]['quantidade']++;
            $this->dispatch('AdicionarNoValor', valor: $peca->preco);
            $this->dispatch('atualizarPecas', pecas: $this->pecas);
        }
    }


    public function decrementarQtd($index)
    {
        if (isset($this->pecas[$index]) && $this->pecas[$index]['quantidade'] != 0) {
            $peca = Peca::find($this->pecas[$index]['id']);
            $this->pecas[$index]['quantidade'] == 0 ? $this->pecas[$index]['quantidade'] == 0 : $this->pecas[$index]['quantidade']--; 
            $this->dispatch('diminuirNoValor', valor: $peca->preco);
            $this->dispatch('atualizarPecas', pecas: $this->pecas);
        }
    }


    public function removeElemento($index){
        if (isset($this->pecas[$index])) {
            $peca = Peca::find($this->pecas[$index]['id']);
            $valorRemover = $this->pecas[$index]['quantidade'] * $peca->preco;
            $this->dispatch('removerValorItem', valor: $valorRemover);
            unset($this->pecas[$index]);
            $this->pecas = array_values($this->pecas); 
            $this->dispatch('atualizarPecas', pecas: $this->pecas);
        }
    }

    public function selectPeca($nomePeca)
    {
        $this->query = $nomePeca;  
        $this->resultados = [];    
    }
    public function getPecas()
    {
        return $this->pecas;
    }
   


    public function render()
    {
        return view('livewire.buscar-peca');
    }
}