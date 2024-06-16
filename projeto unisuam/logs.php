<?php
// Simulação de dados de logs de autenticação
$logs = [
    ['data_hora' => '2024-06-01 08:30:00', 'nome_usuario' => 'João Silva', 'cpf' => '123.456.789-01', 'segundo_fator' => 'Nome da Mãe'],
    ['data_hora' => '2024-06-02 09:00:00', 'nome_usuario' => 'Maria Oliveira', 'cpf' => '234.567.890-12', 'segundo_fator' => 'Numero de Celular'],
    ['data_hora' => '2024-06-03 10:15:00', 'nome_usuario' => 'Carlos Pereira', 'cpf' => '345.678.901-23', 'segundo_fator' => 'Nome da Mãe'],
    // Adicione mais dados conforme necessário
];

// Receber parâmetros da requisição
$search = $_GET['search'];
$filter = $_GET['filter'];

// Filtrar os dados com base nos parâmetros
$filteredLogs = array_filter($logs, function($log) use ($search, $filter) {
    if ($filter == 'nome_usuario' && strpos(strtolower($log['nome_usuario']), strtolower($search)) !== false) {
        return true;
    }
    if ($filter == 'cpf' && strpos($log['cpf'], $search) !== false) {
        return true;
    }
    if ($filter == 'all' && ($search == '' || strpos(strtolower($log['nome_usuario']), strtolower($search)) !== false || strpos($log['cpf'], $search) !== false)) {
        return true;
    }
    return false;
});

// Ordenar os logs por data_hora em ordem decrescente
usort($filteredLogs, function($a, $b) {
    return strtotime($b['data_hora']) - strtotime($a['data_hora']);
});

// Retornar dados como JSON
header('Content-Type: application/json');
echo json_encode($filteredLogs);
?>