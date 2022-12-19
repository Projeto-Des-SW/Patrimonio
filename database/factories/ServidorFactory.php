<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servidor>
 */
class ServidorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cpf' => (random_int(000, 999) . '.' . random_int(000,999) . '.' . random_int(000, 999) . '-' . random_int(00, 99)),
            'matricula' => \Illuminate\Support\Str::random(9),
            'cargo_id' => 1,
        ];
    }
}
