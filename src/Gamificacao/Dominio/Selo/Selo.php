<?php

namespace Caio\Arquitetura\Gamificacao\Dominio\Selo;

use Caio\Arquitetura\Shared\Dominio\CPF;

class Selo
{
    public function __construct(
        private CPF $cpfAluno,
        private string $nome
    )
    {
    }

    public function cpfAluno(): CPF
    {
        return $this->cpfAluno;
    }

    public function __toString(): string
    {
        return $this->nome;
    }
}