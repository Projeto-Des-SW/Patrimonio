<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Patrimonio;

class PatrimonioTest extends TestCase
{
     /** @test */
    public function checar_dados_completos_patrimonio()
    {
        $patrimonio = new Patrimonio;

        $expeted = [
            'nome', 
            'tipo', 
            'nota_fiscal', 
            'aprovado', 
            'descricao', 
            'servidor_id', 
            'classificacao_id', 
            'origem_id', 
            'sala_id', 
            'situacao_id'
        ];

        $array_compared = array_diff($expeted, $patrimonio->getFillable());
        $this->assertEquals(0, count($array_compared));
    }
}
