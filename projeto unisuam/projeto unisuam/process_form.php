<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $nome_materno = trim($_POST['nome_materno']);
    $cpf = trim($_POST['cpf']);
    $email = trim($_POST['email']);
    $telefone_celular = trim($_POST['telefone_celular']);
    $telefone_fixo = trim($_POST['telefone_fixo']);
    $endereco_completo = trim($_POST['endereco_completo']);
    $login = trim($_POST['login']);
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];

    // Validação do Nome
    if (strlen($nome) < 15 || strlen($nome) > 80 || !preg_match("/^[a-zA-Z\s]+$/", $nome)) {
        die("Nome deve ter entre 15 e 80 caracteres alfabéticos.");
    }

    // Validação do CPF
    if (!validaCPF($cpf)) {
        die("CPF inválido.");
    }

    // Validação do Login
    if (strlen($login) != 6 || !ctype_alpha($login)) {
        die("Login deve ter exatamente 6 caracteres alfabéticos.");
    }

    // Validação da Senha
    if (strlen($senha) != 8 || !ctype_alpha($senha)) {
        die("Senha deve ter exatamente 8 caracteres alfabéticos.");
    }

    // Confirmação da Senha
    if ($senha !== $confirma_senha) {
        die("Senhas não conferem.");
    }

    // Criptografia da Senha
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Conexão com o Banco de Dados
    $conn = new mysqli("localhost", "root", "", "cadastro");
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Inserção no Banco de Dados
    $sql = "INSERT INTO usuarios (nome, data_nascimento, sexo, nome_materno, cpf, email, telefone_celular, telefone_fixo, endereco_completo, login, senha)
            VALUES ('$nome', '$data_nascimento', '$sexo', '$nome_materno', '$cpf', '$email', '$telefone_celular', '$telefone_fixo', '$endereco_completo', '$login', '$senha_criptografada')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function validaCPF($cpf) {
    // Remover caracteres especiais
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica se o número de dígitos é igual a 11
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calcula os dígitos verificadores para verificar se o CPF é válido
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}
