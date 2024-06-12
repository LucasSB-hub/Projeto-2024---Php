<?php
$servername = "localhost";
$username = "root";
$password = ""; // Defina a senha do seu servidor MySQL
$dbname = "cadastro_db"; // Nome do banco de dados que pode ser alterado ou crie outro banco

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>