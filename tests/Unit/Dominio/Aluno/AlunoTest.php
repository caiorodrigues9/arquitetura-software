<?php

namespace Caio\Arquitetura\Tests\Unit\Dominio\Aluno;

use Caio\Arquitetura\Dominio\Aluno\Aluno;
use Caio\Arquitetura\Dominio\Aluno\AlunoCadastrandoMaisTelefonesQuePermitido;
use Caio\Arquitetura\Dominio\CPF;
use Caio\Arquitetura\Dominio\Email;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    private Aluno $aluno;

    protected function setUp(): void
    {
        $this->aluno = new Aluno(
          self::createStub(CPF::class),
          '',
          self::createStub(Email::class)
        );
    }

    public function testAdicionarMaisDe2TelefonesDeveLancarExcecao()
    {
        self::expectException(AlunoCadastrandoMaisTelefonesQuePermitido::class);
        $this->aluno->adicionarTelefone('11','11111111');
        $this->aluno->adicionarTelefone('11','999999999');
        $this->aluno->adicionarTelefone('11','22222222');
    }

    public function testAdicionar1TelefoneDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('11','11111111');
        self::assertCount(1,$this->aluno->telefones());
    }

    public function testAdicionar2TelefoneDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('11','11111111');
        $this->aluno->adicionarTelefone('11','999999999');
        self::assertCount(2,$this->aluno->telefones());
    }
}