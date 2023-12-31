<?php

include_once("../back/config.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--  intl-tel-input  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <!-- links dos arquivos assets -->
    <link rel="stylesheet" href="assets/arquivo.css">
    <script defer src="assets/arquivo.js"></script>

    <!--  Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- posteriormente colocar icones na guia do site-->
    <title>Cadastro</title>
</head>

<body data-bs-theme="dark">
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <div class="row justify-content-center">
                        <div class="col-10">

                            <h4><strong>Cadastre-se</strong></h4>

                            <hr>

                            <form action="../back/model/cadastroT.php" method="post">

                                <div class="mb-3">
                                    <label for="text_name" class="form-label">Nome ou Apelido</label>
                                    <input type="text" name="text_name" id="text_name" value="" class="form-control" required placeholder="João Da Silva ou joãozinho123">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <div>Sexo</div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio_gender" id="radio_m" value="m" checked>
                                            <label class="form-check-label" for="radio_m">Masculino</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio_gender" id="radio_f" value="f">
                                            <label class="form-check-label" for="radio_f">Feminino</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="text_birthdate" class="form-label">Data de nascimento</label>
                                        <input type="date" class="form-control" name="text_birthdate" id="text_birthdate" required placeholder="Escolha uma data aqui">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="text_email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="text_email" id="text_email" required placeholder="Joaozinho@gmail.com">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="text_senha" class="form-label">Senha</label>
                                        <input type="Senha" class="form-control" name="text_senha" id="text_senha" required placeholder="12345678910">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mt-3">
                                        <label for="text_phone" class="form-label">Telefone (apenas numeros)</label><br>
                                        <input type="text" class="form-control" name="text_phone" id="text_phone" required>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <button type="reset" onclick="limparFrom()" class="btn btn-secondary" id="LimparBtn"><i class="fa-solid fa-trash me-2"></i>Limpar</button>
                                    <a href="../index.php" class="btn btn-secondary"><i class="fa-solid fa-xmark me-2"></i>Cancelar</a>
                                    <button type="submit" name="submit" id="submit" class="btn btn-secondary"><i class="fa-regular fa-floppy-disk me-2"></i>Guardar</button>
                                </div>

                                <?php if (isset($validation_errors)) : ?>
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


    <div class="modal" id="modalErro">
        <div class="modal-dialog draggable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ALERTA:</h5>
                    <button type="button" class="btn-close btn-close-white" aria-label="Close" id="fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger p-2 text-center">
                        ESTE SITE TEM FINS APENAS DE ENTRETENIMENTO!!!!
                        <br>
                        NÃO TEM SEGURANÇA COLOQUE APENAS DADOS FALSOS PARA SUA PROTEÇÃO!!!!
                        <br>
                        você foi avisado
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!--   JQuery   -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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
    
</script>


    <script>
        flatpickr("#text_birthdate", {
            dateFormat: "d/m/Y"
        })
    </script>

    <script>

        const input = document.querySelector("#text_phone");
        window.intlTelInput(input, {
            initialCountry: "br",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js", // "/intl-tel-input/js/utils.js?1690975972744" // just for formatting/placeholders etc
        });

    </script>

</body>

</html>