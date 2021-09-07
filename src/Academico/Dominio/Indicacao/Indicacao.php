<?php

namespace Caio\Arquitetura\Academico\Dominio\Indicacao;

use Caio\Arquitetura\Academico\Dominio\Aluno\Aluno;

class Indicacao
{
    private \DateTimeImmutable $data;

    public function __construct(
        private Aluno $indicante,
        private Aluno $indicado
    )
    {
        $this->data = \DateTimeImmutable();
    }


}