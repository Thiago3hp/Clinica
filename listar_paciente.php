<?php

use Thiag\ClassLuis\Dominio\Modulos\Paciente;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioPaciente;

require_once "vendor/autoload.php";

$pdoPaciente = new RepositorioPaciente();
$resposta = $pdoPaciente -> listarPacientes();

var_dump($resposta);
?>