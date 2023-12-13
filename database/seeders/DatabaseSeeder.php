<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CargoSeeder::class,
            UserSeeder::class,
            TipoMovimentoSeeder::class,
            PredioSeeder::class,
            SalaSeeder::class,
            OrigemSeeder::class,
            ClassificacaoSeeder::class,
            SituacaoSeeder::class,
            PatrimonioSeeder::class,
            MovimentoSeeder::class,
            MovimentoPatrimonioSeeder::class,
            SetorSeeder::class
        ]);
    }
}
