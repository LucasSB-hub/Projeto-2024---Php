document.addEventListener('DOMContentLoaded', function() {
    const questions = [
        "Qual é o nome da sua mãe?",
        "Qual é a data do seu aniversário?",
        "Qual o CEP do seu endereço?"
    ];

    const questionElement = document.getElementById('security-question');
    const randomQuestion = questions[Math.floor(Math.random() * questions.length)];
    questionElement.textContent = randomQuestion;

    const submitButton = document.getElementById('submit-button');
    submitButton.addEventListener('click', function() {
        const answer = document.getElementById('answer').value;
        if (answer.trim() !== '') {
            window.location.href = 'recuperacao.html';
        } else {
            alert('Por favor, responda a pergunta de segurança.');
        }
    });
});
