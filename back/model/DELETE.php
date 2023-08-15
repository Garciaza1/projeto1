<?php

if (!isset($_SESSION)) {
    session_start();
}

if ((!isset($_SESSION['email']) == true) && (!isset($_SESSION['senha']) == true)) {

    if (isset($_SESSION)) {

        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);
        header('Location: ../../front/pages/login.php');

    }
}

$logado = $_SESSION['email'];
$user = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];

if (!empty($user_id)) {

    $user_id;

    $sqlDelete = "DELETE FROM usuario WHERE id = '$user_id'";
    include_once('../../back/config.php');

    $result = $conexao->query($sqlDelete);

    if (isset($_SESSION)) {
    
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);

    }
    header('Location:../front/pages/cadastro.php');

}






