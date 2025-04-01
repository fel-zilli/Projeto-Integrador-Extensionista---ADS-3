<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Clientes</title>
</head>

<body>
    <center>
        <h1>Clientes Cadastrados</h1>

        <table border="4">
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>SOBRENOME</td>
                <td>EMAIL</td>
                <td>PROBLEMA</td>
                <td>DESCRIÇÃO</td>
                <td>AÇÕES</td>
            </tr>
            <?php
            require("conecta_cliente.php");

            $dados_select = mysqli_query($conn, "SELECT id, nome, sobrenome, email, problema, descricao FROM clientes");

            while($dado = mysqli_fetch_array($dados_select)) {
                echo '<tr>';
                echo '<td>'.$dado['id'].'</td>';
                echo '<td>'.$dado['nome'].'</td>';
                echo '<td>'.$dado['sobrenome'].'</td>';
                echo '<td>'.$dado['email'].'</td>';
                echo '<td>'.$dado['problema'].'</td>';
                echo '<td>'.$dado['descricao'].'</td>';
                echo '<td>
                        <a href="atualiza_cliente.php?id='.$dado['id'].'"><input type="button" value="Atualizar"></a>
                        <a href="deleta_cliente.php?id='.$dado['id'].'"><input type="button" value="Deletar"></a>
                      </td>';
                echo '</tr>';
            }
            ?>
        </table>
        <br />
        <a href="index.html"><input type="button" value="Voltar"></a>
    </center>
</body>

</html>
