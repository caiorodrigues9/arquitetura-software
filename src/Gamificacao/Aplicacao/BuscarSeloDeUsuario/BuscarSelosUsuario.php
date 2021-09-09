<?php

namespace Caio\Arquitetura\Gamificacao\Aplicacao\BuscarSeloDeUsuario;

use Caio\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Caio\Arquitetura\Shared\Dominio\CPF;

class BuscarSelosUsuario
{
    public function __construct(private RepositorioDeSelo $repositorioDeSelo)
    {
    }

    public function execute(BuscaSelosUsuarioDto $dados)
    {
        $cpfAluno = new CPF($dados->cpf);
        $selos = $this->repositorioDeSelo->selosDoAlunoComCpf($cpfAluno);
        return $selos;
    }
}