<?php
include_once("../../back/config.php");

$result['select_todos_comentarios'] = mysqli_query(
    $conexao,
    "SELECT u.nome, c.comentario, c.id, c.id_comentario " .
        "FROM comentarios c INNER JOIN " .
        "usuario u ON c.id_comentario = u.id " .
        "ORDER BY c.id;"
);

while ($comentarios = mysqli_fetch_assoc($result['select_todos_comentarios'])) {

    $autor = $comentarios['nome'];
    $comentario = $comentarios['comentario'];
    $id = $comentarios['id'];
}
$comentario_novo = $_POST['text_comentario_novo']
$result['editar_comentario'] = mysqli_query(
    $conexao,
    "UPDATE comentarios SET comentario = '$comentario_novo' WHERE id = '$id'"
);
header('Location:../../front/pages/pagina2.php');
