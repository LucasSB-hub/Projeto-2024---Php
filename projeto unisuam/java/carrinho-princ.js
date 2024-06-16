// Capturar os modais e os botões correspondentes
var paymentModal = document.getElementById('paymentModal');
var cardFormModal = document.getElementById('cardFormModal');
var confirmationModal = document.getElementById('confirmationModal'); // Adição do modal de confirmação
var buttonCard = document.getElementById('cardPayment');

// Capturar os botões "X" dos modais
var closeBtns = document.querySelectorAll('.close');
var closeConfirmationBtn = document.querySelector('#confirmationModal .close'); // Botão "X" do modal de confirmação

// Abrir o modal principal ao clicar no botão "Finalizar Compra"
document.getElementById('payment').addEventListener('click', function() {
    paymentModal.style.display = 'block';
});

// Fechar os modais ao clicar no botão "X" ou fora dos modais
closeBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
        paymentModal.style.display = 'none';
        cardFormModal.style.display = 'none';
        confirmationModal.style.display = 'none'; // Ocultar o modal de confirmação
    });
});

window.addEventListener('click', function(event) {
    if (event.target == paymentModal) {
        paymentModal.style.display = 'none';
    }
    if (event.target == cardFormModal) {
        cardFormModal.style.display = 'none';
    }
    if (event.target == confirmationModal) { // Fechar o modal de confirmação ao clicar fora dele
        confirmationModal.style.display = 'none';
    }
});

// Abrir o modal do formulário ao clicar no botão de pagamento de cartão de crédito
buttonCard.addEventListener('click', function() {
    cardFormModal.style.display = 'block';
});

// Processar o envio do formulário (simulação)
document.getElementById('cardForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    cardFormModal.style.display = 'none'; 
    paymentModal.style.display = 'none'; 
    confirmationModal.style.display = 'block'; // Exibir o modal de confirmação
});

// Fechar o modal de confirmação ao clicar no botão "X"
closeConfirmationBtn.addEventListener('click', function() {
    confirmationModal.style.display = 'none';
});

// Fechar o modal de confirmação ao clicar fora dele
window.addEventListener('click', function(event) {
    if (event.target == confirmationModal) {
        confirmationModal.style.display = 'none';
    }
});