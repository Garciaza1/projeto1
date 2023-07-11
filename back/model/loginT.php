<?php
session_start();
function login()
{

    if (isset($_POST['submit']) && !empty($_POST['text_email']) && !empty($_POST['text_senha'])) {
        // Acesso do sistema.
        include_once('../config.php');
        $email = $_POST['text_email'];
        $senha = $_POST['text_senha'];
        $dados = [$email, $senha];

        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
        // faz a consulta
        $result = $conexao->query($sql);
        // pega o id
        $id = $conexao->query("SELECT id FROM usuario WHERE email = '$email'");
        if (mysqli_num_rows($id) > 0) {
            $user = mysqli_fetch_assoc($id);
        }
        // se tiver mais de uma linha afetada ele entra. senao faz dnv
        if (mysqli_num_rows($result) < 1) {
            header('location: ../../front/pages/login.php');
            echo 'não foi encontrado perfil com esse nome ou senha';
            echo "<br>";
            echo "já tem cadastro?";
            
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['user']);
        } else {

            //incia sessão e envia ate a pagina com a sessão ativa 

            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['user'] = $user['id'];


            echo '<pre>';
            print_r($_SESSION);
            header('location: ../../front/pages/pagina2.php');
        }
    } else {

        echo "email ou senha não foram preenchidos corretamente";
        echo "<br>";
        echo "já tem cadastro?";
        //header('location: ../../front/pages/login.php');

        
    }
}
