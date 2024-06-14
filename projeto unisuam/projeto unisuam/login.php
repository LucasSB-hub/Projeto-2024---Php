<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> login </title>
        <link rel="stylesheet" href="css/recuperacao.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
            integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
            <link rel="shortcut icon" href="img/ESPACE GAMES.png" type="imagem">
        </head>
    <body>

    <div class="container">

        <div class="content first-content">

            <div class="first-column">
                <h2 class="title title-primary"> olá, jogador!  </h2>
                <p class="description description-primary">Para se conectar</p>
                <p class="description description-primary">Faça login com seus dados no site! </p>
            </div>    

            <div class="second-column">

                <h2 class="title title-second"> login </h2>

                <form class="form" method="post" action="authenticate.php">

                    <label class="label-input" for="">
                        <input type="text" name="login" placeholder="login">
                    </label>
                    
                    <label class="label-input" for="">
                        <input type="password" name="senha" placeholder="senha">
                    </label>

                    <a class="password" href="cadastro.php"> Não tem conta? Clique aqui! </a>
                    <a class="password" href="2fa.html">Esqueceu sua Senha?</a>
                    
                    
                    <button class="btn btn-second" type="submit">concluir</button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <script src="java/login.js"></script>
    </body>
</html>
