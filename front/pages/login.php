<?php

include_once("../../back/config.php");
include_once("../../back/model/loginT.php");

if((!isset($_SESSION['email']) == true) && (!isset($_SESSION['senha']) == true))
{
    
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_id']);

} else {
    
    $logado = $_SESSION['email'];
    print_r( $logado . ' :)');
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
    <link rel="stylesheet" href="assets/arquivo.css">
    <script defer src="assets/arquivo.js"></script>

    <!-- posteriormente colocar icones na guia do site-->
    <title>Login</title>
</head>

<body data-bs-theme="dark">

    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <div class="row justify-content-center">
                        <div class="col-10">

                            <h4><strong>login</strong></h4>
                            <hr>
                            <form action="../../back/model/loginT.php" method="post">

                                <div class="mb-3">
                                    <label for="text_name" class="form-label">Email:</label>
                                    <input type="email" name="text_email" id="text_email" value="" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="text_name" class="form-label">Senha:</label>
                                    <input type="password" name="text_senha" id="text_senha" value="" class="form-control">
                                </div>

                                <div class="mb-3 text-center">

                                    <a href="../index.php" class="btn btn-secondary"><i class="fa-solid fa-xmark me-2"></i>Cancelar</a>

                                    <button type="submit" name="submit" class="btn btn-secondary"><i class="fa-regular fa-floppy-disk me-2"></i>Entrar</button>
                                    
                                    <br>

                                    <h6 class="mt-3">ainda não se cadastrou?</h6>
                                    <a href="cadastro.php" class="btn btn-secondary mt-1"><i class="fa-solid fa-xmark me-2"></i>Cadastrar-se</a>

                                </div>

                                <?php if (!empty($validation_errors)) : ?>
                                    <div class="alert alert-danger p-2">
                                        <ul>
                                            <?php foreach ($validation_errors as $error) : ?>
                                                <li><?= $error ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($server_error)) : ?>
                                    <div class="alert alert-danger p-2 text-center">
                                        <?= $server_error ?>
                                    </div>
                                <?php endif; ?>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>