<?php

if (!isset($_SESSION)) {
    session_start();
}

    unset($_SESSION['email']);
    unset($_SESSION['senha']);

    header('Location: ../../front/pages/login.php');