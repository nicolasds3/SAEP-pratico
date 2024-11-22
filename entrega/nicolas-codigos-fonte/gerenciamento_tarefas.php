<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualize seus Usuários</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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
</body>
</html>

<?php
include 'conexao.php';

$sql = "SELECT * FROM tarefas";

$resultado = $conexao -> query($sql);

if ($resultado -> num_rows > 0) {
    echo "
    <div id='ajuste1'>
        <table border = '1'>
            <tr>
                <th>ID da tarefa: </th>
                <th>ID do usuário:</th>
                <th>Prioridade: </th>
                <th>Status: </th>
                <th>Descrição: </th>
                <th>Setor: </th>
                <th>Data de criação:</th>
                <th>Ações: </th>
            </tr>
    ";
    while($row = $resultado -> fetch_assoc()) {
        echo "  
            <tr>
                <td>{$row['id_tarefa']}</td>
                <td>{$row['fk_usuario']}</td>
                <td>{$row['prioridade']}</td>
                <td>{$row['status_tarefa']}</td>
                <td>{$row['descricao_tarefa']}</td>
                <td>{$row['nome_setor']}</td>
                <td>{$row['data_cadastro_tarefa']}</td>
                <td>
                    <a href='atualizar_tarefa.php?id_tarefa={$row['id_tarefa']}'>Editar</a>
                    <a href='deletar_tarefa.php?id_tarefa={$row['id_tarefa']}'>Excluir</a>
                </td>
            </tr>
        ";
    }
    echo "
    </div>
    </table>";
} else {
    echo "Nenhum registro encontrado";
}
$conexao -> close();
?>