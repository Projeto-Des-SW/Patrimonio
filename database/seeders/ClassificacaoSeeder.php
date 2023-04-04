<?php

namespace Database\Seeders;

use App\Models\Classificacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassificacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classificacao::factory(1)->create();
        Classificacao::factory(1)->create([
            'nome' => 'APARELHOS E EQUIPAMENTOS DE COMUNICAÇÃO',
            'residual' => 20,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAM/ UTENSÍLIOS MEDICOS, ODONTO, LAB E HOSP',
            'residual' => 20,
            'vida_util' => 180
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'APARELHO E EQUIPAMENTO P/ ESPORTES E DIVERSOES',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTO DE PROTEÇÃO, SEGURANÇA, E SOCORRO',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS E EQUIPAMENTOS INDUSTRIAIS',
            'residual' => 10,
            'vida_util' => 240
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS E EQUIPAMENTOS ENERGÉTICOS',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS E EQUIPAMENTOS GRÁFICOS',
            'residual' => 10,
            'vida_util' => 180
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS FERRAMENTAS E UTENSÍLIOS DE OFICINA',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS DE MONTARIA',
            'residual' => 10,
            'vida_util' => 60
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTO E MATERIAIS SIGILOSOS E RESERVADOS',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS PEÇAS E ACESSÓRIOS P/ AUTOMÓVEIS',
            'residual' => 10,
            'vida_util' => 60
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS PEÇAS E ACESSÓRIOS MARÍTIMOS',
            'residual' => 10,
            'vida_util' => 180
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS PEÇAS E ACESSÓRIOS AERONAUTICOS',
            'residual' => 10,
            'vida_util' => 360
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS PEÇAS E ACESSÓRIOS PROTEÇÃO AO VOO',
            'residual' => 10,
            'vida_util' => 360
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS DE MERGULHO E SALVAMENTO',
            'residual' => 10,
            'vida_util' => 180
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS DE MÁQUINAS E MOTORES NAVIOS ESQUADRA',
            'residual' => 0,
            'vida_util' => 0
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS DE MANOBRA E PATRILHAMENTO',
            'residual' => 10,
            'vida_util' => 180
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS DE PROTEÇÃO E VIGILÂNCIA AMBIENTAL',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS E ITENSÍLIOS AGROPECUÁRIOS/RODOVIÁRIO',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS HIDŔAULICOS E ELÉTRICOS',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS E EQUIPAMENTOS - CONSTRUÇÃO CIVIL',
            'residual' => 10,
            'vida_util' => 240
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS E EQUIPAMENTOS ELETRO -ELETRONICOS',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS UTENSÍLIOS E EQUIPAMENTOS DIVERSOS',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'OUTRAS MÁQUINAS, EQUIPAMENTOS E FERRAMENTAS',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS DE PROCESSAMENTOS DE DADOS',
            'residual' => 10,
            'vida_util' => 60
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'APARELHOS E UTENSÍLIOS DOMÉSTICOS',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS E UTENSÍLIOS DE ESCRITORIO',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MOBILIÁRIO EM GERAL',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'UNTESÍLIOS EM GERAL',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'COLEÇÕES E MATERIAIS BIBLIOGRÁFICOS',
            'residual' => 0,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'DISCOTECAS E FILMOTECAS',
            'residual' => 10,
            'vida_util' => 60
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'INSTRUMENTOS MUSICAIS E ARTÍSTICOS',
            'residual' => 10,
            'vida_util' => 240
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EQUIPAMENTOS PARA ÁUDIO VÍDEO E FOTO',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'OBRAS DE ARTE E PEÇAS PARA EXPOSIÇÃO',
            'residual' => 0,
            'vida_util' => 0
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'MÁQUINAS E EQUIPAMENTOS PARA FINS DIDÁTICOS',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'OUTROS MATERIAIS CULTURAIS, EDUCAÇÃO E DE COMUNIDADE',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'VEÍCULOS EM GERAL',
            'residual' => 10,
            'vida_util' => 180
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'VEÍCULOS FERROVIÁRIOS',
            'residual' => 10,
            'vida_util' => 360
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'VEÍCULOS DE TRAÇÃO MECÂNICA',
            'residual' => 10,
            'vida_util' => 180
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'CARROS DE COMBATE',
            'residual' => 10,
            'vida_util' => 360
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'ERONAVES',
            'residual' => 0,
            'vida_util' => 0
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'EMBARCAÇÕES',
            'residual' => 0,
            'vida_util' => 0
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'ARMAMENTOS',
            'residual' => 15,
            'vida_util' => 240
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'SEMOVENTES E EQUIPAMENTOS DE MONTARIA',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'ARMAZÉNS ESTRUTURAIS - COBERTURAS DE LONA',
            'residual' => 10,
            'vida_util' => 120
        ]);

        Classificacao::factory(1)->create([
            'nome' => 'PEÇAS NÃO INCORPORÁVEIS A IMÓVEIS',
            'residual' => 10,
            'vida_util' => 120
        ]);
    }
}
