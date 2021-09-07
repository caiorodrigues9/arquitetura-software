<?php

namespace Caio\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Caio\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Caio\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Caio\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Caio\Arquitetura\Academico\Dominio\Aluno\RepositorioAluno;
use Caio\Arquitetura\Academico\Dominio\PublicadorDeEvento;

class MatricularAluno
{
    private PublicadorDeEvento $publicador;

    public function __construct(private RepositorioAluno $repositorioAluno)
    {
        $this->publicador = new PublicadorDeEvento();
        $this->publicador->adcionarOuvinte(new LogDeAlunoMatriculado());
    }

    public function executa(MatricularAlunoDto $dados):void
    {
        $aluno = Aluno::comNomeEmailECpf($dados->nomeAluno,$dados->emailAluno,$dados->cpfAluno);

        $this->repositorioAluno->adicionar($aluno);

        $this->publicador->publicar(new AlunoMatriculado($aluno->cpf()));
    }
}