<?php

namespace Caio\Arquitetura\Aplicacao\Aluno\MatricularAluno;

class MatricularAlunoDto
{
    public function __construct(
        public string $nomeAluno,
        public string $cpfAluno,
        public string $emailAluno
    )
    {
    }
}