<?php
include('../../back/controller/controller.php');

use fgb\Controllers;


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

    <!-- flatpickr -->
    <link rel="stylesheet" href="/assets/flatpickr/flatpickr.min.css">
    <script defer src="/assets/arquivo.js"></script>


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

                            <form action="../../back/controller/controller.php" method="post">

                                <div class="mb-3">
                                    <label for="text_name" class="form-label">Nome</label>
                                    <input type="text" name="text_name" id="text_name" value="" class="form-control" required>
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
                                        <input type="text" class="form-control" name="text_birthdate" id="text_birthdate" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="text_email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="text_email" id="text_email" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="text_email" class="form-label">Senha</label>
                                        <input type="Senha" class="form-control" name="text_senha" id="text_senha" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="text_phone" class="form-label">Telefone</label>
                                        <input type="text" class="form-control" name="text_phone" id="text_phone" required>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <a href="#" class="btn btn-secondary"><i class="fa-solid fa-xmark me-2"></i>Limpar</a>
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

    <script>
        flatpickr("#text_birthdate", {
            dateFormat: "d-m-Y"
        })
    </script>

</body>

</html>