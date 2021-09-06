<?php

namespace Caio\Arquitetura\Dominio\Aluno;

use Caio\Arquitetura\Dominio\CPF;
use Caio\Arquitetura\Dominio\Evento;

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