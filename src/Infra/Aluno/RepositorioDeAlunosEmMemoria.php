<?php

namespace Caio\Arquitetura\Infra\Aluno;

use Caio\Arquitetura\Dominio\Aluno\Aluno;
use Caio\Arquitetura\Dominio\Aluno\AlunoEmDuplicidade;
use Caio\Arquitetura\Dominio\Aluno\AlunoNaoEncontrado;
use Caio\Arquitetura\Dominio\Aluno\RepositorioAluno;
use Caio\Arquitetura\Dominio\CPF;

class RepositorioDeAlunosEmMemoria implements RepositorioAluno
{
    private array $alunos = [];

    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(CPF $cpf): Aluno
    {
        $alunosFiltrados = array_filter($this->alunos, fn (Aluno $aluno) => $aluno->cpf() == $cpf);
        if(count($alunosFiltrados) === 0){
            throw new AlunoNaoEncontrado($cpf);
        }

        if(count($alunosFiltrados) > 1) {
            throw new AlunoEmDuplicidade($cpf);
        }

        return $alunosFiltrados[0];

    }

    public function buscarTodos(): array
    {
        return $this->alunos;
    }
}