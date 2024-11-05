<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class FormServiceOrder extends Component
{
    public $categorias;
    public $clientes;
    public $pecasSelecionadas = []; 

    protected $listeners = ['atualizarPecas'];
    
    #[On('atualizarPecas')]
    public function atualizarPecas($pecas)
    {
        $this->pecasSelecionadas = $pecas;
    }
    

    public function submitForm()
    {
        dd($this);
        // Validação
        $this->validate([
            'nomeCliente' => 'required',
            'quantidade' => 'required|integer',
            'pecaId' => 'required'
        ]);

        // Salvar os dados ou realizar qualquer ação necessária
        // Exemplo: Pedido::create([...]);

        session()->flash('message', 'Dados enviados com sucesso!');
    }

    public function render()
    {
        return view('livewire.form-service-order');
    }
}