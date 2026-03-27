<?php

namespace Thiag\ClassLuis\Infraestrutura\Configuracoes;

use Exception;
class Cpf {
    public function __construct(private string $cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $this->cpf = preg_replace
        (
        '/(\d{3})(\d{3})(\d{3})(\d{2})/',
        '$1.$2.$3-$4',
        $cpf
        );
    }
    public function recuperarCpf(): string
    {
        return $this->cpf;
    }

    public function __toString(): string
    {
        return $this->cpf;
    }
}
?>