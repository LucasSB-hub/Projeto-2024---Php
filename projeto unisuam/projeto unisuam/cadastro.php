<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, inicial-scale=1.0">
        <title>Cadastro</title>
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="css/cadastro.css">
        <style>
            .error {
                color: red;
            }
        </style>
    </head>

    <body>
    
        <div id="background"> <!-- Caixa para definir a margem, a imagem de fundo e as cores. type="text/css" -->
                
            <div class="container">

                <h1>Cadastro</h1> <br>
                
                <section class="form-box"> <!-- Tudo dentro desta div "section" é o formulário contendo todas as caixas de imput. -->

                    <form method="post" action="process_form.php">

                        <div class="caixa">
                            <label for="nome"> <b> Nome Completo:</b> </label><br> 
                                <input type="text" name="nome" required><br><br> <!-- Caixa para registrar o nome completo -->
                        </div>

                        <div class="caixa">
                            <label for="data_nascimento"> <b>Data de Nascimento:</b> </label><br> 
                                <input type="date" name="data_nascimento" required><br><br> <!-- Caixa para registrar a data de nascimento -->
                        </div>

                        <div class="caixa">
                            <label for="sexo"> <b>Sexo:</b> </label><br><br>
                                <select id="sexo" name="sexo" required> 
                                    <option value="F">Feminino</option> 
                                    <option value="M">Masculino</option>
                                </select><br><br> <!-- Caixa para registrar o sexo -->
                        </div>

                        <div class="caixa">
                            <label for="nome_materno"> <b>Nome Materno:</b> </label><br>  
                                <input type="text" name="nome_materno" required><br><br>
                            </div> <!-- Caixa para registrar o nome da mãe -->

                        <div class="caixa">
                            <label for="cpf"> <b>CPF:</b> </label><br> 
                            <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" 
                            maxlength="14" required><br><br> <!-- Caixa para registrar o CPF -->
                        </div>

                        <div class="caixa">
                            <label for="email"> <b>E-mail:</b> </label><br> 
                                <input type="email" name="email" required><br><br> <!-- Caixa para registrar o endereço de e-mail -->
                        </div>

                        <div class="caixa">
                            <label for="telefone_celular"> <b>Número de Celular:</b> </label><br>
                                <input type="text" name="telefone_celular" placeholder="XXYYYYYYYYY" id="telefone_celular" maxlength="15" 
                                required><br><br> <!-- Caixa para registrar o número de celular -->
                        </div>
                        
                        <div class="caixa">
                            <label for="telefone_fixo"> <b>Número de Telefone Fixo:</b> </label><br>
                                <input type="text" name="telefone_fixo" id="telefone_fixo" placeholder="XXYYYYYYYY" maxlength="14" 
                                required><br><br> <!-- Caixa para registrar o número de telefone fixo -->
                        </div>
                        <!--
                        <div class="caixa">
                            <label for="endereco"> <b>Bairro, Complemento, Nº da Casa, Nome da Rua, CEP:</b> </label><br> 
                                <input type="text" placeholder="Endereço Completo" 
                                name="endereco_completo" required><br><br> 
                        </div> -->

                        <div class="caixa">
                            <label for="login"> <b>Login:</b> </label><br>
                                <input type="text" name="login" required><br><br> <!-- Caixa para registrar o nome de usuário/login -->
                        </div>

                        <div class="caixa">
                            <label for="senha"> <b>Senha:</b> </label><br>
                                <input type="password" name="senha" required><br><br> <!-- Caixa para registrar a senha -->
                        </div>

                        <div class="caixa">
                                <label for="confirma_senha"> <b>Confirmação de Senha:</b> </label><br>
                            <input type="password" name="confirma_senha" required><br><br> <!-- Caixa confirmar a senha registrada -->
                        </div>
                       
                        <div class="caixa">
                            <label for="endereco"> <b>Endereço Completo:</b> </label><br> 
                                <input type="text" placeholder="Bairro, Complemento, Nº da Casa, Nome da Rua, CEP" 
                                name="endereco_completo" required><br><br> 
                        </div><br><br>

                        <div id="buttons">
                            <button type="submit">Enviar</button> <!-- Botão para finalizar (submit/Enviar) o cadastro -->
                            <button type="reset">Refazer</button> <!-- Botão para refazer (reset/Limpar Tela) o cadastro -->
                        </div>
                        
                        <div class="skip">
                            <a href="login.php"> Já possui conta? </a>
                        </div> <!-- Link para a página de login, caso o usuário já estiver cadastro -->
                    </form>
                </section>
            </div>
        </div>
        <script src="java/cadastro.js"></script>
    </body>
</html>
