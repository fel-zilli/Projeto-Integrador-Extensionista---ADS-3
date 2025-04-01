<?php
$servername = "localhost"; // ou o endereço do seu servidor de banco de dados
$username = "root"; // usuário do banco
$password = ""; // senha do banco, geralmente no XAMPP é vazio
$dbname = "projetofinal"; // nome do banco de dados onde a tabela 'clientes' está

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
