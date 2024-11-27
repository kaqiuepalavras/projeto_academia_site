-- Cria o banco de dados manualmente
CREATE DATABASE IF NOT EXISTS health;
USE health;

-- Cria a tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nm_user VARCHAR(150) NOT NULL,
    email_user VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(90) NOT NULL
);

<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "health";

// Cria conexão
$conn = new mysqli($servername, $username, $password);

// Checa conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cria o banco de dados
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists<br/>";
} else {
    echo "Error creating database: " . $conn->error . "<br/>";
}

// Seleciona o banco de dados
$conn->select_db($dbname);

// Cria a tabela usuarios
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nm_user VARCHAR(150) NOT NULL,
    email_user VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(90) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'usuarios' created successfully or already exists";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

