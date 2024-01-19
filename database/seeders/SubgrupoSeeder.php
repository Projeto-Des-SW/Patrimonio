<?php

namespace Database\Seeders;

use App\Models\Subgrupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubgrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subgrupo::create([
            'nome' => 'nome',
            'marca' => 'marca',
            'modelo' => 'modelo',
            'classificacao_id' => 1
        ]);
    }
}
