<?php

include_once("../../back/config.php");

include_once("../../back/controller/comentario.php");

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
        $_SESSION['validation_errors'] = "Acesso negado:" . "<br>" . "<strong> - Faça um login primeiro campeão !!</strong>";
        header('Location:login.php');
    }

    //header('Location: pages/login.php');
} else {

    $logado = $_SESSION['email'];
    $user = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];
    $cadastrado['id'] = $user_id;
    $perfil = [
        $user_id => " id: " . $user_id,
        $user => "nome: " . $user,
        $logado => "email: " . $logado,
    ];

    // Use a função explode para dividir o nome em partes com base no espaço em branco
    /*
    $partesDoNome = explode(" ", $user);
    $primeiro_nome = $partesDoNome[0];
    */
    // Pegue o primeiro elemento do array, que é o primeiro nome

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
    <script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- links dos arquivos assets -->
    <link rel="stylesheet" href="../assets/arquivo.css">
    <script defer src="../assets/arquivo.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


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
        <?php if (mysqli_num_rows($result['select_todos_comentarios']) > 0) : ?>

            <section class="comentario mt-5 d-grid justify-content-center" style="margin-left: 0%;">
                <div class="jumbotron jumbotron-fluid bg-sucsess text-white border border-2 m-2 p-2">
                    <div class="container align-items-start col-12">
                        <table id="tabela-comentarios" class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Comentarios</th>
                                    <th>id</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result['select_todos_comentarios'] as $comentarios) : ?>
                                    <?php
                                    $autor = $comentarios['nome'];
                                    $comentario = $comentarios['comentario'];
                                    $id = $comentarios['id'];
                                    //$data_comentario = $comentarios['data_comentario'];
                                    ?>
                                    <tr class="">
                                        <td>
                                            <h5><?= $autor . ":" ?></h5>
                                            <p id="comentario">
                                                <?= $comentario; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <?= $id // deixar default asc 
                                            ?>
                                        </td>
                                        <?php if ($autor != $user) : ?>
                                            <td class="border border-1 border-bottom border-top border-end"> Excluir <i class="fa-solid fa-trash"></i></td>
                                        <?php endif; ?>
                                        <!-- so pode editar ou excluir se o id for igual o id do autor ou nome sla   ../../back/controller/editar.php -->
                                        <?php if ($autor == $user) : ?>
                                            <td class="border border-1 border-bottom border-top border-end"><a href="../../back/controller/excluir.php?id=<?= $id ?>">Excluir <i class="fa-solid fa-trash"></i></a></td>
                                        <?php endif; ?>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
        &copy; Todos os direitos reservados. | &reg;since 2023&trade;
    </footer>

    <!-- datatables scipts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabela-comentarios').DataTable({
                pageLength: 10,
                pagingType: "full_numbers",
                language: {
                    decimal: "",
                    emptyTable: "Sem dados disponíveis na tabela.",
                    info: "Mostrando _START_ até _END_ de _TOTAL_ registos",
                    infoEmpty: "Mostrando 0 até 0 de 0 registos",
                    infoFiltered: "(Filtrando _MAX_ total de registos)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Mostrando _MENU_ registos por página.",
                    loadingRecords: "Carregando...",
                    processing: "Processando...",
                    search: "Filtrar:",
                    zeroRecords: "Nenhum registro encontrado.",
                    paginate: {
                        first: "Primeira",
                        last: "Última",
                        next: "Seguinte",
                        previous: "Anterior"
                    },
                    aria: {
                        sortAscending: ": ative para classificar a coluna em ordem crescente.",
                        sortDescending: ": ative para classificar a coluna em ordem decrescente."
                    },

                    order: [1, 'asc']

                }
            });
        });
    </script>



</body>

</html>