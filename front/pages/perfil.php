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

    header('Location: pages/login.php');
    $_SESSION['validation_errors'] = "faça um login primeiro campeão !!";
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

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!--   JQuery   -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!--  Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!--  intl-tel-input  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <!-- links dos arquivos assets -->
    <link rel="stylesheet" href="../assets/arquivo.css">


    <title>Perfil</title>
</head>


<body data-bs-theme="dark">
    <!-- 
        fazer um esquema de apresentação e configuração do perfil 
        ARRANJAR UM JEITO DE DEIXAR O HEADER DO LADO DA PAGINA. 
        fazer uma foto de peril e colocar no banco de dados. se n tiver nenhuma ter uma default.

    -->
    <header class="container-fluid pt-3 d-flex pt-5">

        <div class="logo">
            <img height="60px" src="../assets/imagens/logo1.png" alt="logo" class="p-1">
            <h2>FGB Seu perfil</H2>
        </div>


        <?php if (isset($logado)) : ?>
            <div class="bg-light-subtle border border-secundary-subtle rounded-3 p-2 ">
                <?= $logado . ' está logado :)' ?>
            </div>
            <a class="btn btn-info d-block mb-3" href="../index.php">Home</a>

            <?php if (isset($logado)) : ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img height="30px" src="../assets/imagens/peril-2.png" alt="perfil">
                        <i class=""></i><?= $user ?>
                    </button>
                    <ul class="dropdown-menu">
                        <!-- trocar o foreach e usar um metodo normal e colocar os lin e não lin e mehlorar a estilização. -->
                        <?php foreach ($perfil as $dados) : ?>
                            <?php print_r("<li class=\"dropdown-item\"> " .  $dados . "</li> <hr class=\"dropdown-divider\">")  ?>
                        <?php endforeach; ?>
                        <li> <a class="dropdown-item" href="../../back/model/sair.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Sair</a></li>
                    </ul>
                </div>
            <?php endif; ?>

    </header>

    <hr class="mt-5">

    <h2 class="p-2 text-center"> Muito cuidado ao colocar seus dados pois este site não é seguro ainda
        <br>
        é apenas uma pagina de testes ✌
    </h2>

    <h3 class="p-2 text-center">
        ☝🤓<br> Sugiro que coloque dados falsos e que na hora de trocar nesta pagina tenha certeza
        de que vai lembrar da troca da informação no caso dela precisar ser validada no login.
    </h3>


    <div class="container-fluid p-5">
        <div class="row m-3">
            <!-- Barra de navegação na parte esquerda -->
            <nav class="col-3 border rounded-2 border-1 d-flex justify-content-center pt-5">
                <div class="menu-header justfy-content-between text-center">

                    <div>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati corrupti quasi aut porro
                            rerum delectus alias libero voluptate omnis, minus maiores quos iure dicta perspiciatis
                            tempora iste nemo explicabo nisi?
                        </p>
                        <br>
                        <hr>
                        <br>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis mollitia ullam nihil
                            odit nostrum pariatur fugit, temporibus culpa labore illo maiores earum expedita, ad quia
                            doloribus omnis eaque cupiditate. Similique.
                        </p>
                        <!-- 

                            <a class="btn btn-info d-block mb-3" href="cadastro.php">Cadastrar</a>
                            <a class="btn btn-info d-block mb-3" href="login.php">Login</a>
                        -->

                    </div>
                </div>
            </nav>

            <main class="col-8 ms-4 align-items-center border-start border-end border-top rounded-5 border-secundary-subtle p-4 d-grid justify-content-center">

                <div class="container   text-center pe-5 me-5">

                    <h2 class="pb-2 fa-user-circle-o">Dados pessoais:</h2>
                    <!-- COLOCAR TODOS OS FORMS ESCONDIDOS E DPS DESCER DPS DE APRTAR O BOTAO E COLOCAR NO FORM-->

                    <!-- alterar nome -->
                    <section class="border border-secundary-subtle rounded-3 p-3 my-2 col-12">

                        <h5 class="card-title pb-1">Alterar nome:
                            <button class="btn btn-outline-secondary btn-sm ms-2 border-0 border-bottom" style="width: 8%;" id="abreNome">
                                ↧
                            </button>
                        </h5>

                        <form method="post" action="#" class="form d-block d-none">
                            <div class="form-group">
                                <input type="text" class="form-control mb-2 mt-1" name="text_mudar_nome" id="mudar_nome"></input>
                            </div>

                            <?php // fazer a validação de $SESSION e se não tiver cadastrado aparece mensagem para se cadastrar 
                            ?>
                            <button type="submit" class="mudar_nome btn btn-primary mt-2 btn-sm">Mudar nome</button>

                        </form>

                    </section>

                    <!-- alterar email -->
                    <section class="border border-secundary-subtle rounded-3 p-3 my-2 col-12">
                        <h5 class="card-title pb-1">Alterar email
                            <button class="btn btn-outline-secondary btn-sm ms-2 border-0 border-bottom" style="width: 8%" id="abreEmail">
                                ↧
                            </button>
                        </h5>
                        <form method="post" action="#" class="form d-block d-none">
                            <div class="form-group">

                                <label for="email_antigo">Email antigo: </label>
                                <input type="email" class="form-control" name="text_email_antigo" id="email_antigo"></input>

                                <label for="email_novo">Email novo: </label>
                                <input type="email" class="form-control" name="text_email_novo" id="email_novo"></input>

                            </div>
                            <?php // fazer a validação de $SESSION e se não tiver cadastrado aparece mensagem para se cadastrar 
                            ?>
                            <button type="submit" class="mudar_email btn btn-primary mt-2">Mudar email</button>
                        </form>

                    </section>

                    <!-- alterar senha  -->
                    <section class="border border-secundary-subtle rounded-3 p-3 my-2 col-12">

                        <h5 class="card-title pb-1">Alterar senha <button class="btn btn-outline-secondary btn-sm ms-2 border-0 border-bottom" style="width: 8%" id="abreSenha">
                                ↧
                            </button>
                        </h5>
                        <form method="post" action="#" class="form d-block d-none">
                            <div class="form-group">

                                <label for="senha_antiga">Senha antiga: </label>
                                <input type="password" class="form-control" name="text_senha_antiga" id="senha_antiga"></input>

                                <label for="senha_nova">Senha nova: </label>
                                <input type="password" class="form-control" name="text_senha_nova" id="senha_nova"></input>

                            </div>
                            <?php // fazer a validação de $SESSION e se não tiver cadastrado aparece mensagem para se cadastrar 
                            ?>
                            <button type="submit" class="mudar_senha btn btn-primary mt-2">Mudar senha</button>
                        </form>
                    </section>

                    <!-- alterar aniversario -->
                    <section class="border border-secundary-subtle rounded-3 p-3 my-2 col-12">

                        <h5 class="card-title pb-1">Alterar data do aniversario:
                            <button class="btn btn-outline-secondary btn-sm ms-2 border-0 border-bottom" style="width: 8%" id="abreData">
                                ↧
                            </button>
                        </h5>

                        <form method="post" action="#" class="form d-block d-none">
                            <div class="form-group">
                                <input type="date" class="form-control" name="text_mudar_data" id="mudar_data" placeholder="escolha uma data"></input>
                            </div>
                            <?php // fazer a validação de $SESSION e se não tiver cadastrado aparece mensagem para se cadastrar 
                            ?>
                            <button type="submit" class="mudar_aniversario btn btn-primary mt-2">Mudar aniversario</button>
                        </form>

                    </section>

                    <!-- alterar telefone -->
                    <section class="border border-secundary-subtle rounded-3 p-3 my-2 col-12">
                        <h5 class="card-title pb-1">Alterar telefone:
                            <button class="btn btn-outline-secondary btn-sm ms-2 border-0 border-bottom" style="width: 8%;" id="abreTel">
                                ↧
                            </button>
                        </h5>

                        <form method="post" action="#" class="form d-block d-none">

                            <div class="form-group">
                                <input type="tel" class="form-control" name="text_mudar_telefone" id="mudar_tel"></input>
                            </div>

                            <?php // fazer a validação de $SESSION e se não tiver cadastrado aparece mensagem para se cadastrar 
                            ?>

                            <button type="submit" class="mudar_tel btn btn-primary mt-2">Mudar telefone</button>

                        </form>

                    </section>

                    <!-- alterar genero  trocar pra radious copiar a formatação do cadastro -->
                    <section class="border border-secundary-subtle rounded-3 p-3 my-2 col-12">
                        <h5 class="card-title pb-1">Alterar genero
                            <button class="btn btn-outline-secondary btn-sm ms-2 border-0 border-bottom" style="width: 8%" id="abreGenero">
                                ↧
                            </button>
                        </h5>

                        <form method="post" action="#" class="form d-flex d-none">
                            <div class="form-group">
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="radio_gender" id="radio_m" value="m" checked>
                                    <label class="form-check-label" for="radio_m">Masculino</label>

                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input" type="radio" name="radio_gender" id="radio_f" value="f">
                                    <label class="form-check-label" for="radio_f">Feminino</label>
                                </div>
                                <div class="form-group mt-1 text-center">
                                    <button type="submit" class="mudar_genero btn btn-primary mt-2">Mudar
                                        genero</button>
                                    <?php // fazer a validação de $SESSION e se não tiver cadastrado aparece mensagem para se cadastrar 
                                    ?>

                                </div>
                        </form>

                    </section>

                </div>
            </main>
        </div>
    </div>
    <!-- parte onde a pessoa excluiria a conta ou o cadastro dela -->

<?php endif; ?>

<?php if (!isset($logado)) : ?>
    <?php $_SESSION['validation_errors'] = "precisa se cadastrar antes bobão "; ?>
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
                                    <li>
                                        <?= $error ?>
                                    </li>
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

    <!-- inicio do footer ----------------------------- -->

    <hr>

    <footer class="footer p-3 text-center">
        &copy; Todos os direitos reservados. | &reg;since 2023
    </footer>
</body>

<!-- abre e fecha os forms-->
<script>
    function toggleForm(form) {
        form.classList.toggle("d-none");
    }

    function limparFormulario(form) {
        form.reset();
        form.querySelector('input').focus();
    }

    // Adiciona evento de clique aos botões para mostrar/ocultar o formulário
    document.querySelectorAll(".btn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const formContainer = btn.parentElement.nextElementSibling;
            toggleForm(formContainer);
            limparFormulario(formContainer);


        });
    });
</script>

<!-- estiliza o form telefone -->
<script>
    const phoneInputField = document.querySelector("#mudar_tel");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>

<!-- estiliza o form data -->
<script>
    flatpickr("#mudar_data", {
        dateFormat: "d-m-Y"
    });
</script>



</html>