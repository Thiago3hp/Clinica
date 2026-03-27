<?php

use Thiag\ClassLuis\Dominio\Modulos\Paciente;
use Thiag\ClassLuis\Infraestrutura\Reporsitorios\RepositorioPaciente;
use Thiag\ClassLuis\Infraestrutura\Configuracoes\Telefone;
use Thiag\ClassLuis\Infraestrutura\Configuracoes\Cpf;

require_once "vendor/autoload.php";

$telefones = [ new Telefone("86994078909")];

$paciente = new Paciente( 3, "Luzia", new Cpf("456.389.456-00"), $telefones, new DateTimeImmutable("2002-05-08"), "Rua ceara, 555 ,boa esperança, Cidade Parnaíba, Piauí");


$pdoPaciente = new RepositorioPaciente();
$resposta = $pdoPaciente -> inserirPaciente($paciente);

var_dump($resposta);


?>