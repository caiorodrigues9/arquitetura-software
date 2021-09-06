<?php

namespace Caio\Arquitetura\Dominio\Aluno;

use Caio\Arquitetura\Dominio\CPF;
use Caio\Arquitetura\Dominio\Email;

class Aluno
{

    private array $telefones;

    public static function comNomeEmailECpf(string $nome,string $email, string $cpf)
    {
        return new Aluno(new CPF($cpf),$nome,new Email($email));
    }
    
    public function __construct(private CPF $cpf,private string $nome,private Email $email)
    {
        $this->telefones = [];
    }

    public function adicionarTelefone(string $ddd,string$numero ):self
    {
        if(count($this->telefones()) === 2){
            throw new AlunoCadastrandoMaisTelefonesQuePermitido();
        }
        $this->telefones[] = new Telefone($ddd,$numero);
        return $this;
    }

    public function cpf(): string
    {
        return $this->cpf;
    }

    public function nome():string
    {
        return $this->nome;
    }

    public function email()
    {
        return $this->email;
    }

    public function telefones():array
    {
        return $this->telefones;
    }
}