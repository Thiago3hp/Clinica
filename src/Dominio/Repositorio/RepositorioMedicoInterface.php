<?php

namespace Thiag\ClassLuis\Dominio\Repositorio;

use Thiag\ClassLuis\Dominio\Modulos\Medico;

interface RepositorioMedicoInterface
{
    public function listarMedicos(): array;
    public function inserirMedico(Medico $medico);
    public function deletarMedico(Medico $medico);
    public function atualizarMedico(Medico $medico);
    public function recuperarMedico(Medico $medico);

}

?>