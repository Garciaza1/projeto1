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
    /*
    $partesDoNome = explode(" ", $user);
    $primeiro_nome = $partesDoNome[0];
    */
    $perfil = [
        $user_id => " id: " . $user_id,
        $user => "nome: " . $user,
        $logado => "email: " . $logado,
    ];
    // Use a função explode para dividir o nome em partes com base no espaço em branco


    // Pegue o primeiro elemento do array, que é o primeiro nome

    include_once("../../back/controller/comentario.php");
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

 <!-- fontawesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
            <img height="60px" src="../assets/imagens/logo1.png" alt="logo" class="p-1">
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
                <?php endif; ?>
                <a class="btn btn-info " href="../index.php">Home</a>
                </div>
        </div>

        <?php if (isset($logado)) : ?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img height="30px" src="../assets/imagens/peril-2.png" alt="perfil">
                    <i class=""></i><?= $user ?>
                </button>
                <ul class="dropdown-menu">
                    <!-- trocar o foreach e usar um metodo normal e colocar os lin e não lin e mehlorar a estilização. -->
                    <?php foreach ($perfil as $dados) : ?>
                        <?php print_r("<li class=\"dropdown-item\"> <a class=\"text-white-50\" href=\"perfil.php\">" .  $dados . "</li></a> <hr class=\"dropdown-divider\">")  ?>
                    <?php endforeach; ?>
                    <li> <a class="dropdown-item" href="../../back/model/sair.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Sair</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </header>
    <hr>
    <!-- inicio do main  ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <main>
        <div class="col-md-8 offset-md-2">
            <h2>Seção de Comentários</h2>
        </div>

        <?php if (mysqli_num_rows($result['select_todos_comentarios']) > 0) : // tem que funcionar sem o login. 
        ?>
            <section class="comentario mt-5 d-grid justify-content-center" style="margin-left: 0%;">
                <div class="jumbotron jumbotron-fluid bg-secondary text-white border border- rounded row">
                    <div class="container align-items-start col-12">
                        <?php while ($comentarios = mysqli_fetch_assoc($result['select_todos_comentarios'])) : ?>
                            <?php $autor = $comentarios['nome'];
                            $comentario = $comentarios['comentario']; ?>
                            <h5 class="display-9 pt-2"><?= $autor ?></h5>
                            <p class="lead p-1"><?= $comentario . "<hr>" ?></p>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <section class="comentario h-100 d-flex" style="margin-left: 0%;">

            <div class="container mt-5 justify-content-start ">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h2>Comente aqui</h2>
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Comente o que achou aqui!!</h5>
                                <form method="post" action="../../back/controller/comentario.php" class="form d-block">
                                    <div class="form-group">
                                        <textarea class="form-control" name="text_comentario" id="comentario" rows="2" cols="70"></textarea>
                                    </div>
                                    <?php // fazer a validação de $SESSION e se não tiver cadastrado aparece mensagem para se cadastrar
                                    ?>
                                    <button type="submit" class="enviar_comentario btn btn-primary mt-2">Enviar Comentário</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php //if (!isset($_SESSION['email']) == true) : // vai ter que ser outra logica 
            ?>

            <?php if (!empty($validation_errors)) : ?>
                <div class="modal" id="modalErro">
                    <div class="modal-dialog draggable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Erro</h5>
                                <button type="button" class="btn-close btn-close-white" aria-label="Close" id="fechar"></button>
                            </div>
                            <div class="modal-body">
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
                <?php // endif; 
                ?>

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