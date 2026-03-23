<?php

use Thiag\ClassLuis\Dominio\Modulos\Medico;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioMedico;

require_once "vendor/autoload.php";

$medico = new Medico(1, "CRM/PI 12345", "Maria Silva", "Cardiologista");
$pdoMedico = new RepositorioMedico();
$resposta = $pdoMedico -> deletarMedico($medico);

var_dump($resposta);

?>