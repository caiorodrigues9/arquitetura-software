<?php

namespace Caio\Arquitetura\Academico\Dominio\Aluno;

use Caio\Arquitetura\Shared\Dominio\CPF;
use Caio\Arquitetura\Shared\Dominio\Evento\Evento;


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

    public function jsonSerialize():array
    {
        return get_object_vars($this);
    }
}