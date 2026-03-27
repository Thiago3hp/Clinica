<?php

use Thiag\ClassLuis\Dominio\Modulos\Paciente;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioPaciente;

require_once "vendor/autoload.php";

$id = 2;

$pdoPaciente = new RepositorioPaciente();
$resposta = $pdoPaciente -> recuperarPaciente($id);


var_dump($resposta);
?>