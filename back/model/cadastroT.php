<?php


if (isset($_SESSION['server_error'])) {
    $server_error = [$_SESSION['server_error']];
    unset($_SESSION['server_error']);
}

$nome = $_POST['text_name'];
$email = $_POST['text_email'];
$senha = $_POST['text_senha'];
$sexo = $_POST['radio_gender'];
$data_nasc = $_POST['text_birthdate'];
$telefone = $_POST['text_phone'];
//$varD = var_dump(preg_match("/^[1]{2}/^[9]{1}\d{9}/", $telefone) == true); validação
include_once('../config.php');
$dados = [$nome, $email, $senha, $sexo, $data_nasc, $telefone];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $result = mysqli_query(
        $conexao,
        "INSERT INTO usuario(nome,senha,sexo,telefone,email,dataNasc,criadoEm) VALUES "
        . "('$nome', '$senha', '$sexo', '$telefone', '$email', '$data_nasc', NOW())"
    );
    header('Location:../../front/pages/login.php');

}else {
    [$_SESSION['server_error']] = "não foi possível realizar co cadastro";
    unset($_SESSION['server_error']);
}
