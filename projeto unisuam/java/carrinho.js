// JavaScript para manipular o carrinho
document.addEventListener("DOMContentLoaded", function() {
    // Seleciona todos os botões de adicionar e remover itens
    const incrementButtons = document.querySelectorAll('.qty button:nth-of-type(2)');
    const decrementButtons = document.querySelectorAll('.qty button:nth-of-type(1)');
    const removeButtons = document.querySelectorAll('.remove');

    // Adiciona evento de clique para adicionar itens
    incrementButtons.forEach(button => {
        button.addEventListener('click', function() {
            const quantityElement = this.parentElement.querySelector('span');
            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;
            updateCartTotal();
        });
    });

    // Adiciona evento de clique para remover itens
    decrementButtons.forEach(button => {
        button.addEventListener('click', function() {
            const quantityElement = this.parentElement.querySelector('span');
            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantity--;
                quantityElement.textContent = quantity;
                updateCartTotal();
            }
        });
    });

    // Adiciona evento de clique para remover itens do carrinho
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const row = this.parentElement.parentElement;
            row.parentNode.removeChild(row);
            updateCartTotal();
        });
    });

    // Atualiza o total do carrinho
    function updateCartTotal() {
        let subtotal = 0;
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const price = parseFloat(row.querySelector('td:nth-of-type(4)').textContent.replace('R$ ', ''));
            const quantity = parseInt(row.querySelector('.qty span').textContent);
            subtotal += price * quantity;
        });
        document.getElementById('subtotal').textContent = 'R$ ' + subtotal.toFixed(2);
        document.getElementById('total').textContent = 'R$ ' + subtotal.toFixed(2); // Considerando que o frete seja gratuito
    }
    });