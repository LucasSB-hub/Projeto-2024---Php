<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "cadastro";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nova_senha = $_POST['nova_senha'];
    $repita_senha = $_POST['repita_senha'];

    // Verifica se as senhas são iguais
    if ($nova_senha === $repita_senha) {
        $hash_senha = password_hash($nova_senha, PASSWORD_DEFAULT);

        // Atualiza a senha no banco de dados
        $sql = "UPDATE usuarios SET senha='$hash_senha' WHERE nome='$nome' AND email='$email'";
        
        if ($conn->query($sql) === TRUE) {
            $message = "Senha atualizada com sucesso! <a href='login.php'>Clique aqui para fazer login</a>.";
        } else {
            $message = "Erro ao atualizar a senha: " . $conn->error;
        }
    } else {
        $message = "As senhas não coincidem. Por favor, tente novamente.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperação de senha</title>
    <link rel="stylesheet" href="css/recuperacao.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Recuperação de senha</h2>
                <p class="description description-primary">Para efetuar a troca de senha de usuário</p>
                <p class="description description-primary">Preencha os requerimentos necessários!</p>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Recuperar senha</h2>
                <?php if ($message) : ?>
                    <p class="error-message"><?php echo $message; ?></p>
                <?php endif; ?>
                <form class="form" method="POST" action="">
                    <label class="label-input" for="nome">
                        <input type="text" name="nome" placeholder="Nome" required>
                    </label>
                    
                    <label class="label-input" for="email">
                        <input type="email" name="email" placeholder="Email" required>
                    </label>
                    
                    <label class="label-input" for="nova_senha">
                        <input type="password" name="nova_senha" placeholder="Digite a nova senha:" required>
                    </label>

                    <label class="label-input" for="repita_senha">
                        <input type="password" name="repita_senha" placeholder="Repita a nova senha:" required>
                    </label>
                    
                    <button class="btn btn-second" type="submit">Concluir</button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
    </div>
</body>
</html>
