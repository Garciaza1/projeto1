<?php

namespace fgb\Controllers;

use fgb\Config\Mysqli;

class Main
{
    private $mysqli;
    
    public function construct()
    {
        $this->mysqli = new Mysqli();
    }

    // Validação de sessão:
    public function cria_sessao()
    {
        if (!session_start()) {
            session_start();
        }
    }

    public function salvar_usuario()
    {
        $nome = $_POST['text_name'];
        $email = $_POST['text_email'];
        $senha = $_POST['text_senha'];
        $sexo = $_POST['radio_gender'];
        $data_nasc = $_POST['text_birthdate'];
        $telefone = $_POST['text_phone'];

        $dados = [$nome, $email, $senha, $sexo, $data_nasc, $telefone];
        $conexao = $this->mysqli->conecta();
        echo "<pre>";
        print_r($dados);

        /*
        $result = mysqli_query(
        $conexao, "INSERT INTO usuario(nome,senha,sexo,telefone,email,dataNasc,criadoEm) VALUES "
        . "('$nome', '$senha', '$sexo', '$telefone', '$email', '$data_nasc', NOW())");
        */
    }



}
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar