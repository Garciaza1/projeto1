<?php

if (!isset($_SESSION)) {
    session_start();
}

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
// validar cada um dos texts

// validação pregmatch

if (preg_match('/^(\d{2})(\d{5})(\d{4})$/', $telefone, $matches)) {
    $telefone_formatado = "({$matches[1]}) {$matches[2]}-{$matches[3]}";
    echo $telefone_formatado;
}


include_once('../config.php');
$dados = [$nome, $email, $senha, $sexo, $data_nasc, $telefone_formatado];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $result = mysqli_query(
        $conexao,
        "INSERT INTO usuario(nome,senha,sexo,telefone,email,dataNasc,criadoEm) VALUES "
        . "('$nome', '$senha', '$sexo', '$telefone_formatado', '$email', '$data_nasc', NOW())"
    );
    header('Location:../../front/pages/login.php');

    

}else {
    $_SESSION['server_error'] = "não foi possível realizar o cadastro";
    header('Location:../../front/pages/cadastro.php');
}
