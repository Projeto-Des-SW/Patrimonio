<?php

namespace Tests\Unit;
use App\Models\Sala;

use PHPUnit\Framework\TestCase;

class SalaTest extends TestCase
{
    /** @test*/
    public function checar_dados_completos_sala()
    {
        $sala = new Sala;

        $expeted = [
            'nome',
            'telefone',
            'predio_id'
        ];

        $array_compared = array_diff($expeted, $sala->getFillable());
        $this->assertEquals(0, count($array_compared));
    }
}
