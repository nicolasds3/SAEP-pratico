<?php
include "db.php";

function vue_data_function($conn) {
    $sql = "SELECT professores.nome, aulas.tipo_materia, aulas.horario, aulas.sala FROM aulas INNER JOIN diaria ON aulas.id = diaria.aula_id INNER JOIN professores ON professores.id = diaria.professor_id;";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return json_encode($data); 
}

$vueData = vue_data_function($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../visual/readstyle.css">
</head>
<body>
    <div id="app">
        <table>
            <tr>
                <th> Nome Professor </th>
                <th> Disciplina </th>
                <th> Horario </th>
                <th> Sala </th>
                <th> Ações </th>
            </tr>
            <tr v-if="vue_data.length > 0" v-for="item in vue_data">
                <td>{{ item.nome }}</td>
                <td>{{ item.tipo_materia }}</td>
                <td>{{ item.horario }}</td>
                <td>{{ item.sala }}</td>
                <td>
                    <button type='submit' class="button button1">Editar</button>
                    <a class='button button1' href="delete.php?id={$row['id']}">Excluir</a>
                </td>
            </tr>
            <tr v-else>
                <td colspan="5" id="noitems">Nenhum item encontrado</td>
            <tr>
        </table>
    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        const vueData = <?php echo $vueData ?>;

        const app = Vue.createApp({
            data() {
            return {
                vue_data: vueData
            }
            }
        })
        app.mount('#app');
    </script>
</body>
</html>
<br>
<a href="create.php">Inserir novo registro.</a>