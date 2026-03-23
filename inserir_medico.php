<?php

use Thiag\ClassLuis\Dominio\Modulos\Medico;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioMedico;

require_once "vendor/autoload.php";

$medico = new Medico(4 ,"CRM/PI 4050","Iuri", "Otorrino");

$pdoMedico = new RepositorioMedico();
$resposta = $pdoMedico -> inserirMedico($medico);


var_dump($resposta);