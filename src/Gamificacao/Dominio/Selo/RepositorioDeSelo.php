<?php

namespace Caio\Arquitetura\Gamificacao\Dominio\Selo;

use Caio\Arquitetura\Shared\Dominio\CPF;

interface RepositorioDeSelo
{
    public function adiciona(Selo $selo):void;
    public function selosDoAlunoComCpf(CPF $cpf);
}