<?php

namespace Caio\Arquitetura\Academico\Dominio\Aluno;

class Telefone
{
    private string $ddd;
    private string $telefone;

    /**
     * @param string $ddd
     * @param string $telefone
     */
    public function __construct(string $ddd, string $telefone)
    {
        $this->setDdd($ddd);
        $this->setTelefone($telefone);
    }

    private function setDdd(string $ddd)
    {
        if(preg_match('/\d{2}/',$ddd) !== 1){
            throw new \InvalidArgumentException("DDD inválido");
        }
        $this->ddd = $ddd;
    }

    private function setTelefone(string $telefone)
    {
        if(preg_match('/^\d{8}(?:\d{1})?$/',$telefone) !== 1){
            throw new \InvalidArgumentException("Telefone inválido");
        }

        $this->telefone = $telefone;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->telefone}";
    }

    public function ddd() :string
    {
        return $this->ddd;
    }

    public function numero():string
    {
        return $this->numero();
    }
}