// Função para formatar CPF
function formatarCPF(cpf) {
    return cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
}

// Função para formatar número de telefone
function formatartelefone_fixo(numero) {
    return numero.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
}

// Função para formatar número de celular
function formatartelefone_celular(numero) {
    return numero.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
}

window.onload = function () {
    // Referências aos campos do formulário
    var cpfInput = document.getElementById('cpf');
    var telefone_celularInput = document.getElementById('telefone_celular');
    var telefone_fixoInput = document.getElementById('telefone_fixo');
    // Event listener para formatar CPF enquanto o usuário digita
    cpfInput.addEventListener('input', function (event) {
        cpfInput.value = formatarCPF(cpfInput.value.replace(/\D/g, ''));
    });
    // Event listener para formatar número de celular enquanto o usuário digita
    telefone_celularInput.addEventListener('input', function (event) {
        telefone_celularInput.value = formatartelefone_celular(telefone_celularInput.value.replace(/\D/g, ''));
    });

    // Event listener para formatar número de telefone fixo enquanto o usuário digita
    telefone_fixoInput.addEventListener('input', function (event) {
        telefone_fixoInput.value = formatartelefone_fixo(telefone_fixoInput.value.replace(/\D/g, ''));
    });
}
