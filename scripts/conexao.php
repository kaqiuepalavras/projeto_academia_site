<?php
$servername = "localhost";
$username = "root"; // Ajuste conforme seu usuário do banco de dados
$password = ""; // Ajuste conforme sua senha do banco de dados
$database = "health";

$conexao = new mysqli($servername, $username, $password, $database);

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
?>