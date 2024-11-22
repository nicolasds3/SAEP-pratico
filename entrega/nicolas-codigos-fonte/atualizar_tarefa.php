<?php
include "conexao.php";

$id_tarefa = $_GET['id_tarefa'];

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

    $descricao_tarefa = $_POST['descricao_tarefa'];
    $nome_setor = $_POST['nome_setor'];
    $fk_usuario = $_POST['fk_usuario'];
    $prioridade = $_POST['prioridade'];
    $status_tarefa = $_POST['status_tarefa'];

    $sql_tarefas = "UPDATE tarefas SET descricao_tarefa = '$descricao_tarefa', nome_setor = '$nome_setor', prioridade = '$prioridade', data_cadastro_tarefa = CURRENT_DATE(), status_tarefa = '$status_tarefa', fk_usuario = '$fk_usuario' WHERE id_tarefa = '$id_tarefa'";

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
    <link rel="stylesheet" href="styles.css">
</head>
<nav>
    <div>
        <h1>Gerenciamento de Tarefas.</h1>
    </div>
    <div id="ajuste">
        <div>
            <a class="a" href="criar_tarefas.php">Criar tarefas.</a>
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
    <form method="POST" action="atualizar_tarefa.php?id_tarefa=<?php echo $row['id_tarefa'];?>">
        <div class="margem">
            <label>ID do usuário: </label>
            <input type="text" name="fk_usuario" value="<?php echo $row['fk_usuario'];?>">
        </div>
        <div class="margem">
            <label>Nova descrição: </label>
            <input type="text" name="descricao_tarefa" value="<?php echo $row['descricao_tarefa'];?>">
        </div>
        <div class="margem">
            <label>Novo nome do setor: </label>
            <input type="text" name="nome_setor" value="<?php echo $row['nome_setor'];?>">
        </div>
        <div class="margem">
            <label>Nova prioridade: </label>
            <select name="prioridade" value="<?php echo $row['prioridade'];?>">
                <option value="existente"><?php echo $row['prioridade'];?></option>
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>
        </div>
        <div class="margem">
            <label>Novo status: </label>
            <select name="status_tarefa" value="<?php echo $row['status_tarefa'];?>">
                <option value="existente"><?php echo $row['status_tarefa'];?></option>
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

