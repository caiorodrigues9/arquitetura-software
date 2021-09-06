<?php

namespace Caio\Arquitetura\Tests\Unit\Aplicacao\Aluno;

use Caio\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Caio\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Caio\Arquitetura\Dominio\CPF;
use Caio\Arquitetura\Infra\Aluno\RepositorioDeAlunosEmMemoria as RepositorioDeAlunosEmMemoriaAlias;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $repositorioAluno = new RepositorioDeAlunosEmMemoriaAlias();
        $dadosAluno = new MatricularAlunoDto('Teste','123.456.789-12','email@email.com');
        $useCase = new MatricularAluno($repositorioAluno);
        $useCase->executa($dadosAluno);
        $aluno = $repositorioAluno->buscarPorCpf(new CPF('123.456.789-12'));
        self::assertSame('Teste',(string) $aluno->nome());
        self::assertSame('email@email.com',(string) $aluno->email());
        self::assertEmpty($aluno->telefones());
    }
}