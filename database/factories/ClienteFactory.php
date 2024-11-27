<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'cpf' => $this->faker->numerify(), 
            'cnpj' => $this->faker->numerify(), 
            'telefone' => $this->faker->numerify(),
            'email' => $this->faker->email(), 
            'celular' => $this->faker->numerify(), 
            'razao_social' => $this->faker->company(), 
            'ie' => $this->faker->numerify(), 
            'empresa_id' => null,
        ];
    }
}