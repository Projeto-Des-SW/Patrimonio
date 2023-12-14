<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(1)->create(['nome' => 'Administrador']);
        Role::factory(1)->create(['nome' => 'Servidor']);
        Role::factory(1)->create(['nome' => 'Diretor']);
    }
}
