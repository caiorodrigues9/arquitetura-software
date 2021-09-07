<?php

namespace Caio\Arquitetura\Academico\Dominio;

class CPF
{
    private string $numero;

    public function __construct(string $numero)
    {
        $this->setNumero($numero);
    }

    private function setNumero(string $numero):void
    {
        $opcao = [
            'options'=>[
                'regexp' => '/\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if(filter_var($numero,FILTER_VALIDATE_REGEXP,$opcao) === false) {
            throw new \InvalidArgumentException("CPF inválido");
        }

        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return $this->numero;
    }

}