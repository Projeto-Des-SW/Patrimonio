<?php

namespace Database\Seeders;

use App\Models\Situacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Situacao::factory(1)->create(['nome' => 'Servível']);
        Situacao::factory(1)->create(['nome' => 'Inservível']);
        Situacao::factory(1)->create(['nome' => 'Alienado']);

    }
}
