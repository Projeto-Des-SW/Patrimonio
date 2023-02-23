<?php

namespace Tests\Unit;
use App\Models\User;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function checar_dados_completos_user()
    {
        $user = new User;

        $expeted = [
            'name',
            'email',
            'password',
            'tipo_usuario_id'
        ];

        $array_compared = array_diff($expeted, $user->getFillable());
        $this->assertEquals(0, count($array_compared));
    }
}
