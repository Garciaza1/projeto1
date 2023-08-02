<?php

include_once("../back/config.php");
include_once("../back/model/loginT.php");


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
        $user_id => " Id: " . $user_id,
        $user => "Nome: " . $user,
        $logado => "Email: " . $logado,
    ];
    // essas informações tem que ser guardadas no menu de perfil.
    /*
    foreach ($perfil as $dados) {
        print_r(" | " . $dados);
    }
    */
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- link flaticons -->
    <link href="/website/css/uicons-bold-rounded.css" rel="stylesheet">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- links dos arquivos assets -->
    <link rel="stylesheet" href="assets/arquivo.css">
    <script defer src="assets/arquivo.js"></script>

    <!-- posteriormente colocar icones na guia do site-->
    <title>Site 1 (mostruario do projeto)</title>
</head>

<body data-bs-theme="dark">

    <!---------- inicio do header -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <header class="pt-1">
        <div class="logo d-flex">
            <img height="60px" src="assets/imagens/logo1.png" alt="logo" class="p-1">
            <H1>PROJETO</H1>
        </div>

        <?php if (isset($logado)) : ?>
            <div class="bg-light-subtle border border-secundary-subtle rounded-3 p-2">
                <?= $logado . ' está logado :)' ?>
            </div>
        <?php endif; ?>
        <div class="menu-header justfy-content-between text-center">
            <?php if (!isset($logado)) : ?>
                <div>
                    <a class="btn btn-info " href="pages/cadastro.php">Cadastrar</a>
                    <a class="btn btn-info " href="pages/login.php">Login</a>
                <?php endif; ?>
                <a class="btn btn-info " href="pages/pagina2.php">Outra Pagina</a>
                </div>
        </div>

        <?php if (isset($logado)) : ?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img height="30px" src="assets/imagens/peril-2.png" alt="perfil">
                    <i class="me-2"></i><?= $user ?> <!-- fa-regular fa-user -->
                </button>
                <ul class="dropdown-menu">
                    <!-- trocar o foreach e usar um metodo normal e colocar os lin e não lin e mehlorar a estilização. colocar icones antes de cada link  style=\"font-family: Arial, Helvetica, sans-serif;\" -->
                    <?php foreach ($perfil as $dados) : ?>
                        <?php print_r("<li class=\"dropdown-item\" > <a class=\"text-white-50\" href=\"pages/perfil.php\">" .  $dados . "</a></li> <hr class=\"dropdown-divider\">")  ?>
                    <?php endforeach; ?>
                    <li> <a class="dropdown-item" href="../back/model/sair.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Sair</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </header>

    <script>
        //alert("MUITO IMPORTANTE LER O README.MD  la terão instruções sobre o xampp e como usar.");
    </script>

    <!-- INICIO DO MAIN --------------------------------------------------------------------------------------------------------------------------------- -->
    <main class="">
        <aside class="d-grid">
            <div class="row">
                <nav class="menu1 border border-dark-subtle p-3">
                    <div class="justify-content-start col-12">
                        <!-- fazer os botoes girando abrirem  as caixas de text e imagens emm JS-->
                        <label>1 </label>
                        <button class="border spinner-border " id="btn1">
                            <img width="30px" src="https://i1.sndcdn.com/artworks-000465638568-6mvcd2-t500x500.jpg" alt="">
                        </button>
                        <label>2 </label>
                        <button class="border spinner-border " id="btn2">
                            <img width="30px" src="https://www.otempo.com.br/image/contentid/policy:1.2873697:1685219245/MC-Pipokinha-jpg.jpg?f=3x2&w=1224" alt="">
                        </button>
                        <label>3 </label>
                        <button class="border spinner-border me-5" id="btn3">
                            <img width="30px" src="https://i1.sndcdn.com/artworks-000465638568-6mvcd2-t500x500.jpg" alt="">
                        </button>

                        ☝🤓Sugiro que coloque dados falsos e que na hora de trocar nesta pagina tenha certeza

                    </div>

                </nav>
            </div>
        </aside>

        <!-- colocar os sections em d-none para p/ JS tirar o d-none -->
        <!-- colocar a descrição do site-->
        <section class="container-fluid text-center d-none" id="Alan-Turing">
            <h2 class="">
                Alan Turing: Ateu, Pai da Ciência da Computação e <br> <ins>🥵HOMOSSEXUAL😈</ins>
            </h2>

            <h3 class="text-danger text-center m-2">
                Já agradeceu ao seu whatsapp? 📞📳
            </h3>

            <figure class="col-12">
                <img height="200px" src="https://i1.sndcdn.com/artworks-000465638568-6mvcd2-t500x500.jpg">
                <figcaption class="text-light"> 23 de junho de 1912 / 7 de junho de 1954 </figcaption>
            </figure>

            <div class="texto d-grid justify-content-center mt-2">
                <p>
                    Alan Mathison Turing foi um renomado matemático,
                    lógico e criptoanalista britânico, nascido em 23 de junho de 1912, em Londres, Inglaterra.
                    Ele é amplamente reconhecido como um dos pioneiros da ciência da computação e da inteligência
                    artificial.
                    Sua vida foi marcada por contribuições significativas para a matemática, a criptografia e a ciência
                    teórica,
                    além de eventos trágicos que resultaram em sua morte precoce.
                </p>
                <hr>
                <p>
                    Turing estudou matemática na Universidade de Cambridge e, durante sua graduação, desenvolveu a ideia
                    de uma
                    máquina teórica que se tornaria conhecida como a "Máquina de Turing".Essa concepção teve um impacto
                    fundamental no desenvolvimento dos computadores modernos,
                    fornecendo os princípios teóricos para o funcionamento dos mesmos.
                </p>
                <hr>
                <p>
                    Durante a Segunda Guerra Mundial, Turing trabalhou como criptoanalista para o governo britânico. Sua
                    equipe, localizada em Bletchley Park, foi responsável
                    por decifrar mensagens criptografadas produzidas pela máquina de criptografia alemã Enigma. A
                    contribuição de Turing para a quebra do código Enigma foi crucial
                    para os esforços aliados e estima-se que suas contribuições tenham ajudado a encurtar a guerra em
                    dois anos.
                </p>
                <hr>

            </div>
        </section>
        <!--SEGUNDA SESSAO --------------------------------------------------------------------------------------------------------------------------------- -->
        <section class="container-fluid text-center mt-4 d-none" id="Ada-Lovelace">
            <h2 class="">
                Ada Lovelace: A rainha do fluxo e a primeira programadora🙈 <b>(Poggers)</b>
            </h2>
            <h3 class="text-danger text-center m-2">
                Já pediu desculpas por ser homem? <br> E agr oq eu faço?😥
            </h3>
            <figure class="col-12">
                <img height="200px" src="https://www.otempo.com.br/image/contentid/policy:1.2873697:1685219245/MC-Pipokinha-jpg.jpg?f=3x2&w=1224">
                <figcaption class="text-light"> 10 de dezembro de 1815 / 27 de novembro de 1852 </figcaption>
            </figure>

            <div class="texto d-grid justify-content-center mt-2">
                <p>
                    Ada Lovelace, cujo nome completo era Augusta Ada Byron King, nasceu em 10 de dezembro de 1815, em
                    Londres, Inglaterra. Ela foi uma matemática e escritora britânica do século XIX,
                    conhecida por suas contribuições pioneiras para a computação e por ser considerada a primeira
                    programadora da história.
                </p>
                <hr>
                <p>
                    Ada Lovelace era filha do poeta Lord Byron e da matemática Anne Isabella Milbanke. Sua mãe,
                    preocupada com a possibilidade de Ada herdar as características temperamentais de seu pai, encorajou
                    seu interesse pela matemática e pela ciência. Lovelace mostrou talento
                    excepcional desde cedo e foi educada em casa por tutores particulares, recebendo uma formação ampla
                    em matemática, música e línguas.
                </p>
                <hr>
                <p>
                    Aos 17 anos, Ada conheceu o matemático Charles Babbage, que a apresentou à sua máquina de cálculo,
                    conhecida como "Máquina Diferencial". Lovelace ficou fascinada pela máquina e compreendeu seu
                    potencial além do simples cálculo numérico. Ela começou a colaborar com Babbage e,
                    em 1843, escreveu uma série de notas sobre a "Máquina Analítica", um projeto mais ambicioso de
                    Babbage
                </p>
                <hr>

            </div>
        </section>
        <!-- TERCEIRA SESSAO --------------------------------------------------------------------------------------------------------------------------------- -->
        <section>

        </section>
    </main>

    <footer class="footer p-3 text-center">
        &copy; Todos os direitos reservados. | &reg;since 2023
    </footer>
</body>

</html>