<?php


use Thiag\ClassLuis\Dominio\Modulos\Consulta;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioPaciente;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioMedico;
use Thiag\ClassLuis\Infraestrutura\Configuracao\Cpf;
use Thiag\ClassLuis\Infraestrutura\Configuracao\Telefone;

require_once "vendor/autoload.php";

$pdoPaciente = new RepositorioPaciente();
$pdoMedico = new RepositorioMedico();

$consultas = [
    new Consulta($pdoMedico -> recuperarMedico(2),$pdoPaciente -> recuperarPaciente(1), new DateTimeImmutable('2023-10-15'), 400.00),
    // new Consulta($pdoMedico -> recuperarMedico(3), $pdoPaciente -> recuperarPaciente(2), new DateTimeImmutable('2023-10-16'), 350.00),
    // new Consulta($pdoMedico -> recuperarMedico(4), $pdoPaciente -> recuperarPaciente(4), new DateTimeImmutable('2023-10-17'), 400.00),
];

var_dump($consultas);

?>