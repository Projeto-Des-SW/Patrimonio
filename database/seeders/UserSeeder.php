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
        User::factory()->create(['email' => 'admin@admin.com'])->tipo_usuarios()->sync(1);
        Servidor::factory(1)->create(['user_id' => 1]);

        User::factory()->create(['email' => 'servidor@servidor.com'])->tipo_usuarios()->sync(2);
        Servidor::factory(1)->create(['user_id' => 2]);

        User::factory()->create(['email' => 'servidor2@servidor.com'])->tipo_usuarios()->sync(2);
        Servidor::factory(1)->create(['user_id' => 3]);
    }
}
