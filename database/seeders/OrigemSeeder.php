<?php

namespace Database\Seeders;

use App\Models\Origem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrigemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Origem::factory(1)->create(['nome' => 'Doação']);
        Origem::factory(1)->create(['nome' => 'Comodata']);
        Origem::factory(1)->create(['nome' => 'Pessoal']);
        Origem::factory(1)->create(['nome' => 'Licitação']);
    }
}
