<?php

namespace Database\Seeders;

use App\Models\TipoMovimento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoMovimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoMovimento::factory(1)->create(['nome' => 'Transferência']);
        TipoMovimento::factory(1)->create(['nome' => 'Emprestimo']);
    }
}
