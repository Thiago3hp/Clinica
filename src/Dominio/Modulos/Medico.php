<?php

namespace Thiag\ClassLuis\Dominio\Modulos;

class Medico{
    function __construct (
        private ?int $id,
        private string $crm,
        private string $nome,
        private string $especialidade,
    ) {}


    /*MUTATOS, modificadores */
    public function recuperarId(): ?int 
    {
        return $this->id;
    }

    public function definirId(int $id)
    {
        $this -> id = $id;
    } 

    public function recuperarCRM(): string
    {
        return $this->crm;
    }
    
    public function recuperarNome(): string
    {
        return strtoupper($this->nome);
    }
    
    public function recuperarEspecialidade(): string
    {
        return $this->especialidade;
    }

}