<?php

    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['user']);
    header('Location: ../../front/pages/login.php');