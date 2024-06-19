<?php
function generateRandomPassword($length = 8) {
    // Conjunto de caracteres alfabéticos (maiúsculos e minúsculos)
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}

// Definir o cabeçalho de resposta para JSON
header('Content-Type: application/json');

// Gerar a senha e retornar como resposta JSON
echo json_encode(['password' => generateRandomPassword()]);
?>
