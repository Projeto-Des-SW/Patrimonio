<?php

namespace Database\Seeders;

use App\Models\Classificacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassificacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classificacao::factory(1)->create();
    }
}
