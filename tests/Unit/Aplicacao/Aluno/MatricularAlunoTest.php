<?php

namespace Caio\Arquitetura\Tests\Unit\Aplicacao\Aluno;

use Caio\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Caio\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Caio\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Caio\Arquitetura\Shared\Dominio\CPF;
use Caio\Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunosEmMemoria as RepositorioDeAlunosEmMemoriaAlias;
use Caio\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $publicador = new PublicadorDeEvento();
        $publicador->adcionarOuvinte(new LogDeAlunoMatriculado());
        $repositorioAluno = new RepositorioDeAlunosEmMemoriaAlias();
        $dadosAluno = new MatricularAlunoDto('Teste','123.456.789-12','email@email.com');
        $useCase = new MatricularAluno($repositorioAluno,$publicador);
        $useCase->executa($dadosAluno);
        $aluno = $repositorioAluno->buscarPorCpf(new CPF('123.456.789-12'));
        self::assertSame('Teste',(string) $aluno->nome());
        self::assertSame('email@email.com',(string) $aluno->email());
        self::assertEmpty($aluno->telefones());
    }
}