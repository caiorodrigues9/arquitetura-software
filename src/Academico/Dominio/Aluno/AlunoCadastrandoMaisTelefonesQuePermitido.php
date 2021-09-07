<?php

namespace Caio\Arquitetura\Academico\Dominio\Aluno;

use Throwable;

class AlunoCadastrandoMaisTelefonesQuePermitido extends \DomainException
{
    public function __construct()
    {
        parent::__construct('Aluno já possui 2 telefones cadastrados');
    }

}