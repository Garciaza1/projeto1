<?php

if (!isset($_SESSION)) {
    session_start();
}

$validation_errors = []; // Array vazio

if (isset($_SESSION['validation_errors'])) {
    $validation_errors =[ $_SESSION['validation_errors']];
    unset($_SESSION['validation_errors']);
}

if (isset($_SESSION['server_error'])) {
    $server_error =[ $_SESSION['server_error']];
    unset($_SESSION['server_error']);
}

if (isset($_POST['submit']) && !empty($_POST['text_email']) && !empty($_POST['text_senha'])) {
    // Acesso do sistema.
    include_once('../config.php');
    $email = $_POST['text_email'];
    $senha = $_POST['text_senha'];
    $dados = [$email, $senha];

    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

    // faz a consulta
    $result = $conexao->query($sql);

    if(mysqli_num_rows($result) < 1){
        // Não encontrou perfil com o nome ou senha fornecidos
        $_SESSION['validation_errors'] = "Não foi encontrado perfil com esse nome ou senha.";
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('location: ../../front/pages/login.php');

    } else {
        // Inicia a sessão e redireciona para a página 2
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        
        if(isset($_SESSION['email']) == true && isset($_SESSION['senha']) == true){
            header('Location: ../../front/index.php');
            
            
        }else{
            //erro de servidor 
            $_SESSION['server_error'] = "erro no servidor alguma coisa na sessão deu errado!!";
        }
        
    }
} else {
    // Validação de erros
        $_SESSION['validation_errors'] = "Email ou senha não foram preenchidos. <br> Já tem cadastro?";

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function login1()
{

    include_once("../functions/functions.php");

    if (!check_session()) {
        session_start();
        return;
    }


    if (isset($_POST['submit']) && !empty($_POST['text_email']) && !empty($_POST['text_senha'])) {
        // Acesso do sistema.
        include_once('../config.php');
        $email = $_POST['text_email'];
        $senha = $_POST['text_senha'];
        $dados = [$email, $senha];

        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

        // faz a consulta
        $result = $conexao->query($sql);

        // se tiver mais de uma linha afetada ele entra. senao faz dnv
        if (mysqli_num_rows($result) < 1) {  // o erro esta por aquii ou na chamad ada função!!!!!!!!!! NA VARIAVEL SESSION VALIDATION ERRORS NÃO DEFINIDA CORRENTAMENTE.
            $_SESSION['validation_errors'] = "não foi encontrado perfil com esse nome ou senha.";
            header('location: ../../front/pages/login.php');
            
            die("parou aqui");
            unset($_SESSION['email']);
            unset($_SESSION['senha']);

        } else {
            
            //incia sessão e envia ate a pagina com a sessão ativa 
            
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;

            echo '<pre>';
            print_r($_SESSION);
            header('location: ../../front/pages/pagina2.php');
        }
    } else {
        // validação de erros posterior
        $_SESSION['validation_errors'] = "email ou senha não foram preenchidos corretamente." . "<br><br>" . "já tem cadastro?";

        //header('location: ../../front/pages/login.php');


    }
}
