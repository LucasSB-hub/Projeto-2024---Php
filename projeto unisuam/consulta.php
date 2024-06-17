<?php
session_start();

$is_logged_in = false;
$username = '';
$is_admin = false; // Definindo a variável $is_admin

if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
    $is_logged_in = true;
    $username = $_SESSION['login'];

    // Verifica se o usuário é o administrador (exemplo)
    if ($username === 'adm11') {
        $is_admin = true;
    }
}

// Função para fazer logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/consulta.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/jogospc.css" media="screen" />
    <link rel="shortcut icon" href="img/ESPACE GAMES.png" type="imagem">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/ESPACE GAMES.png" alt="Logo" class="mr-2">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="form-inline my-2 my-lg-0 search-bar">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <?php if (!$is_logged_in): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="fas fa-user"></i></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($is_logged_in): ?>
                    <li class="nav-item">
                        <span class="nav-link">Olá, <?php echo htmlspecialchars($username); ?></span>
                    </li>
                    <li class="nav-item">
                        <form method="post" class="logout-form">
                            <button type="submit" name="logout" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item cart-icon">
                        <a class="nav-link" href="carrinho.php"><i class="fas fa-shopping-cart"></i><span
                                class="cart-count">0</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-th"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-submenu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="error.php">PS4</a>
                          <a class="dropdown-item" href="error.php">PS5</a>
                          <a class="dropdown-item" href="error.php">Xbox-Series</a>
                          <a class="dropdown-item" href="error.php">Nintendo</a>
                          <a class="dropdown-item" href="subtela-pc.php">PC</a>
                          <?php if ($is_admin): ?>
                              <a class="dropdown-item" href="logs_principal.php">Log Master</a>
                              <a class="dropdown-item" href="consulta.php">Consulta Master</a>
                          <?php endif; ?>
                      </div>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#contatoModal"><i
                                class="fas fa-phone"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#rastreamentoModal"><i
                                class="fas fa-shipping-fast"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


  <!-- Contato Modal -->
  <div class="modal fade" id="contatoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Fale Conosco</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Telefone: (11) 3333-3330</p>
          <p>Whatsapp: (21) 99065-9955</p>
          <p>Discord: spacegamesbr</p>
          <p>E-mail: spacegamesbr@gmail.com</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Rastreamento Modal -->
  <div class="modal fade" id="rastreamentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rastreamento de Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="codigoPedido">Digite o código do seu pedido:</label>
              <input type="text" class="form-control" id="codigoPedido">
            </div>
            <button type="submit" class="btn btn-primary">Rastrear</button>
          </form>
        </div>
      </div>
    </div>
  </div>

    <div class="dashboard">
        <h1>Admin Dashboard</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexão com o banco de dados
                $conn = new mysqli("localhost", "root", "", "cadastro");
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }

                // Consulta SQL para recuperar todos os usuários exceto o Administrador Master
                $sql = "SELECT id, nome FROM usuarios WHERE nome <> 'Administrador Master'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output dos dados na tabela HTML
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>";
                        echo "<button onclick='deleteUser(" . $row['id'] . ")'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum registro encontrado.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function deleteUser(id) {
            if (confirm('Você realmente quer deletar este Usuario?')) {
                // Redireciona para a página que irá processar a exclusão
                window.location.href = 'excluir_usuario.php?id=' + id;
            }
        }
    </script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>
</body>
</html>
