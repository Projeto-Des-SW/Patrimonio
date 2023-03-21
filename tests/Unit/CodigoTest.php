<?php

namespace Tests\Unit;
use App\Models\Codigo;

use PHPUnit\Framework\TestCase;

class CodigoTest extends TestCase
{
    /** @test */
    public function checar_dados_completos_codigo()
    {
        $codigo = new Codigo;

        $expeted = [
            'codigo',
            'patrimonio_id'
        ];

        $array_compared = array_diff($expeted, $codigo->getFillable());
        $this->assertEquals(0, count($array_compared));
    }
}
