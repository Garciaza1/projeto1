<?php
/*
use Model;

class Login extends Model
{
    public function check_login($username, $password)
    {
        // check if the login is valid
        $params = [
            ':username' => $username
        ];

        // check if there is a user in the database
        $this->conectar($params);
        $results = $this->query(
            "SELECT id, passwrd FROM usuario :username = name",
            $params
        );

        // if there is no user, returns false
        if ($results->affected_rows == 0) {
            return [
                'status' => false
            ];
        }

        // there is a user with that name (username)
        // check if the password is correct
        if (!password_verify($password, $results->results[0]->passwrd)) {
            return [
                'status' => false
            ];
        }

        // login is ok
        return [
            'status' => true
        ];
    }

    public function get_user_data($username)
    {
        // get all necessary user data to insert in the session
        $params = [
            ':username' => $username
        ];
        $this->conectar($params);
        $results = $this->query(
            "SELECT id, FROM usuario WHERE :username = name",
            $params
        );

        return [
            'status' => 'success',
            'data' => $results->results[0]
        ];
    }
}

class Main 
{
     // =======================================================
     public function index()
     {
         // check if there is no active user in session
         if(!check_session())
         {
             $this->login_frm();
             return;
         }
         //adicional se der erro tirar 
         if(check_session()){
            header("../../front/inde.php");
        }
 

     }
 
     // =======================================================
     // LOGIN
     // =======================================================

     public function login_frm()
     {
         // check if there is already a user in the session
         if(check_session())
         {
             $this->index();
             return;
         }
 
         // check if there are errors (after login_submit)
         $data = [];
         if(!empty($_SESSION['validation_errors']))
         {
             $data['validation_errors'] = $_SESSION['validation_errors'];
             unset($_SESSION['validation_errors']);
         }
 
         if(!empty($_SESSION['server_error'])){
             $data['server_error'] = $_SESSION['server_error'];
             unset($_SESSION['server_error']);
         }

     }
 
     // =======================================================
     public function login_submit()
     {
         // check if there is already an active session
         if(check_session()){
             $this->index();
             return;
         }
 
         // check if there was a post request
         if($_SERVER['REQUEST_METHOD'] != 'POST'){
             $this->index();
             return;
         }
 
         // form validation
         $validation_errors = [];
         if(empty($_POST['text_username']) || empty($_POST['text_password'])){
             $validation_errors[] = "Username e password são obrigatórios.";
         }
 
         // check if there are validation errors
         if(!empty($validation_errors)){
             $_SESSION['validation_errors'] = $validation_errors;
             $this->login_frm();
             return;
         }
 
         // get form data
         $username = $_POST['text_username'];
         $password = $_POST['text_password'];
 
         // check if username is valid email and between 5 and 50 chars
         if(!filter_var($username, FILTER_VALIDATE_EMAIL))
         {
             $validation_errors[] = 'O username tem que ser um email válido.';
             $_SESSION['validation_errors'] = $validation_errors;
             $this->login_frm();
             return;
         }
 
         // check if username is between 5 and 50 chars
         if(strlen($username) < 5 || strlen($username) > 50){
             $validation_errors[] = 'O username deve ter entre 5 e 50 caracteres.';
             $_SESSION['validation_errors'] = $validation_errors;
             $this->login_frm();
             return;
         }
 
         // check if password is valid
         if(strlen($password) < 6 || strlen($password) > 12){
             $validation_errors[] = 'A password deve ter entre 6 e 12 caracteres.';
             $_SESSION['validation_errors'] = $validation_errors;
             $this->login_frm();
             return;
         }
 
         $model = new Model();
         $result = $model->check_login($username, $password);
         if(!$result['status']){
 
             // invalid login
             $_SESSION['server_error'] = 'Login inválido';
             $this->login_frm();
             return;
 
         }
 
         // load user information to the session
         $results = $model->get_user_data($username);
         printData($results);
 
         // update the last login
 
         // go to main page
     }
}


class Main
{

    public function index()
    {
        // check if there is no active user in session
        if (!check_session()) {
            $this->login_frm();
            return;
        }
        //adicional se der erro tirar 
        if (check_session()) {
            header("../../front/index.php");
        }
    }

    // =======================================================
    // LOGIN
    // =======================================================

    public function login_frm()
    {
        // check if there is already a user in the session
        if (check_session()) {
            $this->index();
            return;
        }

        // check if there are errors (after login_submit)
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

    // =======================================================
    public function login_submit()
    {
        // check if there is already an active session
        if (check_session()) {
            $this->index();
            return;
        }

        // check if there was a post request
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }

        // form validation
        $validation_errors = [];
        if (empty($_POST['text_username']) || empty($_POST['text_password'])) {
            $validation_errors[] = "Username e password são obrigatórios.";
        }

        // check if there are validation errors
        if (!empty($validation_errors)) {
            $_SESSION['validation_errors'] = $validation_errors;
            $this->login_frm();
            return;
        }


    }
}*/