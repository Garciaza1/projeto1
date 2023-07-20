<?php

include_once("../../back/config.php");

if (!isset($_SESSION)) {
    session_start();
}

if ((!isset($_SESSION['email']) == true) && (!isset($_SESSION['senha']) == true)) {
    //print_r($_SESSION);

    if (isset($_SESSION)) {

        unset($_SESSION['email']);
        unset($_SESSION['senha']);
    }

    //header('Location: pages/login.php');
} else {

    $logado = $_SESSION['email'];
    
    //print_r( $logado . ' :)');
    
    ////////////////////////////////////////////

    //$sql = "SELECT nome FROM usuario WHERE email = '$_SESSION['email']' ";
    
    //$result = $conexao->query($sql);
    

    echo $_SESSION['user_name'];
    
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- links dos arquivos assets -->
    <link rel="stylesheet" href="../assets/arquivo.css">
    <script defer src="../assets/arquivo.js"></script>

    <!-- posteriormente colocar icones na guia do site-->
    <title>pagina 2</title>

</head>

<body data-bs-theme="dark">

<header>

        <div class="logo d-flex">
            <img height="60px" src="../assets/imagens/logo1.png" alt="logo">
            <H1>PROJETO</H1>
        </div>

        <?php if (isset($logado)) : ?>
            <div class="">
                <?= $logado . ' está logado :)' ?>
            </div>
        <?php endif; ?>

        <div class="menu-header justfy-content-between text-center">
        <?php if (!isset($logado)) : ?>
            <div>
                <a class="btn btn-info " href="cadastro.php">Cadastrar</a>
                <a class="btn btn-info " href="login.php">Login</a>
            </div>
        <?php endif; ?>    
            <a class="btn btn-info " href="../index.php">HOME</a>
        </div>
        <div class="d-flex">
            <?php if (isset($_SESSION['email']) == true) : ?>
                <a href="../../back/model/sair.php" class="btn btn-danger me-5 ">
                    Sair
                </a>
            <?php endif; ?>
        </div>
    </header>



    <hr>
    <footer class="footer p-3 text-center">
        &copy; Todos os direitos reservados. | &reg;since 2023
    </footer>

</body>

</html>