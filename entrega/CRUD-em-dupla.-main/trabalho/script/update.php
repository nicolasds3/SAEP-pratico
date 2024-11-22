<?php
<?php
include "db.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sala = $_POST['sala'];
    $tipo_materia = $_POST['tipo_materia'];
    $horario = $_POST['horario'];
    
    $sql_diaria = "SELECT professor_id, aula_id FROM diaria WHERE id = $id";
    $conn -> query($sql_diaria);

    $id_professor = $conn -> professor_id;
    $id_aula = $conn -> aula_id;

     $sql_professor = "UPDATE professores SET nome = $nome WHERE id = $id_professor";
     $conn -> query($sql_professor);

     $sql_aula = "UPDATE aulas SET sala = $sala, tipo_materia = $tipo_materia, horario = $horario WHERE id = $id_aula";
     $conn -> query($sql_aula);

     if ($conn -> query($sql_aula) === true) {
         echo "<br/>" . "Novo registro criado com sucesso!!!";
     } else {
         echo "Erro: " . $sql . "<br/>" . $conn -> error;
     }
}
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
<h1>Adicionar Diária</h1>
<form method="POST" action="update.php">
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
</body>
</html>
<br>
<a href="read.php">Ver registros.</a>


?>