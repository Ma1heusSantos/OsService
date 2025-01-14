<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class veiculosController extends Controller
{
    public function show(){
        $veiculos = Veiculo::with('cliente');
        return view('veiculos.show',['veiculos'=>$veiculos]);
    }
    public function create(){
        return view('veiculos.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'marca' => 'required|string|max:50',
                'modelo' => 'required|string|max:50',
                'ano_modelo' => 'required',
                'placa' => 'required|string|max:10|unique:veiculos,placa',
                'chassi' => 'required|string|max:17|unique:veiculos,chassi',
                'cor' => 'required|string|max:30',
                'tipo' => 'required',
            ]);
    
        
            $veiculo = Veiculo::create([
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'ano_modelo' => $request->ano_modelo,
                'placa' => $request->placa,
                'chassi' => $request->chassi,
                'cor' => $request->cor,
                'tipo' => $request->tipo,
                'cliente_id' => 1,
            ]);

            if ($request->hasFile('imagem')) {
                $imagePath = $request->file('imagem')->store('uploads/veiculos', 'public');
                $veiculo['imagem'] = $imagePath;
            }
            
    
         
            return redirect()->route('show.veiculos')->with('success', 'Veículo criado com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao criar veiculo: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Erro ao salvar o veículo. Tente novamente.'])->withInput();
        }
    }
    public function delete($id)
    {
        try{
            $veiculo = Veiculo::find($id);
            if (!$veiculo) {
                return redirect()->back()->withErrors('Veiculo não encontrado.')->withInput();
            }else{
                $veiculo->delete();
                return redirect()->route('show.veiculos');
            }
        }catch(Exception $e){
            Log::info($e->getMessage());
        }
    }
    public function saveVeiculos(){}
    public function update($id)
    {
        $veiculo = Veiculo::with('cliente')->find($id);
        return view('veiculos.update',['veiculo'=> $veiculo]);
    }
}