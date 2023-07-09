<?php

namespace fgb\Config;

class Mysqli
{
    function conecta(){

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPassword = "";
        $dbName = "fbg";
        
        $conexao = new mysqli($dbHost,$dbUser,$dbPassword,$dbName);
        // Verificar se a conexão foi estabelecida com sucesso
        if (!$conexao) {
            die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
            $conexao->close();
        }
        return $conexao;
    }      
}