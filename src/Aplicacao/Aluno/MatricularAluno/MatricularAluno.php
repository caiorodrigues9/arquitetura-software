<?php

namespace Caio\Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Caio\Arquitetura\Dominio\Aluno\Aluno;
use Caio\Arquitetura\Dominio\Aluno\RepositorioAluno;

class MatricularAluno
{
    public function __construct(private RepositorioAluno $repositorioAluno)
    {
    }

    public function executa(MatricularAlunoDto $dados):void
    {
        $aluno = Aluno::comNomeEmailECpf($dados->nomeAluno,$dados->emailAluno,$dados->cpfAluno);

        $this->repositorioAluno->adicionar($aluno);
        
    }
}