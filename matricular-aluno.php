<?php

use Caio\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Caio\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Caio\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Caio\Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunosEmMemoria;
use Caio\Arquitetura\Gamificacao\Aplicacao\GeraSeloDeNovato;
use Caio\Arquitetura\Gamificacao\Infra\Selo\RepositorioDeSeloEmMemoria;
use Caio\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;

require "vendor/autoload.php";

$nome = $argv[1];
$cpf = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$dados = new MatricularAlunoDto($nome,$cpf,$email);


$publicador = new PublicadorDeEvento();
$publicador->adcionarOuvinte(new LogDeAlunoMatriculado());
$publicador->adcionarOuvinte(new GeraSeloDeNovato(new RepositorioDeSeloEmMemoria()));

$repositorio = new RepositorioDeAlunosEmMemoria();
$matricular = new MatricularAluno($repositorio,$publicador);
$matricular->executa($dados);
