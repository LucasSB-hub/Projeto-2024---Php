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
        <script src="java/cadastro.js"></script>
        <link rel="stylesheet" href="cadastro.css">
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
                                    <option value="M">Masculino</option> 
                                    <option value="F">Feminino</option>
                                    <option value="O">Outro</option>
                                    <option value="P">Prefiro não dizer</option>
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
                        <div class="caixa">
                            <label for="cep"><b>CEP:</b></label><br>
                            <input type="text" name="cep" id="cep" pattern="\d{5}-?\d{3}" 
                            maxlength="9" placeholder="00000-000" required><br><br> <!-- Caixa para registrar o CEP -->
                        </div>
                        <div class="caixa">
                            <label for="logradouro"><b>Logradouro:</b></label><br>
                            <input type="text" name="logradouro" id="logradouro" required><br><br> <!-- Caixa para registrar o logradouro -->
                        </div>
                        <div class="caixa">
                            <label for="cidade"><b>Cidade:</b></label><br>
                            <input type="text" name="cidade" id="cidade" required><br><br> <!-- Caixa para registrar o nome da cidade -->
                        </div>
                        <div class="caixa">
                            <label for="bairro"><b>Bairro:</b></label><br>
                            <input type="text" name="bairro" id="bairro" required><br><br> <!-- Caixa para registrar o nome do bairro -->
                        </div>
                        <div class="caixa">
                            <label for="login"> <b>Login:</b> </label><br>
                                <input type="text" name="login" required><br><br>  <!-- Caixa para registrar o nome de usuário/login -->
                        </div>
                        <div class="caixa">
                            <label for="senha"> <b>Senha:</b> </label><br>
                                <input type="password" name="senha" required><br><br> <!-- Caixa para registrar a senha -->
                        </div>
                        <div class="caixa">
                                <label for="confirma_senha"> <b>Confirmação de Senha:</b> </label><br>
                            <input type="password" name="confirma_senha" required><br><br> <!-- Caixa confirmar a senha registrada -->
                        </div>
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
        <script>
            
        // Adiciona um ouvinte de evento para o campo de entrada de CEP, que dispara quando o campo perde o foco (evento 'blur').
            document.getElementById('cep').addEventListener('blur', function() {
                // Obtém o valor do campo de entrada de CEP e remove todos os caracteres que não são dígitos.
                var cep = this.value.replace(/\D/g, '');
                
                // Verifica se o CEP possui exatamente 8 dígitos.
                if (cep.length === 8) {
                    // Faz uma requisição para a API do ViaCEP utilizando o CEP informado.
                    fetch(`https://viacep.com.br/ws/${cep}/json/`)
                        // Converte a resposta da API para formato JSON.
                        .then(response => response.json())
                        // Processa os dados retornados pela API.
                        .then(data => {
                            // Verifica se não houve erro na resposta da API.
                            if (!data.erro) {
                                // Atualiza os campos do formulário com os dados retornados (logradouro, cidade e bairro).
                                document.getElementById('logradouro').value = data.logradouro;
                                document.getElementById('cidade').value = data.localidade;
                                document.getElementById('bairro').value = data.bairro;
                            } else {
                                // Exibe um alerta se o CEP não for encontrado.
                                alert('CEP não encontrado.');
                            }
                        })
                        // Trata erros que possam ocorrer durante a requisição à API.
                        .catch(error => {
                            console.error('Erro ao buscar o CEP:', error);
                            alert('Erro ao buscar o CEP.');
                        });
                } else {
                    // Exibe um alerta se o CEP não tiver o formato válido (8 dígitos).
                    alert('Formato de CEP inválido.');
                }
            });
        </script>
    </body>
</html>