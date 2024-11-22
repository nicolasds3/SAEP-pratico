<?php
include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $sala = $_POST['sala'];
        $tipo_materia = $_POST['tipo_materia'];
        $horario = $_POST['horario'];

        $sql_professor = "INSERT INTO professores (nome) VALUE ('$nome')";
        $conn -> query($sql_professor);
        $professor_id = $conn -> insert_id;

        $sql_aula = "INSERT INTO aulas (sala, tipo_materia, horario) VALUES ('$sala', '$tipo_materia', '$horario')";
        $conn -> query($sql_aula);
        $aula_id = $conn -> insert_id;

        $sql_diaria = "INSERT INTO diaria (professor_id, aula_id) VALUE ('$professor_id', '$aula_id')";

        if ($conn -> query($sql_diaria) === true) {
            echo "<br/>" . "Novo registro criado com sucesso!!!";
        } else {
            echo "Erro: " . $sql . "<br/>" . $conn -> error;
        }
    }

    $conn -> close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="../visual/styles.css">
</head>
<body>
    <div>
        <h1>Adicionar Diária</h1>
        <form method="POST" action="create.php">
            <label for="nome">Nome do Professor: </label>
            <input type="text" name="nome" required>
            <br>
            <label for="sala">Número da sala: </label>
            <input type="number" name="sala" required>
            <br>
            <label for="tipo_materia">Matéria lecionada: </label>
            <input type="text" name="tipo_materia" required>
            <br>
            <label for="horario">Horário da aula: </label>
            <input type="time" name="horario" required>
            <br>
            <button type="submit">Adicionar</button>
        </form>
    </div>
</body>
</html>
<br>
<a href="read.php">Ver registros.</a>