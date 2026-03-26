<?php

use Thiag\ClassLuis\Dominio\Modulos\Medico;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioMedico;

require_once "vendor/autoload.php";

$id =1;

$pdoMedico = new RepositorioMedico();
$resposta = $pdoMedico -> recuperarMedico($id);

var_dump($resposta);
?>