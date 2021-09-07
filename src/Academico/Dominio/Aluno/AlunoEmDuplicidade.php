<?php

namespace Caio\Arquitetura\Academico\Dominio\Aluno;

use Caio\Arquitetura\Academico\Dominio\CPF;

class AlunoEmDuplicidade extends \DomainException
{
    public function __construct(CPF $cpf)
    {
        parent::__construct("Aluno com CPF $cpf em duplicidade em nosso banco de dados, favor contactar os administradores do sistema!!!");
    }
}