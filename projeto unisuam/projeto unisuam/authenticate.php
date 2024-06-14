<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST['login']);
    $senha = $_POST['senha'];

    // Conexão com o Banco de Dados
    $conn = new mysqli("localhost", "root", "", "cadastro");
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta no Banco de Dados
    $sql = "SELECT senha FROM usuarios WHERE login = '$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            echo "Login bem-sucedido!";
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
}
?>