<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Veiculo;
use Livewire\Component;
use Exception;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class FormUpdateVeiculo extends Component
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
    public $veiculo;

    protected $rules = [
        'marca' => 'nullable|string|max:50',
        'modelo' => 'nullable|string|max:50',
        'ano_modelo'=>'nullable|',
        'tipo'=> 'nullable|',
        'placa' => 'nullable|string|max:10|unique:veiculos,placa',
        'chassi' => 'nullable|string|max:17|unique:veiculos,chassi',
        'cor' => 'nullable|string|max:30',
        'imagem' => 'nullable|image|max:2048', 
    ];

    public function render()
    {
        
        return view('livewire.form-update-veiculo');
    }

    public function atualizarCliente($cliente_id)
    {
        $this->cliente = $cliente_id; 
    }

    public function submitForm()
    {
        $cliente = Cliente::where('name', 'like', '%' . $this->cliente . '%')->first();
     
        // $this->validate();
        try {
            $path = $this->imagem ? $this->imagem->store('veiculos', 'public') : null;

            $campos = [
                'marca' => !empty($this->marca) ? $this->marca : $this->veiculo->marca,
                'modelo' => !empty($this->modelo) ? $this->modelo : $this->veiculo->modelo,
                'ano_modelo' => !empty($this->ano_modelo) ? $this->ano_modelo : $this->veiculo->ano_modelo,
                'placa' => !empty($this->placa) ? $this->placa : $this->veiculo->placa,
                'chassi' => !empty($this->chassi) ? $this->chassi : $this->veiculo->chassi,
                'cor' => !empty($this->cor) ? $this->cor : $this->veiculo->cor,
                'tipo' => !empty($this->tipo) ? $this->tipo: $this->veiculo->tipo,
                'imagem' => !empty($this->path) ? $this->path : $path,
                'cliente_id' => $cliente->id ?? null, 
            ];

            $this->veiculo->update($campos);
            
            return redirect()->route('show.veiculos')->with('success', 'Veículo atualizado com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao atualizar veiculo: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Erro ao salvar o veículo. Tente novamente.'])->withInput();
        }
    }
}