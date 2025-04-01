<?php
require("conecta_cliente.php");

// Pegando os dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$problema = $_POST['problema'];
$descricao = $_POST['descricao'];

// Verificando se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Preparando a consulta SQL com parâmetros para evitar injeção de SQL
$sql = "INSERT INTO clientes (nome, sobrenome, email, problema, descricao) VALUES (?, ?, ?, ?, ?)";

// Usando prepared statement
$stmt = $conn->prepare($sql);

// Verifica se a preparação foi bem-sucedida
if ($stmt === false) {
    die("Erro ao preparar a consulta: " . $conn->error . "<br> SQL: " . $sql);
}

// Bind dos parâmetros (tipo "sssss" representa string para cada parâmetro)
$stmt->bind_param("sssss", $nome, $sobrenome, $email, $problema, $descricao);

// Executando a consulta
if ($stmt->execute()) {
    echo "<center><h1>Cliente Cadastrado com Sucesso</h1>";
    echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
} else {
    echo "<h3>Erro ao cadastrar cliente: </h3>" . $stmt->error . "<br>";
}

// Fechar a declaração
$stmt->close();
?>
