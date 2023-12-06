<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimento>
 */
class MovimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'servidor_destino_id' => 2,
            'servidor_origem_id' => 1,
            'tipo_movimento_id' => 1,
            'data_movimento' => now()
        ];
    }
}
