<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT professor_id, aula_id FROM diaria WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($professor_id, $aula_id);
        $stmt->fetch();

        $sql_delete_diaria = "DELETE FROM diaria WHERE id = ?";
        $stmt_delete = $conn->prepare($sql_delete_diaria);
        $stmt_delete->bind_param("i", $id);
        $stmt_delete->execute();

        $sql_check_aula = "SELECT COUNT(*) FROM diaria WHERE aula_id = ?";
        $stmt_check = $conn->prepare($sql_check_aula);
        $stmt_check->bind_param("i", $aula_id);
        $stmt_check->execute();
        $stmt_check->bind_result($count);
        $stmt_check->fetch();

        if ($count == 0) {
            $sql_delete_aula = "DELETE FROM aulas WHERE id = ?";
            $stmt_delete_aula = $conn->prepare($sql_delete_aula);
            $stmt_delete_aula->bind_param("i", $aula_id);
            $stmt_delete_aula->execute();
        }

        $sql_check_professor = "SELECT COUNT(*) FROM diaria WHERE professor_id = ?";
        $stmt_check_prof = $conn->prepare($sql_check_professor);
        $stmt_check_prof->bind_param("i", $professor_id);
        $stmt_check_prof->execute();
        $stmt_check_prof->bind_result($count_prof);
        $stmt_check_prof->fetch();

        if ($count_prof == 0) {
            $sql_delete_professor = "DELETE FROM professores WHERE id = ?";
            $stmt_delete_professor = $conn->prepare($sql_delete_professor);
            $stmt_delete_professor->bind_param("i", $professor_id);
            $stmt_delete_professor->execute();
        }

        echo "Registro deletado com sucesso.";
    } else {
        echo "Registro não encontrado.";
    }

    $stmt->close();
} else {
    echo "ID não especificado.";
}

$conn->close();
?>
