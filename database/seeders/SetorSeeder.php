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
        $arquivo_csv = database_path('seeders/Setores.csv'); // caminho do arquivo CSV
        $dados_csv = array_map(function($linha) {
            return explode('#', $linha);
        }, file($arquivo_csv)); // lê o arquivo CSV

        foreach ($dados_csv as $linha) {
            $setor = new Setor();
            $setor->nome = $linha[0];
            $setor->codigo = $linha[1];   
            $setor->save();
        }
    }
}