<?php

namespace Caio\Arquitetura\Dominio\Indicacao;

use Caio\Arquitetura\Dominio\Aluno\Aluno;

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