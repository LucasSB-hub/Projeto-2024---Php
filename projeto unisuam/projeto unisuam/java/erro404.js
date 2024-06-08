// Verifica se a página não existe e redireciona para a página de erro
window.addEventListener('error', function(event) {
    if (event.target.tagName === 'A') {
        window.location.href = 'error.html';
    }
}, true);

// Exemplo de função para redirecionamento em caso de erro na busca
function buscarConteudo() {
    // Simula um erro de busca
    const erroNaBusca = true; // Você pode alterar isso para testar

    if (erroNaBusca) {
        window.location.href = 'error.html';
    } else {
        // Lógica para busca bem-sucedida
    }
}
