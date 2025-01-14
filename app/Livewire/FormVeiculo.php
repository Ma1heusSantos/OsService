<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\Veiculo;
use Illuminate\Support\Facades\Log;
use Exception;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class FormVeiculo extends Component
{
    use WithFileUploads;
    public $marca;
    public $modelo;
    public $ano_modelo;
    public $placa;
    public $chassi;
    public $cor;
    public $tipo;
    public $imagem; 
    public $cliente;

    protected $rules = [
        'marca' => 'required|string|max:50',
        'modelo' => 'required|string|max:50',
        'ano_modelo' => 'required',
        'placa' => 'required|string|max:10|unique:veiculos,placa',
        'chassi' => 'required|string|max:17|unique:veiculos,chassi',
        'cor' => 'required|string|max:30',
        'tipo' => 'required',
        'imagem' => 'nullable|image|max:2048', 
    ];
    

    public function render()
    {
        return view('livewire.form-veiculo');
    }

    #[On('atualizarCliente')]
    public function atualizarCliente($cliente_id)
    {
        $this->cliente = $cliente_id; 
    }

    public function submitForm()
    {
        $cliente = Cliente::where('name', 'like', '%' . $this->cliente . '%')->first();
        $this->validate();
        try {
            $path = $this->imagem ? $this->imagem->store('veiculos', 'public') : null;

            $veiculo = Veiculo::create([
                'marca' => $this->marca,
                'modelo' => $this->modelo,
                'ano_modelo' => $this->ano_modelo,
                'placa' => $this->placa,
                'chassi' => $this->chassi,
                'cor' => $this->cor,
                'tipo' => $this->tipo,
                'imagem' => $path,
                'cliente_id' => $cliente->id ?? null, 
            ]);
            
            return redirect()->route('show.veiculos')->with('success', 'Veículo criado com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao criar veiculo: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Erro ao salvar o veículo. Tente novamente.'])->withInput();
        }
    }
}