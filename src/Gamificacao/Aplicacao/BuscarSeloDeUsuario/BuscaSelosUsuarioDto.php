<?php

namespace Caio\Arquitetura\Gamificacao\Aplicacao\BuscarSeloDeUsuario;

class BuscaSelosUsuarioDto
{
    public function __construct(public string $cpf)
    {
    }
}