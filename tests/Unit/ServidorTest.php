<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Servidor;

class ServidorTest extends TestCase
{
    /** @test */
    public function checar_dados_completos_servidor()
    {
        $servidor = new Servidor;

        $expeted = [
            'cpf',
            'matricula',
            'user_id',
            'cargo_id'
        ];

        $array_compared = array_diff($expeted, $servidor->getFillable());
        $this->assertEquals(0, count($array_compared));
    }
}
