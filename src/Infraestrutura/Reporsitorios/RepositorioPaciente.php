<?php

namespace Thiag\ClassLuis\Infraestrutura\Reporsitorios;

use DateTimeImmutable;
use Thiag\ClassLuis\Dominio\Modulos\Paciente;
use Thiag\ClassLuis\Infraestrutura\Configuracoes\Telefone;
use Thiag\ClassLuis\Infraestrutura\Configuracoes\Cpf;
use Thiag\ClassLuis\Dominio\Repositorio\RepositorioPacienteInterface;
use Thiag\ClassLuis\Infraestrutura\Persistencia\FabricarConexao;
use PDO;
use PDOStatement;

class RepositorioPaciente implements RepositorioPacienteInterface
{
    public PDO $conexao;

    public function __construct()
    {
        $this -> conexao = FabricarConexao::criarConexao();
    }

    public function listarPacientes(): array
    {
        $sqlQuery = "SELECT * FROM pacientes;";
        $stmt = $this ->conexao -> query($sqlQuery);

        return $this -> hidratacao($stmt);
    } 

    public function inserirPaciente(Paciente $paciente) :bool 
    {
        $inserirQuery = "INSERT INTO pacientes (nome_paciente, cpf_paciente, telefone, data_nascimento, endereco) VALUES (:nome, :cpf, :telefone, :data_nascimento, :endereco);";
        $stmt = $this -> conexao -> prepare($inserirQuery);

        $sucesso = $stmt -> execute([
        ':nome' => $paciente -> recuperarNomePaciente(),
        ':cpf' => $paciente -> recuperarCPF(),
        ':telefone' =>implode (',', $paciente -> recuperarTelefone()),
        ':data_nascimento' => $paciente -> recuperarData_nascimento()->format('Y-m-d'),
        ':endereco' => $paciente -> recuperarEndereco(),
        ]);
        $paciente ->definirIdPaciente($this ->conexao -> lastInsertId());
        return $sucesso;
    }

    public function atualizarPaciente(Paciente $paciente) : bool
    {
       $atualizarQuery = "UPDATE pacientes SET nome_paciente = :nome, cpf_paciente = :cpf, telefone = :telefone, data_nascimento = :data_nascimento, endereco = :endereco WHERE id = :id";

       $stmt = $this -> conexao -> prepare($atualizarQuery);
       $stmt -> bindValue(':nome', $paciente ->recuperarNomePaciente());
       $stmt -> bindValue(':cpf', $paciente -> recuperarCPF() -> recuperarCpf());
       $stmt -> bindValue(':telefone', implode(',', array_map(fn($tel) => $tel -> recuperarTelefone(), $paciente ->recuperarTelefone())));
       $stmt -> bindValue(':data_nascimento', $paciente -> recuperarData_nascimento()->format('Y-m-d'));
       $stmt -> bindValue(':endereco', $paciente -> recuperarEndereco());
       $stmt -> bindValue(':id', $paciente -> recuperarIdPaciente(), PDO::PARAM_INT);

       return $stmt -> execute();
    }

    public function deletarPaciente(Paciente $paciente): bool
    {
        $stmt = $this-> conexao -> prepare("DELETE FROM pacientes WHERE id=?;");
        
        $stmt -> bindValue(1, $paciente -> recuperarIdPaciente(),PDO::PARAM_INT);

        return $stmt ->execute();

    }

    public function recuperarPaciente(int $id): ?Paciente
    {
        $sqlQuery = "SELECT * FROM pacientes WHERE id =:id;";
        $stmt = $this -> conexao -> prepare($sqlQuery);

        $stmt -> bindValue(':id', $id, PDO :: PARAM_INT);
        $stmt -> execute();

        $paciente = $this->hidratacao($stmt);
         if (count($paciente) === 0) {
        return null;
        }

    return $paciente[0];
    }
  

    public function hidratacao(PDOStatement $stmt): array
    {
        $listaDadosPaciente = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $listaPaciente = [];

        foreach($listaDadosPaciente as $paciente) {

            $telefonesArray = explode(',', $paciente['telefone']);
            
            $telefones = array_map(
                fn($tel) =>new Telefone(trim($tel)),
                $telefonesArray
            );
            $listaPaciente [] = new Paciente(
                $paciente['id'],
                $paciente['nome_paciente'],
                new Cpf($paciente['cpf_paciente']),
                $telefones,
                new DateTimeImmutable($paciente['data_nascimento']),
                $paciente['endereco'],
            );
        }
        return $listaPaciente;
    }
}


?>