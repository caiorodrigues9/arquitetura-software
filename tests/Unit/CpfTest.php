<?php

namespace Caio\Arquitetura\Tests\Unit;

use Caio\Arquitetura\Dominio\CPF;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfInvalido()
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage("CPF inválido");
        new CPF("61866082043");
    }

    public function testCpfValidoPodeSerRepresentadoComoString()
    {
        $cpf = new CPF("618.660.820-43");
        self::assertSame("618.660.820-43", (string)$cpf);
    }
}