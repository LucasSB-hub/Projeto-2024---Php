<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="css/produtos.css">

</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form action="processar_cadastro.php" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required><br><br>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*"><br><br>

        <input type="submit" value="Cadastrar Produto">
        <a class="submit" href="index.php">cadastrar produto</a>
    </form>

    <?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "usuario", "senha", "nome_do_banco");
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    // Upload da foto
    $foto_nome = $_FILES['foto']['name'];
    $foto_temp = $_FILES['foto']['tmp_name'];
    $foto_destino = "uploads/" . $foto_nome;
    move_uploaded_file($foto_temp, $foto_destino);

    // Insere os dados na tabela produtos
    $sql = "INSERT INTO produtos (nome, descricao, preco, foto) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $nome, $descricao, $preco, $foto_destino);

    if ($stmt->execute()) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o produto: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

</body>
</html>
