<?php

namespace App\Livewire;

use App\Models\CategoriaServico;
use App\Models\Cliente;
use App\Models\ServiceOrder;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class FormServiceOrder extends Component
{
    public $categorias;
    public $cod_service;
    public $nome;
    public $preco;
    public $categoria_id = ''; 
    public $descricao;

    public $cliente_id;
    public $clientes;
    public $pecasSelecionadas = []; 
    protected $rules = [
        'cod_service' => 'required|string|max:255',
        'descricao' => 'required|string',
        'preco' => 'required',
    ];

    protected $listeners = ['atualizarPecas','atualizarCategoria','atualizarCliente'];
    
    #[On('atualizarPecas')]
    public function atualizarPecas($pecas)
    {
        $this->pecasSelecionadas = $pecas;
    }
    
    #[On('atualizarCategoria')]    
    public function atualizarCategoria($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    #[On('atualizarCliente')]
    public function atualizarCliente($cliente_id)
    {
        $this->cliente_id = $cliente_id; 
    }

    public function submitForm()
    {
        try {
            $this->validate();
            $cliente = Cliente::where('name', 'LIKE', '%' . $this->cliente_id . '%')->first();
            $categoria = CategoriaServico::where('descricao', 'LIKE', '%' . $this->categoria_id . '%')->first();
            $preco = str_replace(',', '.', str_replace('.', '', $this->preco));

            
            $serviceOrder = ServiceOrder::create([
                'descricao' => $this->descricao,
                'preco' => $preco, 
                'status' => 'Em andamento',
                'usuario_id' => Auth::user()->id,
                'categoria_id' => $categoria->id,
                'cliente_id' => $cliente->id,
            ]);
            foreach ($this->pecasSelecionadas as $peca) {
                $serviceOrder->pecas()->attach($peca['id'], ['quantidade' => $peca['quantidade'],]);
            }
            session()->flash('message', 'Ordem de serviço criada com sucesso!');
            return redirect()->route('serviceOrder.show');
        
        } catch (Exception $e) {
            Log::info("error: " . $e->getMessage());
        }
        
    }

    public function render()
    {
        return view('livewire.form-service-order');
    }
}