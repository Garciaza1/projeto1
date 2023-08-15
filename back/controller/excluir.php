<?php

if(!empty($_GET['id'])){
    
    include_once("../config.php");
    $id = $_GET['id'];

    $result = mysqli_query(
        $conexao, "SELECT * FROM comentarios WHERE id = '$id'"
    );

    if($result->num_rows > 0 ){

        $result = mysqli_query(
            $conexao, "DELETE FROM comentarios WHERE id = '$id'"
        );

        header('Location:../../pages/pagina2.php');
    }
    
}