<?php

if (!isset($_SESSION)) {
    session_start();
}

// erros de validação
$validation_errors = []; // Array vazio

if (isset($_SESSION['validation_errors'])) {
    $validation_errors = [$_SESSION['validation_errors']];
    unset($_SESSION['validation_errors']);
}

if (isset($_SESSION['server_error'])) {
    $server_error = [$_SESSION['server_error']];
    unset($_SESSION['server_error']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submit']) && !empty($_POST['text_email']) && !empty($_POST['text_senha'])) {



        // Acesso do sistema.
        include_once('../config.php');
        $email = $_POST['text_email'];
        $senha = $_POST['text_senha'];
        $dados = [$email, $senha];

        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

        // faz a consulta
        $result = $conexao->query($sql);

        if (mysqli_num_rows($result) < 1) {
            // Não encontrou perfil com o nome ou senha fornecidos
            $_SESSION['validation_errors'] = "Não foi encontrado perfil com esse nome ou senha.";
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('location: ../../front/pages/login.php');
        } else {
            // Inicia a sessão e redireciona para a página 2
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            //pegando da tabela
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];

            if (isset($_SESSION['email']) == true && isset($_SESSION['senha']) == true) {
                header('Location: ../../front/index.php');
            } else {
                //erro de servidor 
                $_SESSION['server_error'] = "erro no servidor alguma coisa na sessão deu errado!!";
            }
        }
    } else {

        // Validação de erros

        if (isset($_POST['submit']) && empty($_POST['text_email'])) {

            header('Location: ../../front/pages/login.php');
            $_SESSION['validation_errors'] = "O campo email é obrigatório <br> Já tem cadastro?";
            
        } elseif (isset($_POST['submit']) && empty($_POST['text_senha'])) {

            header('Location: ../../front/pages/login.php');
            $_SESSION['validation_errors'] = "O campo senha é obrigatório <br> Já tem cadastro?";

        }
    
        //if (isset($_POST['submit'])) $_SESSION['validation_errors'] = "Email ou senha não foram preenchidos. ";
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////