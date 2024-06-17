<?php
// Verifica se foi enviado um ID via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "cadastro");

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Verifica se o usuário a ser excluído é o Master (não permitido)
    $sql_check = "SELECT nome FROM usuarios WHERE id = $id";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        $row = $result_check->fetch_assoc();
        if ($row['nome'] === 'Administrador Master') {
            echo "Usuário Master não pode ser excluído.";
        } else {
            // Query para excluir o usuário
            $sql_delete = "DELETE FROM usuarios WHERE id = $id";
            if ($conn->query($sql_delete) === TRUE) {
                echo "Usuário excluído com sucesso.";
            } else {
                echo "Erro ao excluir usuário: " . $conn->error;
            }
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
} else {
    echo "ID do usuário não especificado.";
}
?>
