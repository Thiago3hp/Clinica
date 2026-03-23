<?php

$caminhoBanco = __DIR__ . "/.banco.sqlite";
$pdo = new PDO("sqlite:$caminhoBanco");

$pdo -> exec("
    CREATE TABLE paciente(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome_paciente TEXT,
        cpf_paciente TEXT,
        telefone ARRAY,
        data_nascimento TEXT,
        endereco TEXT,
    );
");

?>