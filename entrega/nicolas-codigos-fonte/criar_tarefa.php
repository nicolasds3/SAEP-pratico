<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao_tarefa = $_POST['descricao_tarefa'];
    $nome_setor = $_POST['nome_setor'];
    $fk_usuario = $_POST['fk_usuario'];
    $prioridade = $_POST['prioridade'];

    $sql_tarefas = "INSERT INTO tarefas (descricao_tarefa, nome_setor, prioridade, data_cadastro_tarefa, status_tarefa, fk_usuario) VALUES ('$descricao_tarefa', '$nome_setor', '$prioridade', CURRENT_DATE(), 'a fazer', '$fk_usuario')";

    if ($conexao -> query($sql_tarefas) === true) {
        echo "<div id='verde'>Tarefa criada com sucesso!</div>";
        header("Location: gerenciamento_tarefas.php");
    } else {
        echo "<div id='vermelho'>Cadastro falhou!</div>" . $sql_usuario . "<br>" . $conexao -> error;
    }

    $conexao -> close();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre suas tarefas!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<nav>
    <div>
        <h1>Gerenciamento de Tarefas.</h1>
    </div>
    <div id="ajuste">
        <div>
            <a class="a" href="criar_tarefa.php">Criar tarefas.</a>
        </div>
        <div>
            <a class="a" href="visualizar_usuarios.php">Visualizar Usuários</a>
        </div>
        <div>
            <a class="a" href="cadastro.php">Cadastro de Usuários</a>
        </div>
        <div>
            <a class="a" href="gerenciamento_tarefas.php">Gerenciar Tarefas</a>
        </div>
    </div>
</nav>
<body>
    <form action="#" method="POST">
        <div class="margem">
            <label>Descrição da tarefa:</label>
            <input type="text" name="descricao_tarefa">
        </div>
        <div class="margem">
            <label>Setor:</label>
            <input type="text" name="nome_setor">
        </div>
        <div class="margem">
            <label>ID do Usuário:</label>
            <input type="text" name="fk_usuario">
        </div>
        <div class="margem">
            <label>Prioridade</label>
            <select name="prioridade">
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>
