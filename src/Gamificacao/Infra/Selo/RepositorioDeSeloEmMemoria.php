<?php

namespace Caio\Arquitetura\Gamificacao\Infra\Selo;


use Caio\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Caio\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Caio\Arquitetura\Shared\Dominio\CPF;

class RepositorioDeSeloEmMemoria implements RepositorioDeSelo
{
    private array $selos = [];

    public function adiciona(Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function selosDoAlunoComCpf(CPF $cpf)
    {
        return array_filter($this->selos, fn (Selo $selo) => $selo->cpfAluno() == $cpf);
    }
}