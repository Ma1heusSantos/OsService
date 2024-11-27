<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empresa_id'=> null,
            'rua'=>$this->faker->streetName(),
            'numero'=>$this->faker->randomNumber(),
            'bairro'=>$this->faker->postcode(),
            'complemento'=>null,
            'cidade'=>$this->faker->city(),
            'estado'=>$this->faker->streetAddress(),
            'cep'=>$this->faker->postcode(),
            'cliente_id'=>null,
            'mecanico_id'=>null
        ];
    }
}