<?php

namespace Database\Seeders;

use App\Models\Servidor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create(['email' => 'admin@admin.com', 'tipo_usuario_id' => 1]);
        Servidor::factory(1)->create(['user_id' => 1]);

        User::factory(1)->create(['email' => 'servidor@servidor.com']);
        Servidor::factory(1)->create(['user_id' => 2]);

        User::factory(1)->create(['email' => 'servidor2@servidor.com']);
        Servidor::factory(1)->create(['user_id' => 3]);
    }
}
