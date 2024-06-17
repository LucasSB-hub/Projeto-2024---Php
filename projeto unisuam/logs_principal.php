<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs de Autenticação</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="container">
        <img src="img/logo.jpg" alt="logo" id="logo">
        <h1>Logs de Autenticação</h1>
        <form id="searchForm" method="GET" action="">
            <input type="text" id="searchInput" name="search" placeholder="Digite o nome ou CPF">
            <select id="filterOption" name="filter">
                <option value="all">Todos</option>
                <option value="nome_usuario">Nome do Usuário</option>
                <option value="cpf">CPF</option>
            </select>
            <button type="submit">Buscar</button>
        </form>
        <table id="logsTable">
            <thead>
                <tr>
                    <th>Data e Hora</th>
                    <th>Nome do Usuário</th>
                    <th>CPF</th>
                    <th>Pergunta 2FA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexão com o Banco de Dados
                $conn = new mysqli("localhost", "root", "", "cadastro");
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }
                
                $filter = $_GET['filter'] ?? 'all'; // Valor padrão é 'all' se nenhum filtro for selecionado
                $search = $_GET['search'] ?? '';

                // Consulta SQL para recuperar os registros da tabela usuarios, excluindo o usuário "Administrador Master"
                if ($filter == 'all') {
                    $sql = "SELECT data_criacao, nome, cpf, security_question FROM usuarios WHERE nome <> 'Administrador Master'";
                } elseif ($filter == 'nome_usuario') {
                    $sql = "SELECT data_criacao, nome, cpf, security_question FROM usuarios WHERE nome <> 'Administrador Master' AND nome LIKE '%$search%'";
                } elseif ($filter == 'cpf') {
                    $sql = "SELECT data_criacao, nome, cpf, security_question FROM usuarios WHERE nome <> 'Administrador Master' AND cpf LIKE '%$search%'";
                }

                $result = $conn->query($sql);

                // Verifica se há resultados e exibe na tabela de logs
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['data_criacao'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['cpf'] . "</td>";
                        echo "<td>" . $row['security_question'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum registro encontrado.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
