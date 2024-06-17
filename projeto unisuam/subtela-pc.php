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
  <title>Loja de Jogos - PC</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/jogospc.css" media="screen" />
  <link rel="shortcut icon" href="img/ESPACE GAMES.png" type="imagem">

<body>
  <header class="text-white text-center p-2" style="background-color: blue;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="pix">
            <i class="fas fa-wallet mr-2"></i>
            Aceitamos Cartões
          </div>
        </div>
      </div>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/ESPACE GAMES.png" alt="Logo" class="mr-2">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <form class="form-inline my-2 my-lg-0 search-bar">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item cart-icon">
            <a class="nav-link" href="carrinho.php"><i class="fas fa-shopping-cart"></i><span class="cart-count">0</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-th"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-submenu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="error.php">PS4</a>
              <a class="dropdown-item" href="error.php">PS5</a>
              <a class="dropdown-item" href="error.php">Xbox-Series</a>
              <a class="dropdown-item" href="error.php">Nintendo</a>
              <a class="dropdown-item" href="subtela-pc.php">PC</a>
              <!-- Adicionar itens para administrador -->
              <?php if ($is_admin): ?>
                <a class="dropdown-item" href="logs_principal.php">Log Master</a>
                <a class="dropdown-item" href="consulta.php">Consulta Master</a>
              <?php endif; ?>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#contatoModal"><i class="fas fa-phone"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#rastreamentoModal"><i class="fas fa-shipping-fast"></i></a>
          </li>
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
        </ul>
      </div>
    </div>
  </nav>

  <!-- Login Modal -->

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


  <!-- Menu Lateral -->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="subtela-ps4.html">PS4</a>
    <a href="subtela-ps5.html">PS5</a>
    <a href="subtela-xbox.html">Xbox-Series</a>
    <a href="subtela-nintendo.html">Nintendo</a>
    <a href="subtela-pc.html">PC</a>
  </div>

  <!-- Desconto Banner -->
  <div class="discount-banner">
    <h3>Aproveite! Descontos Especiais em Jogos de PC!</h3>
  </div>

  <!-- Banner de Imagem -->
  <div class="image-banner">
    <img src="img\desconto2.png" alt="Banner">
  </div>

  <!-- Conteúdo da página -->
  <div class="container mt-3">
    <h2 class="text-center">Jogos de PC</h2>
    <div class="row mt-4">
      <!-- Jogos de PC aqui -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\warzone.webp" alt="Jogo 1">
          <h4>Call of Duty®: Modern Warfare® III</h4>
          <p><s>R$ 299,00</s> R$ 269,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\ghostof.webp" alt="Jogo 2">
          <h4>Ghost of Tsushima<p>ㅤㅤㅤㅤㅤ</p></h4>
          <p><s>R$ 241,50</s> R$ 219,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\gdw3.webp" alt="Jogo 3">
          <h4>God of War Ragnarök<p>ㅤㅤㅤ</p></h4>
          <p><s>R$ 349,90</s> R$ 315,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\horizon.jpg" alt="Jogo 4">
          <h4>Horizon Forbidden West</h4>
          <p><s>R$ 159,00</s> R$ 120,00</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\ronin.webp" alt="Jogo 5">
          <h4>Ronin<p>ㅤㅤㅤㅤㅤㅤㅤㅤㅤ</p></h4>
          <p><s>R$ 172,00</s> R$ 139,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\prince.jpg" alt="Jogo 6">
          <h4>Prince of Persia - The two thrones</h4>
          <p><s>R$ 150,00</s> R$ 129,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\eldenring.jpg" alt="Jogo 6">
          <h4>Elden Ring<p>ㅤㅤㅤㅤㅤㅤㅤㅤ</p></h4>
          <p><s>R$ 150,00</s> R$ 129,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\mortalkombat.jpeg" alt="Jogo 8">
          <h4>Mortal Kombat<p>ㅤㅤㅤㅤㅤㅤㅤㅤ</p></h4>
          <p><s>R$ 220,00</s> R$ 189,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\squadsuicide.jpg" alt="Jogo 9">
          <h4>Suicide Squad - kill the justice league</h4>
          <p><s>R$ 200,00</s> R$ 189,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\hell.jpg" alt="Jogo 10">
          <h4>Hell Drivers 2<p>ㅤㅤㅤㅤㅤㅤㅤㅤ</p></h4>
          <p><s>R$ 116,00</s> R$ 99,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\watch.jpg" alt="Jogo 11">
          <h4>Watch Dogs 2<p>ㅤㅤㅤㅤㅤㅤ</p></h4>
          <p><s>R$ 185,00</s> R$ 165,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="game">
          <img src="img\godofwar.jpg" alt="Jogo 12">
          <h4>God of War<p>ㅤㅤㅤㅤㅤㅤ</p></h4>
          <p><s>R$ 166,70</s> R$ 149,99</p>
          <button class="add-to-cart-btn" onclick="addToCart()">Adicionar ao carrinho</button>
        </div>
      </div>
    
      </div>
    </div>
  </div>

  <footer class="mt-5 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <hr style="border-top: 1px solid white;">
        </div>
        <div class="col-md-6">
          <p class="text-white">Conteúdo</p>
          <p class="text-white">Fale conosco</p>
          <p class="text-white">Sobre nós</p>
          <p class="text-white">Ouvidoria</p>
          <p class="text-white">Atendimento on-line</p>
        </div>
        <div class="col-md-6">
          <ul class="social-icons text-center">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Modal de Contato -->
  <div class="modal fade" id="contatoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Modal de Contato -->
  </div>

  <!-- Modal de Rastreamento -->
  <div class="modal fade" id="rastreamentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Modal de Rastreamento -->
  </div>

  <!-- Modal de Login -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Modal de Login -->
  </div>

  <!-- Scripts -->
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