<?php

namespace Database\Seeders;

use App\Models\Setor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setor::factory(2)->create();
        Setor::factory(1)->create(['setor_pai_id' => 1]);
    }
}
