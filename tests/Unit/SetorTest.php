<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Setor;

class SetorTest extends TestCase
{
     /** @test */
    public function checar_dados_completos_setor()
    {
        $setor = new Setor;

        $expeted = [
            'nome', 
            'codigo', 
            'setor_pai_id', 
            'setor_folha'
        ];

        $array_compared = array_diff($expeted, $setor->getFillable());
        $this->assertEquals(0, count($array_compared));
    }
}
