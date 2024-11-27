<?php

namespace App\Livewire;

use App\Models\Servicos;
use Livewire\Component;

class AdicionarServico extends Component
{
    public $query;
    public $servicos = [];
    public $resultados = [];


    public function updatedQuery()
    {
        $this->resultados = Servicos::where('descricao', 'like', '%' . $this->query . '%')->get();
    }
    public function adicionarServico()
    {
        $servico = Servicos::where('descricao', 'like', '%' . $this->query . '%')->first();
        if (!empty($this->query)) {
            if (!$servico) {
                session()->flash('error', 'Serviço não encontrado. Adicione um serviço e tente novamente.');
                return;
            }
            $this->servicos[] = [
                'id' => $servico->id,
                'descricao' => $servico->descricao,
                'valor' => $servico->valor,
                'quantidade' => 1
            ];
            $this->query = '';
            $this->dispatch('atualizarServico', servico: $this->servicos);
    }
}


    public function removeElemento($index){
        if (isset($this->servicos[$index])) {
            unset($this->servicos[$index]);
            $this->servicos = array_values($this->servicos); 
            $this->dispatch('atualizarServico', servico: $this->servicos);
        }
    }
    public function selectServico($nomeServico)
    {
        $this->query = $nomeServico;  
        $this->resultados = [];    
    }
    public function render()
    {
        return view('livewire.adicionar-servico');
    }
}