<?php

if (!isset($_SESSION)) {
    session_start();
}

unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['user_name']);
unset($_SESSION['user_id']);

header('Location: ../../front/pages/login.php');
