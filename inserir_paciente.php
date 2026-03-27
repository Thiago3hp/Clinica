<?php

use Thiag\ClassLuis\Dominio\Modulos\Paciente;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioPaciente;

require_once "vendor/autoload.php";

$paciente = new Paciente( null, "Thiago", "123.456.789-00", ["11987654321"],new DateTimeImmutable("1990-01-01"), "Rua Exemplo, 123");

$pdoPaciente = new RepositorioPaciente();
$resposta = $pdoPaciente -> inserirPaciente($paciente);

var_dump($resposta);


?>