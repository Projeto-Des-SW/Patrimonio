<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classificacao>
 */
class ClassificacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => 'APARELHOS DE MEDIÇÃO E ORIENTAÇÃO',
            'codigo' => Str::random(10),
            'residual' => 10,
            'vida_util' => 180
        ];
    }
}
