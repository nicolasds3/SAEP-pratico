<?php
include "../../banco/conexoes/conexao.php";

$id_tarefa = $_GET['id_tarefa'];

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

    $descricao_tarefa = $_POST['descricao_tarefa'];
    $nome_setor = $_POST['nome_setor'];
    $fk_usuario = $_POST['fk_usuario'];
    $prioridade = $_POST['prioridade'];
    $status = $_POST['status_tarefa'];

    $sql_tarefas = "UPDATE tarefas SET descricao_tarefa = '$descricao_tarefa', nome_setor = '$nome_setor', prioridade = '$prioridade', data_cadastro_tarefa = CURRENT_DATE(), status_tarefa = '$status_tarefa', fk_usuario = )'$fk_usuario' WHERE id_tarefa = '$id_tarefa'";

    if ($conexao -> query($sql_tarefas) === true) {
        echo "<div id='verde'>Tarefa editada com sucesso!</div>";
        header("Location: gerenciamento_tarefas.php");
    } else {
        echo "<div id='vermelho'>Cadastro falhou!</div>" . $sql_tarefas . "<br>" . $conexao -> error;
    }

    $conexao -> close();
    exit();
}

$sql_tarefas = "SELECT * FROM tarefas WHERE id_tarefa = $id_tarefa";
$resultado = $conexao -> query($sql_tarefas);
$row = $resultado -> fetch_assoc();
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualiza suas tarefas!</title>
    <link rel="stylesheet" href="../visual/styles/styles.css">
</head>
<body>
    <form action="#" method="POST">
        <div>
            <label>Nova descrição: </label>
            <input type="text" name="descricao_tarefa">
        </div>
        <div>
            <label>Novo nome do setor: </label>
            <input type="text" name="nome_setor">
        </div>
        <div>
            <label>Nova prioridade: </label>
            <input type="text" name="prioridade">
        </div>
        <div>
            <label>Novo status: </label>
            <select name="status_tarefa">
                <option value="a-fazer">A fazer</option>
                <option value="fazendo">Fazendo</option>
                <option value="pronto">Pronto</option>
            </select>
        </div>
        <div>
            <input type="submit" value="atualizar">
        </div>
    </form>
</body>
</html>