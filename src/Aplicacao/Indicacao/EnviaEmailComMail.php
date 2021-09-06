<?php

namespace Caio\Arquitetura\Aplicacao\Indicacao;

use Caio\Arquitetura\Dominio\Aluno\Aluno;

class EnviaEmailComMail implements EnviaEmailIndicacao
{

    public function enviaPara(Aluno $indicado): void
    {
        mail($indicado->email(),'Indicação','Olá você foi indicado para acessar a nossa plataforma');
    }
}