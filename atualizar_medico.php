<?php

use Thiag\ClassLuis\Dominio\Modulos\Medico;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioMedico;

require_once "vendor/autoload.php";

$medico = new Medico(2, "CRM/PI 3536 ", "Sara Beatrriz", "Dentista" );

$pdoMedico = new RepositorioMedico();
$resposta = $pdoMedico -> atualizarMedico($medico);

var_dump($resposta);

?>