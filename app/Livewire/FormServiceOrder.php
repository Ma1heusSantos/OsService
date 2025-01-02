<?php

namespace App\Livewire;

use App\Models\CategoriaServico;
use App\Models\Cliente;
use App\Models\Mecanico;
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
    public $categoria = ''; 
    public $descricao;
    public $mecanicos;
    public $mecanico_id; 
    public $cliente;
    public $servicos = [];
    public $clientes;
    public $pecasSelecionadas = []; 
    protected $rules = [
        'mecanico_id' => 'required',
        'cliente' => 'required',
        'categoria' => 'required',
    ];
    
    protected $messages = [
        'cliente_id.required' => 'O campo cliente é obrigatório.',
        'mecanico_id.required' => 'O campo mecânico é obrigatório.',
        'categoria_id.required' => 'O campo categoria é obrigatório.',
    ];

    protected $listeners = ['atualizarPecas','atualizarCategoria','atualizarCliente','atualizarServico'];
    
    #[On('atualizarPecas')]
    public function atualizarPecas($pecas)
    {
        $this->pecasSelecionadas = $pecas;
    }
    
    #[On('atualizarCategoria')]    
    public function atualizarCategoria($categoria_id)
    {
        $this->categoria = $categoria_id;
    }

    #[On('atualizarServico')]    
    public function atualizarServico($servico)
    {
        $this->servicos = $servico;
    }

    #[On('AdicionarNoValor')]    
    public function AdicionarNoValor($valor)
    {
        $this->preco += $valor;
    }

    #[On('diminuirNoValor')]    
    public function dimunuirNoValor($valor)
    {
        if ($this->preco === 0) {
            $this->preco = 0;
        }else{
            $this->preco -= $valor;
        }
        
    }

    #[On('removerValorItem')]    
    public function removerValorItem($valor)
    {
        if ($this->preco === 0) {
            $this->preco = 0;
        }else{
            $this->preco -= $valor;
        }
    }

    #[On('atualizarCliente')]
    public function atualizarCliente($cliente_id)
    {
        $this->cliente = $cliente_id; 
    }

    public function submitForm()
    {
        try {
            $this->validate();
            $cliente = Cliente::where('name', 'LIKE', '%' . $this->cliente . '%')->first();
            $categoria = CategoriaServico::where('descricao', 'LIKE', '%' . $this->categoria . '%')->first();
            $preco = str_replace(',', '.', str_replace('.', '', $this->preco));
            
            
            $serviceOrder = ServiceOrder::create([
                'descricao' => $this->descricao,
                'preco' => $preco, 
                'status' => 'Em andamento',
                'usuario_id' => Auth::user()->id,
                'categoria_id' => $categoria->id,
                'mecanico_id'=> $this->mecanico_id,
                'cliente_id' => $cliente->id
            ]);
            foreach ($this->pecasSelecionadas as $peca) {
                $serviceOrder->pecas()->attach($peca['id'], ['quantidade' => $peca['quantidade'],]);
            }
            foreach ($this->servicos as $servico) {
                $serviceOrder->servicos()->attach($servico['id'], ['quantidade' => $servico['quantidade'],'preco' => $servico['valor'],]);
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

    public function mount()
{
    $this->mecanicos = Mecanico::all();
    $this->clientes = Cliente::all();
    $this->categorias = CategoriaServico::all();
}

}