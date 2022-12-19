<?php

namespace Database\Seeders;

use App\Models\Servidor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServidorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servidor::factory(1)->create(['user_id' => 1]);
        Servidor::factory(1)->create(['user_id' => 2]);
    }
}
