<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Empresa;
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
        

        
    }
}