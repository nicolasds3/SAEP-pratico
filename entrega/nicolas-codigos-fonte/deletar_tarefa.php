<?php
include "conexao.php";

$id_tarefa = $_GET['id_tarefa'];

$sql_tarefas = "DELETE FROM tarefas WHERE id_tarefa = $id_tarefa";

$resultado = $conexao -> query($sql_tarefas);
$conexao -> close();
header("Location: gerenciamento_tarefas.php");
exit();
?>