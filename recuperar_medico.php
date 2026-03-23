<?php

use Thiag\ClassLuis\Dominio\Modulos\Medico;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioMedico;

require_once "vendor/autoload.php";

$pdoMedico = new RepositorioMedico();
$resposta = $pdoMedico -> listarMedicos();

var_dump($resposta);
?>