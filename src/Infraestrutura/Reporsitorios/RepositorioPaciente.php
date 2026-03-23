<?php

namespace Thiag\ClassLuis\Infraestrutura\Reporsitorios;

use DateTimeImmutable;
use Thiag\ClassLuis\Dominio\Modulos\Paciente;
use Thiag\ClassLuis\Infraestrutura\Configuracoes\Telefone;
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

    public function listarPaciente(): array
    {
        $sqlQuery = "SELECT * FROM pacientes;";
        $stmt = $this ->conexao -> query($sqlQuery);

        return $this -> hidratacao($stmt);
    } 

    public function hidratacao(PDOStatement $stmt): array
    {
        $listaDadosPaciente = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $listaPaciente = [];

        foreach($listaDadosPaciente as $paciente) {
            $listaPaciente [] = new Paciente(
                $paciente['id_paciente'],
                $paciente['nome_paciente'],
                $paciente['cpf_paciente'],
                new Telefone($paciente['telefone']),
                $paciente[DateTimeImmutable('data_nascimento')],
                $paciente['endereco'],
            );
        }
        return $listaPaciente;
    }
}


?>