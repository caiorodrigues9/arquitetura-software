<?php

use Caio\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Caio\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Caio\Arquitetura\Infra\Aluno\RepositorioDeAlunosEmMemoria;

require "vendor/autoload.php";

$nome = $argv[1];
$cpf = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$dados = new MatricularAlunoDto($nome,$cpf,$email);

$repositorio = new RepositorioDeAlunosEmMemoria();
$matricular = new MatricularAluno($repositorio);
$matricular->executa($dados);
