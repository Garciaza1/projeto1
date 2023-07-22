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
        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);
    }

    //header('Location: pages/login.php');
} else {

    $logado = $_SESSION['email'];
    $user = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];
    $perfil = [
        $user_id => " id: " . $user_id,
        $user => "nome: " . $user,
        $logado => "email: " . $logado,
    ];
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
    <!--   JQuery   -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- links dos arquivos assets -->
    <link rel="stylesheet" href="../assets/arquivo.css">
    <script defer src="../assets/arquivo.js"></script>

    <!-- posteriormente colocar icones na guia do site-->
    <title>pagina 2</title>

</head>

<body data-bs-theme="dark">

    <!---------- inicio do header -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <header class="container-fluid pt-3">

        <div class="logo d-flex">
            <img height="60px" src="../assets/imagens/logo1.png" alt="logo">
            <h2>FGB bate papos</H2>
        </div>

        <?php if (isset($logado)) : ?>
            <div class="bg-light-subtle border border-secundary-subtle rounded-3 p-2">
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
            <a class="btn btn-info " href="../index.php">Home</a>
        </div>

        <?php if (isset($logado)) : ?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img height="30px" src="../assets/imagens/peril-2.png" alt="perfil">
                    <i class="fa-regular fa-user me-2"></i><?= $user ?>
                </button>
                <ul class="dropdown-menu">
                    <?php foreach ($perfil as $dados) : ?>
                        <?php print_r("<li class=\"dropdown-item\"> <a class=\"text-white-50\" href=\"perfil.php\">" .  $dados . "</li></a> <hr class=\"dropdown-divider\">")  ?>
                    <?php endforeach; ?>
                    <li> <a class="dropdown-item" href="../../back/model/sair.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Sair</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </header>
    <hr>
    <main>


        <section class="comentario mt-5 d-flex justify-content-center">
            <div class="jumbotron jumbotron-fluid bg-info text-white">
                <div class="container align-items-start">
                    <p class="display-4">Comentários dos Usuários</p>
                    <p class="lead">Veja o que nossos usuários têm a dizer sobre nós:</p>
                </div>
            </div>
        </section>
        <hr>
        <section class="comentario container h-100 d-flex justify-content-center align-items-center">

            <form method="post" action="../../back/controller/comentario.php" class="form d-block>
                <label for="comentario">Comente aqui o que achou!!</label><br>

                <textarea class="form-control" id="comentario" name="text_comentario" rows="1" cols="70"></textarea><br> <!-- tem que ser validado no backend-->
                <div class="">

                    <button type="submit" class="enviar_comentario btn btn-primary">Enviar</button>
                </div>
            </form>

            <?php if (!isset($_SESSION['email']) == true) : // vai ter que ser outra logica ?>
                <div class="modal" id="modalErro">
                    <div class="modal-dialog draggable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Erro</h5>
                                <button type="button" class="btn-close btn-close-white" aria-label="Close" id="fechar"></button>
                            </div>
                            <div class="modal-body">
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
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <script>
                // Exibir o modal de erro automaticamente
                document.getElementById("modalErro").style.display = "flex";
                document.getElementById("fechar").addEventListener('click', () => {
                    document.getElementById("modalErro").classList.toggle("d-none");
                })

                // Inicializa a função draggable do jQuery UI para tornar o modal movível
                $(function() {
                    $(".draggable").draggable();
                });
            </script>';

        </section>
    </main>

    <hr>
    <footer class="footer p-3 text-center">
        &copy; Todos os direitos reservados. | &reg;since 2023
    </footer>

</body>

</html>