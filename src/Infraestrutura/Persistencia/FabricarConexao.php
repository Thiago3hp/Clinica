<?php
namespace Thiag\ClassLuis\Infraestrutura\Persistencia;

use PDO;

class FabricarConexao{
    public static function criarConexao()
    {
        $caminhoBanco = __DIR__ . "/../../../banco.sqlite";
        return new PDO("sqlite: $caminhoBanco");
    }
}

?>