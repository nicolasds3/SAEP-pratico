<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];

    $sql_usuario = "INSERT INTO usuario (nome_completo, email) VALUES ('$nome_completo', '$email')";

    if ($conexao -> query($sql_usuario) === true) {
        echo "<div id='verde'>Cadastro criado com sucesso!</div>";
        header("Location: criar_tarefa.php");
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
    <title>Faça seu cadastro!</title>
    <link rel="stylesheet" href="styles.css">
</head>
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
<body>
    <form action="#" method="POST">
        <div class="margem">
            <label>Seu nome completo:</label>
            <input type="text" name="nome_completo" placeholder="Seu nome completo!">
        </div>
        <div class="margem">
            <label>Seu email:</label>
            <input type="email" name="email" placeholder="Seu email!">
        </div>
        <div>
            <input type="submit" value="enviar">
        </div>
    </form>
</body>
</html>