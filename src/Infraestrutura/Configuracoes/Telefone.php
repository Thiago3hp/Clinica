<?php

namespace Thiag\ClassLuis\Infraestrutura\Configuracoes;

use Exception;

class Telefone{

    public function __construct(private string $numero)
    {
        $digitos = preg_replace('/\D/', '', $numero);
        if (strlen($digitos) !== 11) {
            throw new Exception ("Formato de telefone inválido");
        }
        $this->numero = $digitos;
    }    

     public function recuperarTelefone(): string
    {
        return $this->numero;
    }

    public function __toString(): string
    {
        return $this->numero;
    }
}
?>