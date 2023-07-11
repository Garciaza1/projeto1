<?php

$nome = $_POST['text_name'];
$email = $_POST['text_email'];
$senha = $_POST['text_senha'];
$sexo = $_POST['radio_gender'];
$data_nasc = $_POST['text_birthdate'];
$telefone = $_POST['text_phone'];
//$varD = var_dump(preg_match("/^[1]{2}/^[9]{1}\d{9}/", $telefone));
include_once('../config.php');
$dados = [$nome, $email, $senha, $sexo, $data_nasc, $telefone];

echo "<pre>";
print_r($dados);

$result = mysqli_query(
    $conexao,
    "INSERT INTO usuario(nome,senha,sexo,telefone,email,dataNasc,criadoEm) VALUES "
        . "('$nome', '$senha', '$sexo', '$telefone', '$email', '$data_nasc', NOW())"
);
