<?php
include_once('../meadleware/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileName = $_POST['file-name'];
    $content = $_POST['content'];
    $filePath = '../../uploads/files/' . $fileName;

    // Salva o arquivo com o novo conteúdo
    $file = fopen($filePath, 'w');
    fwrite($file, $content);
    fclose($file);

    // Redireciona para a página principal
    header("Location: ../../index.php");
    exit;
}


?>