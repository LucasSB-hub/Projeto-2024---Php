<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "cadastro_db";


$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
    if (!$conn) {
        die("Algo deu errado;");
    }
?>
