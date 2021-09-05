<?php

namespace Caio\Arquitetura\Tests\Unit;

use Caio\Arquitetura\Dominio\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailInvalido()
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage("Endereço de e-amil inválido");
        $email = new Email("caiorodrigues9gmail.com");
    }

    public function testEmailValidoPodeSerRepresentadoComoString()
    {
        $email = new Email("caiorodrigues9@gmail.com");
        self::assertSame("caiorodrigues9@gmail.com",(string) $email);
    }
}