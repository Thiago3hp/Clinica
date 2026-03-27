<?php

use Thiag\ClassLuis\Dominio\Modulos\Paciente;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioPaciente;
use Thiag\ClassLuis\Infraestrutura\Configuracoes\Telefone;  
use Thiag\ClassLuis\Infraestrutura\Configuracoes\Cpf;

require_once "vendor/autoload.php";

$paciente = new Paciente(3, "Marcelo", new Cpf("376.389.456-00"), [new Telefone("86940687999")], new DateTimeImmutable("2004-06-16"), "Rua ceara, 356 ,boa esperança, Cidade Parnaíba, Piauí");

$pdoPaciente = new RepositorioPaciente();
$resposta = $pdoPaciente -> deletarPaciente($paciente);

var_dump($resposta);    

?>