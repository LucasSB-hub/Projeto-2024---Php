document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('consulta-button').addEventListener('click', function() {
        window.location.href = 'consulta.php';
    });

    document.getElementById('log-button').addEventListener('click', function() {
        window.location.href = 'index.php';
    });
});
