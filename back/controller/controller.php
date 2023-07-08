<?php

// Inclua a classe Model
use Model;

class Main extends Model
{
    public function cadastro($username, $password)
    {
        // Verifique se o login é válido
        $params = [
            ':username' => $username
        ];

        $this->conectar($params);
        $results = $this->query("SELECT id, FROM usuario WHERE :username = nome", $params);

        // Verifique se há resultados
        if (empty($results->results)) {
            return [
                'status' => false
            ];
        }

        if (!password_verify($password, $results->results[0]->password)) {
            return [
                'status' => false
            ];
        }

        // Login válido
        return [
            'status' => true
        ];
    }

    public function data($username)
    {
        // Obtenha todos os dados necessários do usuário para inserir na sessão
        $params = [
            ':username' => $username
        ];
        $this->conectar($params);
        $results = $this->query("SELECT id, FROM usuario WHERE :username = nome", $params);

        // Verifique se há resultados
        if (empty($results->results)) {
            return [
                'status' => false
            ];
        }

        return [
            'status' => 'success',
            'data' => $results->results[0]
        ];
    }

    public function login_form()
    {
        if (isset($_SESSION)) {
            header("location:../../front/index.php");
        }

        // Verifique se há erros (após o envio do formulário)
        $data = [];
        if (!empty($_SESSION['validation_errors'])) {
            $data['validation_errors'] = $_SESSION['validation_errors'];
            unset($_SESSION['validation_errors']);
        }

        if (!empty($_SESSION['server_error'])) {
            $data['server_error'] = $_SESSION['server_error'];
            unset($_SESSION['server_error']);
        }
    }

    public function cadastro_submit()
    {
        if (isset($_SESSION)) {
            header("location:../../front/index.php");
        }

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header("location:../../front/index.php");
        }

        $validation_errors = [];

        if (empty($_POST['text_username']) || empty($_POST['text_password'])) {
            $validation_errors[] = "O nome de usuário e a senha são obrigatórios.";
        }

        if (!empty($validation_errors)) {
            $_SESSION['validation_errors'] = $validation_errors;
            $this->login_form();
            return;
        }

        // Obtenha os dados do formulário
        $username = $_POST['text_username'];
        $password = $_POST['text_password'];

        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $validation_errors[] = 'O nome de usuário deve ser um email válido.';
            $_SESSION['validation_errors'] = $validation_errors;
            $this->login_form();
            return;
        }

        if (strlen($username) < 5 || strlen($username) > 50) {
            $validation_errors[] = 'O nome de usuário deve ter entre 5 e 50 caracteres.';
            $_SESSION['validation_errors'] = $validation_errors;
            $this->login_form();
            return;
        }

        if (strlen($password) < 6 || strlen($password) > 12) {
            $validation_errors[] = 'A senha deve ter entre 6 e 12 caracteres.';
            $_SESSION['validation_errors'] = $validation_errors;
            $this->login_form();
            return;
        }

        $model = new Model();
        $result = $this->cadastro($username, $password);

        if (!$result['status']) {
            // Login inválido
            $_SESSION['server_error'] = 'Login inválido';
            $this->login_form();
            return;
        }

        $resultData = $this->data($username);
        printData($resultData);
    }
}
