<?php

namespace Caio\Arquitetura\Dominio\Aluno;

use Caio\Arquitetura\Dominio\CPF;

interface RepositorioAluno
{
    public function adicionar(Aluno $aluno):void;
    public function buscarPorCpf(CPF $cpf):Aluno;
    /** @return Aluno */
    public function buscarTodos():array;
}