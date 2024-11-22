<?php
include "../db.php";

$sql = "SELECT * from professores";

$result = $conn -> query($sql)
function vue_data_function() {
    
  }
if($result -> num_rows > 0){
    return $jsonData = json_encode($result -> fetch_assoc());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body id="app">
<table v-if="vue_data.length > 0">
    <tr>
        <th> ID </th>
        <th> Nome Cliente </th>
        <th> Nome Produto </th>
        <th> Qtd. </th>
        <th> Data </th>
        <th></th>
    </tr>
    <tr v-for="item in vue_data">
        <td>{{ item.id }}</td>
        <td>{{ nome_cliente }}</td>
        <td>{{ nome_cliente }}</td>
        <td>{{ nome_cliente }}</td>
        <td>{{ nome_cliente }}</td>
        <td>
            <button type='submit'>Enviar</button>
        </td>
    </tr>
</table>



<script src="node_modules/vue/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                vue_data: <?php vue_data_function() ?>
            }
        });
</script>
</body>
</html>







