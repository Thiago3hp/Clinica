<?php

namespace Thiag\ClassLuis\Dominio\Modulos;

use Thiag\ClassLuis\Dominio\Modulos\Medico;
use Thiag\ClassLuis\Dominio\Modulos\Paciente;
use DateTimeImmutable;

class Consulta {

    function __construct(
        private Medico $medico,
        private Paciente $paciente,
        private DateTimeImmutable $data,
        private float $valor
    ) {}

}