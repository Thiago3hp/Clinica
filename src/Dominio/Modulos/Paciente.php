<?php

namespace Thiag\ClassLuis\Dominio\Modulos;

use DateTimeImmutable;

class Paciente{
    function __construct(
        private ?int $id_paciente,
        private string $nome_paciente,
        private string $cpf_paciente,
        private array $telefone,
        private DateTimeImmutable $data_nascimento,
        private string $endereco,
    ){}              
}