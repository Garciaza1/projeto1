<?php


if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['server_error'])) {
    $server_error = [$_SESSION['server_error']];
    unset($_SESSION['server_error']);
}

if (isset($_SESSION['validation_errors'])) {
    $validation_errors = [$_SESSION['validation_errors']];
    unset($_SESSION['validation_errors']);
}

// varios metodos dentro dessa pagina um para cada post mais facil de organizar o codigo


// nome
if (isset($_POST['update_name'])) {

    include_once("../config.php");
    $user_id = $_SESSION['user_id'];
    
    if (empty($_POST['text_mudar_nome'])) {
        $validation_errors [] = "o nome precisa ser preenchido";
        header('Location:../../pages/perfil.php');

    }else{
        
        $nome = $_POST['text_mudar_nome'];
        //$nome = mysqli_real_escape_string($conexao, $nome);
        
        
        $sqlUpdate = "UPDATE usuario SET nome = '$nome' , atualizadoEm = NOW() WHERE id = '$user_id'";
        $result = $conexao->query($sqlUpdate);
        $_SESSION['validation_errors'] = "Sucesso na mudança!";
        header('Location:../../pages/perfil.php');
    }
    }
// email
if (isset($_POST['update_email'])) {
    include_once("../config.php");
    $user_id = $_SESSION['user_id'];
    $email_antigo = $_POST['text_email_antigo'];
    $email_antigo = mysqli_real_escape_string($conexao, $email_antigo);

    $email_novo = $_POST['text_email_novo'];
    $email_novo = mysqli_real_escape_string($conexao, $email_novo);

    if (empty($_POST['text_email_novo']) || empty($_POST['text_email_antigo'])) {

        $_SESSION['validation_errors'] = "Por favor preencha os campos email-novo e email-antigo";
        header('Location:../../pages/perfil.php');
    } else {

        //validar os emails
        if ($email_novo == $email_antigo) {

            $_SESSION['validation_errors'] = "Os Emails são iguais!";
            header('Location:../../pages/perfil.php');
        }

        $sqlSelect = "SELECT email FROM usuario WHERE email = '$email_antigo' and id = '$user_id'";
        $result = $conexao->query($sqlSelect);
        if ($result->num_rows > 0) {

            $sqlUpdate = "UPDATE usuario SET email = '$email_novo' , atualizadoEm = NOW() WHERE id = '$user_id'";
            $result = $conexao->query($sqlUpdate);
            $_SESSION['validation_errors'] = "Sucesso na mudança!";
            header('Location:../../pages/perfil.php');
        } else {
            $_SESSION['validation_errors'] = "o email antigo não existe!";
            header('Location:../../pages/perfil.php');
        }
    }
}
// senha
if (isset($_POST['update_senha'])) {
    include_once("../config.php");
    $user_id = $_SESSION['user_id'];
    $senha_atual = $_POST['text_senha_atual'];
    $senha_atual = mysqli_real_escape_string($conexao, $senha_atual);

    $senha_nova = $_POST['text_senha_nova'];
    $senha_nova = mysqli_real_escape_string($conexao, $senha_nova);

    if (empty($_POST['text_senha_atual'] || $_POST['text_senha_nova'])) {

        $_SESSION['validation_errors'] = "Por favor preencha os campos senha nova e senha atual";
    } else {

        if ($senha_nova == $senha_antiga) {

            $_SESSION['validation_errors'] = "As senhas são iguais!";
            header('Location:../../pages/perfil.php');
        }

        $sqlSelect = "SELECT senha FROM usuario WHERE senha = '$senha_atual' and id = '$user_id'";
        $result = $conexao->query($sqlSelect);
        if ($result->num_rows > 0) {

            $sqlUpdate = "UPDATE usuario SET senha = '$senha_nova' , atualizadoEm = NOW() WHERE id = '$user_id'";
            $result = $conexao->query($sqlUpdate);
            $_SESSION['validation_errors'] = "Sucesso na mudança!";
            header('Location:../../pages/perfil.php');
        } else {
            $_SESSION['validation_errors'] = "A senha antiga não existe!";
            header('Location:../../pages/perfil.php');
        }
    }
}
// data
if (isset($_POST['update_data'])) {
    include_once("../config.php");
    $user_id = $_SESSION['user_id'];
    if (empty($_POST['mudar_data'])) {
        $_SESSION['validation_errors'] = "a data precisa ser preenchida";
    }
    $data_nasc = $_POST['mudar_data'];
    $sqlUpdate = "UPDATE usuario SET dataNasc = '$data_nasc' , atualizadoEm = NOW() WHERE id = '$user_id'";
    $result = $conexao->query($sqlUpdate);
    $_SESSION['validation_errors'] = "Sucesso na mudança!";
    header('Location:../../pages/perfil.php');
}
// telefone
if (isset($_POST['update_telefone'])) {
    include_once("../config.php");
    $user_id = $_SESSION['user_id'];
    if (empty($_POST['text_mudar_telefone'])) {
        $_SESSION['validation_errors'] = "o telefone precisa ser preenchido";
    }
    $telefone = $_POST['text_mudar_telefone'];
    // validação pregmatch
    if (preg_match('/^(\d{2})(\d{5})(\d{4})$/', $telefone, $matches)) {
        $telefone_formatado = "({$matches[1]}) {$matches[2]}-{$matches[3]}";
        echo $telefone_formatado;
    }

    $telefone_formatado = mysqli_real_escape_string($conexao, $telefone_formatado);

    $sqlUpdate = "UPDATE usuario SET telefone = '$telefone_formatado' , atualizadoEm = NOW() WHERE id = '$user_id'";
    $result = $conexao->query($sqlUpdate);
    $_SESSION['validation_errors'] = "Sucesso na mudança!";
    header('Location:../../pages/perfil.php');
}
// sexo
if (isset($_POST['update_genero'])) {
    include_once("../config.php");
    $user_id = $_SESSION['user_id'];

    if (empty($_POST['radio_gender'])) {
        $_SESSION['validation_errors'] = "o genero precisa ser preenchido";
    }

    $sexo = $_POST['radio_gender'];

    $sqlUpdate = "UPDATE usuario SET sexo = '$sexo' , atualizadoEm = NOW() WHERE id = '$user_id'";
    $result = $conexao->query($sqlUpdate);
    $_SESSION['validation_errors'] = "Sucesso na mudança!";
    header('Location:../pages/perfil.php');
}
