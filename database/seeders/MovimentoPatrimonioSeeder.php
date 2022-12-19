<?php

namespace Database\Seeders;

use App\Models\MovimentoPatrimonio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovimentoPatrimonioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovimentoPatrimonio::factory(1)->create();
        MovimentoPatrimonio::factory(2)->create(['patrimonio_id' => 2]);
    }
}
