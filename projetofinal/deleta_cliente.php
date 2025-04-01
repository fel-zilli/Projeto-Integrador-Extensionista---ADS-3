<?php
require("conecta_cliente.php");

if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    // Excluir o cliente do banco de dados
    $delete_query = "DELETE FROM clientes WHERE id = '$id_cliente'";

    if (mysqli_query($conn, $delete_query)) {
        echo "<h2>Cliente excluído com sucesso!</h2>";
        echo "<a href='visualiza_cliente.php'><input type='button' value='Voltar'></a>";
    } else {
        echo "Erro ao excluir cliente: " . mysqli_error($conn);
    }
} else {
    echo "<h2>Cliente não encontrado para exclusão.</h2>";
}
?>
