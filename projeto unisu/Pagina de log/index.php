<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs de Autenticação</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,900;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav id="sidebar">
        <div id="sidebar_content">
            <div id="user">
                <img src="img/icon cometa.jpg" id="user_avatar" alt="Avatar">
                <p id="user_infos">
                    <span class="item-description">
                        Fulano de Tal
                    </span>
                    <span class="item-description">
                        Lorem Ipsum
                    </span>
                </p>
            </div>
            <ul id="side_items">
                <li class="side-item active">
                    <a href="#">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="item-description">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-user"></i>
                        <span class="item-description">
                            Usuários
                        </span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-bell"></i>
                        <span class="item-description">
                            Notificações
                        </span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-box"></i>
                        <span class="item-description">
                            Produtos
                        </span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-image"></i>
                        <span class="item-description">
                            Imagens
                        </span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-gear"></i>
                        <span class="item-description">
                            Configurações
                        </span>
                    </a>
                </li>
            </ul>
            <button id="open_btn">
                <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <div id="logout">
            <button id="logout_btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="item-description">
                    Logout
                </span>
            </button>
        </div>
    </nav>

    <div class="container">
        <img src="img/logo.jpg" alt="logo" id="logo">
        <h1>Logs de Autenticação</h1>
        <form id="searchForm">
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
                    <th>2FA</th>
                </tr>
            </thead>
            <tbody>
                <!-- Resultados da busca serão inseridos aqui -->
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            fetchLogs();
        });

        function fetchLogs() {
            const searchInput = document.getElementById('searchInput').value;
            const filterOption = document.getElementById('filterOption').value;

            fetch(`logs.php?search=${searchInput}&filter=${filterOption}`)
                .then(response => response.json())
                .then(data => {
                    const tbody = document.querySelector('#logsTable tbody');
                    tbody.innerHTML = '';
                    data.forEach(log => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${log.data_hora}</td>
                            <td>${log.nome_usuario}</td>
                            <td>${log.cpf}</td>
                            <td>${log.segundo_fator}</td>
                        `;
                        tbody.appendChild(row);
                    });
                });
        }
    </script>
    <script src="javascript/navbar.js"></script>
</body>
</html>
