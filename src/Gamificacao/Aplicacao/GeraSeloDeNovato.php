<?php

namespace Caio\Arquitetura\Gamificacao\Aplicacao;

use Caio\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Caio\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Caio\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Caio\Arquitetura\Shared\Dominio\Evento\Evento;
use Caio\Arquitetura\Shared\Dominio\Evento\OuvinteDeEvento;

class GeraSeloDeNovato extends OuvinteDeEvento
{

    public function __construct(private RepositorioDeSelo $repositorioDeSelo)
    {
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return get_class($evento) === 'Caio\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado';
    }

    public function reageAo(Evento $evento): void
    {
        $array = $evento->jsonSerialize();
        $cpf = $array['cpfAluno'];
        $selo = new Selo($cpf,'Novato');
        $this->repositorioDeSelo->adiciona($selo);
    }
}