<?php
include '../../banco/conexoes/conexao.php';

$sql = "SELECT * FROM tarefas";

$resultado = $conexao -> query($sql);

if ($resultado -> num_rows > 0) {
    echo "
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
                    <a href='atualizar_tarefa.php?'>Editar</a>
                    <a href='deletar_tarefa.php?id={$row['id']}'>Excluir</a>
                </td>
            </tr>
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado";
}
$conexao -> close();
?>
<br>
<a href="criar_tarefa.php">Inserir nova tarefa.</a>