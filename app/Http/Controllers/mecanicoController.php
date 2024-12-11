<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Mecanico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class mecanicoController extends Controller
{
    public function create(){
        return view('mecanicos.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'nullable|unique:mecanicos,cpf', 
        'telefone' => 'nullable|string',
        'especialidade' => 'nullable|string|max:255',
        'data_nascimento' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
        'rua' => 'required|string|max:255',
        'numero' => 'required|integer',
        'bairro' => 'required|string|max:255',
        'complemento' => 'nullable|string|max:255',
        'cidade' => 'required|string|max:255',
        'estado' => 'required|string|max:12',
        'cep' => 'required|max:9'
    ]);

    try {
    
        $mecanico = Mecanico::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'especialidade' => $request->especialidade,
            'status' => true,
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
            'empresa_id' => Auth::user()->empresa_id
        ]);

        $mecanico->endereco()->create([
            'empresa_id' => Auth::user()->empresa_id,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'complemento' => $request->complemento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
        ]);

     
        return redirect()->route('show.mecanicos')->with('success', 'Mecânico criado com sucesso!');
    } catch (Exception $e) {
        Log::error('Erro ao criar mecânico: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Erro ao salvar o mecânico. Tente novamente.'])->withInput();
    }
}

    public function update($id){
        $mecanico = Mecanico::with('endereco')->find($id);
        return view('mecanicos.update',['mecanico'=> $mecanico]);
    }
    public function saveMecanico(Request $request,$id){
        $mecanico = Mecanico::find($id);

        if (!$mecanico) {
            return redirect()->back()->withErrors('Mecânico não encontrado.')->withInput();
        }

        try{
            Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'cpf' => 'nullable|unique:cliente,cpf|required_without:cnpj', 
                'telefone' => 'nullable|string|required_without:celular', 
                'especialidade' => 'nullable|string|max:255',
                'data_nascimento' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
                'rua' => 'required|string|max:255',
                'numero' => 'required|integer',
                'bairro' => 'required|string|max:255',
                'complemento' => 'nullable|string|max:255',
                'cidade' => 'required|string|max:255',
                'estado' => 'required|string|max:12',
                'cep' => 'required|max:9' 
            ])->validate();
            
            $campos = [
                'name' => !empty($request->nome) ? $request->nome : $mecanico->nome,
                'cpf' => !empty($request->cpf) ? $request->cpf : $mecanico->cpf,
                'telefone' => $request->telefone ? $request->telefone : $mecanico->telefone,
                'especialidade' => $request->especialidade ? $request->especialidade : $mecanico->especialidade,
                'data_nascimento'=> $request->data_nascimento ? $request->data_nascimento : $mecanico->data_nascimento,
            ];
            $camposEndereco = [
                'rua' => !empty($request->rua) ? $request->rua : $mecanico->rua,
                'numero' => !empty($request->numero) ? $request->numero : $mecanico->numero,
                'bairro' => !empty($request->bairro) ? $request->bairro : $mecanico->bairro,
                'complemento' => !empty($request->complemento) ? $request->complemento : $mecanico->complemento,
                'cidade' => !empty($request->cidade) ? $request->cidade : $mecanico->cidade,
                'estado' => !empty($request->estado) ? $request->estado : $mecanico->estado,
                'cep' => !empty($request->cep) ? $request->cep : $mecanico->cep, 
            ];

            $mecanico->update($campos);
            $mecanico->endereco()->update($camposEndereco);

            return redirect()->route('reveal.client',$mecanico->id)->with('success', 'Usuário criado com sucesso!');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function delete($id){
        try{
            $mecanico = Mecanico::find($id);
            if (!$mecanico) {
                return redirect()->back()->withErrors('Mecânico não encontrado.')->withInput();
            }else{
                $mecanico->status = false;
                $mecanico->save();
                return redirect()->route('show.mecanicos');
            }
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
    }
    public function show(){
        $mecanicos = Mecanico::where('status', '=', true)->get();
        return view('mecanicos.show',['mecanicos'=>$mecanicos]);
    }

    public function revealMecanico($id){
        $mecanico = Mecanico::find($id);
        return view('mecanicos.revealMecanico',['mecanico'=>$mecanico]);
    }

}