<?php

@include_once("../config.php");

if (!isset($_SESSION)) {
    session_start();
}

//validação de erros
$validation_errors = []; // Array vazio

if (isset($_SESSION['validation_errors'])) {
    $validation_errors = [$_SESSION['validation_errors']];
    unset($_SESSION['validation_errors']);
}

if (isset($_SESSION['server_error'])) {
    $server_error = [$_SESSION['server_error']];
    unset($_SESSION['server_error']);
}

global $result;

$id_comentario = $_SESSION['user_id'];

// Consulta para obter o nome do usuário e o comentário com o mesmo ID
// filtra apenas os comentarios do perfil. colocar um filtro no front

if (isset($_SESSION['email']) == true) {


    $result['select_comentario_pessoal'] = mysqli_query(
        $conexao,
        "SELECT u.nome, c.comentario " .
            "FROM comentarios c INNER JOIN " .
            "usuario u ON c.id_comentario = u.id WHERE " .
            "c.id_comentario = $id_comentario;"
    );
    


    $result['select_todos_comentarios'] = mysqli_query(
        $conexao,
        "SELECT u.nome, c.comentario, c.id, c.id_comentario " .
            "FROM comentarios c INNER JOIN " .
            "usuario u ON c.id_comentario = u.id " .
            "ORDER BY c.id;"
    );


    if ($result['select_todos_comentarios'] == null) {
        header('Location: ../../pages/pagina2.php');
        $_SESSION['validation_errors'] = "Não há comentarios ainda.";
    }

} elseif (!isset($_SESSION['email']) == true) {

    $result['select_todos_comentarios'] = mysqli_query(
        $conexao,
        "SELECT u.nome, c.comentario, c.id, c.id_comentario " .
            "FROM comentarios c INNER JOIN " .
            "usuario u ON c.id_comentario = u.id " .
            "ORDER BY c.id;"
    );

    if ($result['select_todos_comentarios'] == null) {
        header('Location: ../../pages/pagina2.php');
        $_SESSION['validation_errors'] = "Não há comentarios ainda.";
    }

}


// inicio do request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //só podera enviar se ja tiver login/cadastro
    //validação
    if (isset($_SESSION['user_id']) == true) {


        // envio para o banco de dados
        $id = $_SESSION['user_id'];
        $comentario = $_POST['text_comentario'];
        include_once('../config.php');

        // validar inserção

        $result['insert_comentario'] = mysqli_query(
            $conexao,
            "INSERT INTO comentarios(id_comentario,comentario,data_comentario) VALUES "
                . "('$id','$comentario', NOW())"
        );
        header('Location:../../pages/pagina2.php');
    } else {

        header('Location:../../pages/pagina2.php');
        $_SESSION['validation_errors'] = "faça um login para comentar";
    }
}






// tem que estar dentro do html
/*
if (mysqli_num_rows($result['select_comentario_pessoal']) > 0) {
    // Loop para exibir os resultados usando foreach
    foreach ($result['select_comentario_pessoal'] as $comentarios) {
        $autor = $comentarios['nome'];
        $comentario = $comentarios['comentario'];
    }
} else {


    $result['select_todos_comentarios'] = mysqli_query(
        $conexao,
        "SELECT u.nome, c.comentario " .
            "FROM comentarios c INNER JOIN " .
            "usuario u ON c.id_comentario;"
    );

    if (mysqli_num_rows($result['select_todos_comentarios']) > 0) {
        // Loop para exibir os resultados usando foreach
        foreach ($result['select_todos_comentarios'] as $comentarios) {
            $autor = $comentarios['nome'];
            $comentario = $comentarios['comentario'];
        }
    }
}
*/

/*
if (mysqli_num_rows($result['select_todos_comentarios']) > 0) {
    // Loop para exibir os resultados usando foreach
    foreach ($result['select_todos_comentarios'] as $comentarios) {
        $autor = $comentarios['nome'];
        $comentario = $comentarios['comentario'];
    }
}
*/
/*

    $result['select_comentario'] = mysqli_query(
        $conexao,
        "SELECT * FROM comentarios WHERE id_comentario = '$id' and comentario = '$comentario ORDER BY'"
    );
    
    if (mysqli_num_rows($result['select_comentario']) > 0) {
        
            // mostra o comentario
           $comentarios = mysqli_fetch_assoc($result['select_comentario']);
           $comentarios['comentario'] = $comentario;// ja determinou uma variavel que vai conter apenas os comentarios sem o autor
           $autor = $comentario['']
           return $comentario;
    } else {
        // validação de não ter comentario e simplesmente não aparecer nada
    }
    */
