<?php

namespace Caio\Arquitetura\Aplicacao\Indicacao;

use Caio\Arquitetura\Dominio\Aluno\Aluno;

interface EnviaEmailIndicacao
{
    public function enviaPara(Aluno $indicado): void;
}