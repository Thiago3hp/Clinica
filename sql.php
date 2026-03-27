<?php

$caminhoBanco = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$caminhoBanco");

$pdo->exec("
CREATE TABLE medicos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        crm TEXT,
        nome TEXT,
        especialidade TEXT
    );
    CREATE TABLE pacientes(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome_paciente VARCHAR(160) NOT NULL,
        cpf_paciente VACHAR(11) NOT NULL UNIQUE,
        telefone VARCHAR(11) NULL,
        data_nascimento TIMESTAMP,
        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        endereco TEXT
    );
");

?>