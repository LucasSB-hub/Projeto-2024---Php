<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$questions = [
    "Qual o nome da sua mãe?" => "nome_materno",
    "Qual a data do seu nascimento?" => "data_nascimento",
    "Qual o CEP do seu endereço?" => "cep"
];

if (!isset($_SESSION['question'])) {
    // Seleciona uma pergunta aleatória
    $random_question = array_rand($questions);
    $_SESSION['question'] = $random_question;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_SESSION['login'];
    $answer = trim($_POST['security_answer']);
    $question = $_SESSION['question'];
    $field = $questions[$question];

    // Conexão com o Banco de Dados
    $conn = new mysqli("localhost", "root", "", "cadastro");
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta no Banco de Dados para verificar a resposta de segurança
    $sql = "SELECT $field FROM usuarios WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_answer);
        $stmt->fetch();

        if (strcasecmp($answer, $stored_answer) == 0) {
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['attempts'] += 1;
            if ($_SESSION['attempts'] >= 3) {
                echo "3 tentativas sem sucesso! Favor realizar Login novamente.";
                session_destroy();
                header("Refresh: 3; url=login.php");
                exit();
            } else {
                echo "Resposta de segurança incorreta. Tentativas restantes: " . (3 - $_SESSION['attempts']);
            }
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação de Dois Fatores</title>
    <link rel="stylesheet" href="css/2fa.css">
</head>
<body>
    <div class="container">
        <h1>Autenticação de Dois Fatores</h1>
        <form method="post" action="">
            <label for="security_question"><?php echo htmlspecialchars($_SESSION['question']); ?></label>
            <input type="text" id="security_answer" name="security_answer" placeholder="Sua resposta" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
