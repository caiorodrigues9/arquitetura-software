<?php

namespace Caio\Arquitetura\Tests\Unit\Dominio\Aluno;

use Caio\Arquitetura\Dominio\Aluno\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function testDddInvalidoTelefoneValido()
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage("DDD inválido");
        new Telefone("1","12345678");
    }

    public function testTelefoneInvalidoDddValido()
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage("Telefone inválido");
        new Telefone("11","1234567");
    }

    public function testTelefoneCom8DigitosPodeSerRepresentadoComoStringComDdd()
    {
        $telefone = new Telefone("11","12345678");
        self::assertSame("(11) 12345678",(string) $telefone);
    }

    public function testTelefoneCom9DigitosPodeSerRepresentadoComoStringComDdd()
    {
        $telefone = new Telefone("11","123456789");
        self::assertSame("(11) 123456789",(string) $telefone);
    }
}