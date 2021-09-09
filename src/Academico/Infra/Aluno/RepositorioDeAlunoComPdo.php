<?php

namespace Caio\Arquitetura\Academico\Infra\Aluno;

use Caio\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Caio\Arquitetura\Academico\Dominio\Aluno\AlunoNaoEncontrado;
use Caio\Arquitetura\Academico\Dominio\Aluno\RepositorioAluno;
use Caio\Arquitetura\Academico\Dominio\Aluno\Telefone;
use Caio\Arquitetura\Shared\Dominio\CPF;

class RepositorioDeAlunoComPdo implements RepositorioAluno
{
    public function __construct(private \PDO $conexao)
    {
    }

    public function adicionar(Aluno $aluno): void
    {

        $sql = 'INSERT INTO alunos VALUES (:cpf,:nome,:email);';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf',$aluno->cpf());
        $stmt->bindValue('nome',$aluno->nome());
        $stmt->bindValue('email',$aluno->email());
        $stmt->execute();

        $sql = 'INSERT INTO telefones VALUES (:ddd,:numero,:cpf);';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf',$aluno->cpf());

        /** @var Telefone $telefone */
        foreach ($aluno->telefones() as $telefone) {

            $stmt->bindValue('ddd',$telefone->ddd());
            $stmt->bindValue('numero',$telefone->numero());
            $stmt->execute();
        }
    }

    public function buscarPorCpf(CPF $cpf): Aluno
    {
        $sql = '
            SELECT cpf, nome, email, ddd, numero as numero_telefone
                FROM alunos
            LEFT JOIN telefones ON telefones.cpf_aluno = alunos.cpf
                WHERE alunos.cpf = ?
        ';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf',(string) $cpf);
        $stmt->execute();

        $dadosAluno = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(count($dadosAluno) === 0){
            throw new AlunoNaoEncontrado($cpf);
        }
        return $this->mapearAluno($dadosAluno);

    }

    public function buscarTodos(): array
    {
        $sql = '
            SELECT cpf, nome, email, ddd, numero as numero_telefone
                FROM alunos
            LEFT JOIN telefones ON telefones.cpf_aluno = alunos.cpf';
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $listaDadosAlunos = $stmt->fetch(\PDO::FETCH_ASSOC);
        $alunos = [];

        foreach ($listaDadosAlunos as $dadosAluno) {
            if(array_key_exists($dadosAluno['cpf'], $alunos)){
                $alunos[$dadosAluno['cpf']] = Aluno::comNomeEmailECpf(
                  $dadosAluno['cpf'],
                  $dadosAluno['nome'],
                  $dadosAluno['email']
                );
            }
            $telefone = array_filter($dadosAluno, fn ($linha) => $dadosAluno['ddd'] !== null && $dadosAluno['numero_telefone'] !== null);
            if($telefone){
                $alunos[$dadosAluno['cpf']]->adicionarTelefone($telefone['ddd'],$telefone['numero_telefone']);
            }
        }
        return array_values($alunos);
    }

    private function mapearAluno(array $dadosAluno):Aluno
    {
        $primeiraLinha = $dadosAluno[0];
        $aluno = Aluno::comNomeEmailECpf($primeiraLinha['cpf'],$primeiraLinha['nome'],$primeiraLinha['email']);
        $telefones = array_filter($dadosAluno, fn ($linha) => $linha['ddd'] !== null && $linha['numero_telefone'] !== null);
        foreach ($telefones as $telefone){
            $aluno->adicionarTelefone($telefone['ddd'],$telefone['numero']);
        }
        return $aluno;
    }
}