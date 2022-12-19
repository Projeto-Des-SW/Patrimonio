<?php

namespace Database\Seeders;

use App\Models\Codigo;
use App\Models\Patrimonio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatrimonioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patrimonio::factory(2)->create();
        Codigo::factory(2)->create(['patrimonio_id' => 1]);
        Codigo::factory(1)->create(['patrimonio_id' => 2]);
    }
}
