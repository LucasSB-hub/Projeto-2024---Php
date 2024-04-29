// Função para formatar CPF
function formatarCPF(cpf) {
    return cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
}

// Função para validar CPF
function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g,'');
    if(cpf == '') return false;
    // Elimina CPFs invalidos conhecidos
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
            return false;
    // Valida o primeiro digito verificador
    add = 0;
    for (i=0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida o segundo digito verificador
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}

// Função para formatar número de telefone
function formatarTelefoneFixo(numero) {
    return numero.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
}

// Função para formatar número de celular
function formatarCelular(numero) {
    return numero.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
}

window.onload = function () {
    // Referências aos campos do formulário
    var cpfInput = document.getElementById('cpf');
    var celularInput = document.getElementById('celular');
    var telefoneFixoInput = document.getElementById('telefone_fixo');
    var senhaInput = document.getElementById('senha');
    var confirmarSenhaInput = document.getElementById('confirmacao_senha');
    var formulario = document.getElementById('cadastro');

    // Event listener para formatar CPF enquanto o usuário digita
    cpfInput.addEventListener('input', function (event) {
        cpfInput.value = formatarCPF(cpfInput.value.replace(/\D/g, ''));
    });

    // Event listener para formatar número de celular enquanto o usuário digita
    celularInput.addEventListener('input', function (event) {
        celularInput.value = formatarCelular(celularInput.value.replace(/\D/g, ''));
    });

    // Event listener para formatar número de telefone fixo enquanto o usuário digita
    telefoneFixoInput.addEventListener('input', function (event) {
        telefoneFixoInput.value = formatarTelefoneFixo(telefoneFixoInput.value.replace(/\D/g, ''));
    });

    // Event listener para submissão do formulário
    formulario.addEventListener('submit', function (event) {
        event.preventDefault(); // Evita a submissão padrão do formulário

        // Validar se as senhas são iguais
        if (senhaInput.value !== confirmarSenhaInput.value) {
            alert('As senhas não coincidem.');
            return;
        }

        // Validar CPF
        if (!validarCPF(cpfInput.value.replace(/\D/g, ''))) {
            alert('Por favor, insira um CPF válido.');
            return;
        }

        // Armazenar os dados no LocalStorage
        localStorage.setItem('nome', document.getElementById('nome').value);
        localStorage.setItem('nome_materno', document.getElementById('nome_materno').value);
        localStorage.setItem('cpf', cpfInput.value.replace(/\D/g, ''));
        localStorage.setItem('data_nascimento', document.getElementById('data_nascimento').value);
        localStorage.setItem('sexo', document.getElementById('sexo').value);
        localStorage.setItem('celular', celularInput.value.replace(/\D/g, ''));
        localStorage.setItem('telefone_fixo', telefoneFixoInput.value.replace(/\D/g, ''));
        localStorage.setItem('endereco', document.getElementById('endereco').value);
        localStorage.setItem('email', document.getElementById('email').value);
        localStorage.setItem('nome_usuario', document.getElementById('nome_usuario').value);
        localStorage.setItem('senha', senhaInput.value);

/* ATENÇÃO: 
Este enorme bloco de comentário contém o código que inicia o processo de Autenticação em Dois Fatores (2FA), mas é apenas provisório, 
pois não servidor em backend para fazê-lo funcionar. Veja o código abaixo (para facilitar a leitura, remova a marcação de bloco de comentário, 
mas certifique-se de refazê-la):

    // Iniciar processo de autenticação em dois fatores, mas para que seja devidamente efetuado, é necessário ter um servidor em backend
        iniciarAutenticacaoDoisFatores();
    });


    // Função para iniciar o processo de autenticação em dois fatores
    function iniciarAutenticacaoDoisFatores() {
        // Enviar código de verificação (exemplo: via alerta)
        var codigoVerificacao = gerarCodigoVerificacao();
        alert('Um código de verificação foi enviado para o seu dispositivo: ' + codigoVerificacao);


        // Pedir ao usuário para inserir o código de verificação
        var codigoInserido = prompt('Por favor, insira o código de verificação enviado para o seu dispositivo:');


        // Verificar se o código inserido pelo usuário está correto
        if (codigoInserido === codigoVerificacao) {
            // Se o código estiver correto, autenticar o usuário
            alert('Autenticação bem-sucedida! Você foi autenticado com sucesso.');
            // Aqui você pode redirecionar o usuário para a próxima página ou realizar outras ações após a autenticação bem-sucedida
        } else {
            // Se o código estiver incorreto, informar ao usuário e negar o acesso
            alert('Código de verificação incorreto. Acesso negado.');
        }
    }
}

FIM DO BLOCO DE COMENTÁRIO*/

        // Redirecionar para a página de login (tela de Ana) após o armazenamento dos dados
        window.location.href = "login.html";
    });
}

        // JavaScript adicional do Miguel
        let menu = document.querySelector('#menu-icon');
        let navlist = document.querySelector('.navlist');

        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navlist.classList.toggle('open')
}