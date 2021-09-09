<?php

namespace Caio\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Caio\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Caio\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Caio\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Caio\Arquitetura\Academico\Dominio\Aluno\RepositorioAluno;
use Caio\Arquitetura\Gamificacao\Aplicacao\GeraSeloDeNovato;
use Caio\Arquitetura\Gamificacao\Infra\Selo\RepositorioDeSeloEmMemoria;
use Caio\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;


class MatricularAluno
{


    public function __construct(private RepositorioAluno $repositorioAluno, private PublicadorDeEvento $publicador)
    {

    }

    public function executa(MatricularAlunoDto $dados):void
    {
        $aluno = Aluno::comNomeEmailECpf($dados->nomeAluno,$dados->emailAluno,$dados->cpfAluno);

        $this->repositorioAluno->adicionar($aluno);

        $this->publicador->publicar(new AlunoMatriculado($aluno->cpf()));
    }
}