<?php
require("conecta_cliente.php");

if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    $query = "SELECT * FROM clientes WHERE id = '$id_cliente'";
    $resultado = mysqli_query($conn, $query);
    $cliente = mysqli_fetch_array($resultado);

    if (!$cliente) {
        echo "<h2>Cliente não encontrado!</h2>";
        exit;
    }
} else {
    echo "<h2>ID inválido!</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
</head>
<body>
    <center>
        <h1>Atualizar Cliente</h1>
        <form action="atualiza_cliente_action.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
            <label for="nome">Nome</label><br>
            <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>"><br>
            <label for="sobrenome">Sobrenome</label><br>
            <input type="text" name="sobrenome" value="<?php echo $cliente['sobrenome']; ?>"><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" value="<?php echo $cliente['email']; ?>"><br>
            <label for="problema">Problema</label><br>
            <input type="text" name="problema" value="<?php echo $cliente['problema']; ?>"><br>
            <label for="descricao">Descrição</label><br>
            <textarea name="descricao"><?php echo $cliente['descricao']; ?></textarea><br><br>
            <button type="submit">Atualizar</button>
        </form>
    </center>
</body>
</html>
