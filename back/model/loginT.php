<?php

namespace fgb\Login;

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
// Verificar o submit do login

echo('deu boa');
// Chamar o método pegaLogin()
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    
    // Acesso do sistema.
    $conexao = $this->mysqli->conecta();
    $email = $_POST['text_email'];
    $senha = $_POST['text_senha'];

    print_r($email, $senha);

    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
    $result = $conexao->query($sql);
    print_r($sql);
    print_r($result);
} else {
    header('location: ../../front/pages/login.php');
}
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar
// ver o controller e refazer o codigo ate o loguin entrar