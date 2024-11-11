<?php 

namespace App\Livewire;

use App\Models\Servicos;
use Livewire\Component;

class BuscarServico extends Component
{
    public $servicos = [];
    public $search = "";

    public function mount() 
    {
        $this->servicos = Servicos::all(); 
    }

    public function render()
    {
        $this->servicos = Servicos::where('descricao', 'LIKE', '%' . $this->search . '%')
            ->orWhere('codigo', 'LIKE', '%' . $this->search . '%')
            ->get(); 

        return view('livewire.buscar-servico', ['servicos' => $this->servicos]);
    }
}

?>