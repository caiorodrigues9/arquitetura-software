<?php

namespace Caio\Arquitetura\Academico\Dominio\Aluno;

use Caio\Arquitetura\Shared\Dominio\CPF;

class AlunoNaoEncontrado extends \DomainException
{
    public function __construct(CPF $cpf)
    {
        parent::__construct("Aluno com CPF $cpf não encontrado");
    }
}