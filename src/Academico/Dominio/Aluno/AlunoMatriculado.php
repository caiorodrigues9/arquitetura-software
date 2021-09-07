<?php

namespace Caio\Arquitetura\Academico\Dominio\Aluno;

use Caio\Arquitetura\Academico\Dominio\CPF;
use Caio\Arquitetura\Academico\Dominio\Evento;

class AlunoMatriculado implements Evento
{
    private \DateTimeImmutable $momento;

    public function __construct(private CPF $cpfAluno)
    {
        $this->momento = new \DateTimeImmutable();
    }

    public function cpfAluno(): CPF
    {
        return $this->cpfAluno;
    }

    public function momento(): \DateTimeImmutable
    {
        return $this->momento;
    }
}