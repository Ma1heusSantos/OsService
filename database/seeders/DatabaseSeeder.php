<?php

namespace Database\Seeders;

use App\Models\CategoriaPeca;
use App\Models\CategoriaServico;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Endereco;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $empresa = Empresa::factory()->create([
            'razao_social' => 'Geniusis',
            'cnpj' => '000000000/00',
        ]);
        
        User::factory()->create([
            'name' => 'Matheus',
            'email' => 'matheuscontato96@hotmail.com',
            'password' => Hash::make('1234'),
            'empresa_id' => $empresa->id,
            'role' => 'User'
        ]);
        

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'geniusissuporte1@gmail.com',
            'password' => Hash::make('1234'),
            'empresa_id' => $empresa->id,
            'role' => 'Admin'
        ]);

        CategoriaPeca::factory()->create([
            'descricao'=> 'mecanica'
        ]);

        CategoriaServico::factory([
            'descricao'=> 'eletricista'
        ]);

        $cliente = Cliente::factory()->create([
            'name' => 'Matheus Santos',
            'cpf' => '12345678910',
            'cnpj' =>'19979567000180',
            'telefone' =>'33912452345',
            'email' => 'matheus@hotmail.com',
            'celular'=>'33912452345',
            'razao_social'=>'qualquerum',
            'ie' => '12345678',
            'empresa_id'=> $empresa->id
        ]);

        Endereco::create([
            'enderecavel_id' => $cliente->id, 
            'enderecavel_type' => Cliente::class, 
            'rua' => 'rua dos bobos',
            'numero' => 0,
            'bairro' => 'qualquer',
            'complemento' => 'complemento',
            'cidade' => 'de papel',
            'estado' => 'de espirito',
            'cep' => 0,
        ]);
        
        
        

        
    }
}