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

$sql = "SELECT * FROM usuario";

$resultado = $conexao -> query($sql);

if ($resultado -> num_rows > 0) {
    echo "
    <div id='ajuste1'>
        <table border = '1'>
            <tr>
                <th>ID do usuário:</th>
                <th>Nome completo: </th>
                <th>Email: </th>
            </tr>
    ";
    while($row = $resultado -> fetch_assoc()) {
        echo "  
            <tr>
                <td>{$row['id_usuario']}</td>
                <td>{$row['nome_completo']}</td>
                <td>{$row['email']}</td>
            </tr>
        ";
    }
    echo "
    </div>
    </table>";
} else {
    echo "Nenhum usuário encontrado";
}
$conexao -> close();
?>