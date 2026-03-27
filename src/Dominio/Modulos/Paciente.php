<?php

namespace Thiag\ClassLuis\Dominio\Modulos;
use Thiag\ClassLuis\Infraestrutura\Configuracoes\Cpf;

use DateTimeImmutable;

class Paciente{
    function __construct(
        private ?int $id_paciente,
        private string $nome_paciente,
        private Cpf $cpf_paciente,
        private array $telefone,
        private DateTimeImmutable $data_nascimento,
        private string $endereco,
    ){}

    public function recuperarIdPaciente(): ?int 
    {
        return $this->id_paciente;
    }

    public function definirIdPaciente(int $id)
    {
        $this -> id_paciente = $id;
    } 

    public function recuperarNomePaciente(): string
    {
        return strtoupper ($this->nome_paciente);
    }
    
    public function recuperarCPF(): Cpf
    {
        return $this->cpf_paciente;
    }
    
    public function recuperarTelefone(): array
    {
        return $this->telefone;
    }

    public function recuperarData_nascimento(): DateTimeImmutable
    {
        return $this->data_nascimento;
    }

    public function recuperarEndereco(): string
    {
        return $this->endereco;
    }

}
