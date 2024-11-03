<?php

$userId = $logado['id'] ?? null;

if (!$userId) {
    echo '<p class="text-center text-xl text-red-500">Usuário não autenticado. Faça login.</p>';
    exit;
}

$conn = getConnection();
$query = "SELECT file_name FROM upload WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($fileName);

// Armazena os arquivos em um array
$files = [];
while ($stmt->fetch()) {
    $files[] = $fileName;
}

$stmt->close();
$conn->close();

?>