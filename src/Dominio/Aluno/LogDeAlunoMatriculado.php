<?php

namespace Caio\Arquitetura\Dominio\Aluno;

use Caio\Arquitetura\Dominio\Evento;
use Caio\Arquitetura\Dominio\OuvinteDeEvento;

class LogDeAlunoMatriculado extends OuvinteDeEvento
{
    /**
     * @param AlunoMatriculado $alunoMatriculado
     */
    public function reageAo(Evento $alunoMatriculado): void
    {
        fprintf(
            STDERR,
            "Aluno com CPF %s foi matriculado na data %s",
            (string) $alunoMatriculado->cpfAluno(),
            $alunoMatriculado->momento()->format('d/m/Y'),
        );
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento instanceof AlunoMatriculado;
    }
}