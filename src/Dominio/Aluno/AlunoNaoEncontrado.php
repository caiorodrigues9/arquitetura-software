<?php

namespace Caio\Arquitetura\Dominio\Aluno;

use Caio\Arquitetura\Dominio\CPF;

class AlunoNaoEncontrado extends \DomainException
{
    public function __construct(CPF $cpf)
    {
        parent::__construct("Aluno com CPF $cpf não encontrado");
    }
}