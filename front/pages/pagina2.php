<?php
session_start();

include_once("../../back/config.php");
print_r($_SESSION);

if ((!isset($_SESSION['email']) == true) && (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['user']);
    header('Location: login.php');
}

$logado = $_SESSION['email'];

$sql = "SELECT * FROM usuario ORDER BY id DESC";

$result = $conexao->query($sql);

print_r($result);



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
    <link rel="stylesheet" href="assets/arquivo.css">
    <script defer src="assets/arquivo.js"></script>

    <!-- posteriormente colocar icones na guia do site-->
    <title>pagina 2</title>

</head>

<body data-bs-theme="dark">
    <hr>
    <br>
    <a href="../index.php">
        pagina principal
    </a>

</body>

</html>