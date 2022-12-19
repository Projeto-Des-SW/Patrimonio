<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patrimonio>
 */
class PatrimonioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->streetName,
            'tipo' => 'Patrimônio',
            'descricao' => $this->faker->sentence,
            'servidor_id' => 2,
            'classificacao_id' => 1,
            'origem_id' => 1,
            'sala_id' => 1
        ];
    }
}
