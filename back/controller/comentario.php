<?php

if (!isset($_SESSION)) {
    session_start();
}

// fazer as validações 
$validation_errors = []; // Array vazio

if (isset($_SESSION['validation_errors'])) {
    $validation_errors = [$_SESSION['validation_errors']];
    unset($_SESSION['validation_errors']);
}

if (isset($_SESSION['server_error'])) {
    $server_error = [$_SESSION['server_error']];
    unset($_SESSION['server_error']);
}


//só podera enviar se ja tiver login/cadastro

// envio para o banco de dados


$id = $_SESSION['user_id'];
$comentario = $_POST['text_comentario'];
include_once('../config.php');

$result[] = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    /*$result['insert_comentario'] = mysqli_query(
        $conexao,
        "INSERT INTO comentarios(id_comentario,comentario,data_comentario) VALUES "
            . "('$id','$comentario', NOW())"
    );
    */
}else {

    $result['select_comentario'] = mysqli_query(
        $conexao,
        "SELECT * FROM comentarios WHERE id_comentario = '$id' and comentario = '$comentario'"
    );
    
    if (mysqli_num_rows($result['select_comentario']) > 0) {
            // mostra o comentario
           $comentarios = mysqli_fetch_assoc($result['select_comentario']);
           $comentarios['comentario'] = $comentario;
           return $comentario;
    } else {
        // validação de não ter comentario e simplesmente não aparecer nada
    }
    
}


