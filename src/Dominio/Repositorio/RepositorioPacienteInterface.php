<?php

namespace Thiag\ClassLuis\Dominio\Repositorio;

use Thiag\ClassLuis\Dominio\Modulos\Paciente;

interface RepositorioPacienteInterface 
{
    public function listarPaciente(): array;
    public function inserirPaciente(Paciente $paciente);
    public function atualizarPaciente(Paciente $paciente);
    public function deletarPaciente(Paciente $paciente);
    public function recuperarPaciente(int $id): ?Paciente;
}

?>