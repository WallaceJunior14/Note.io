<?php
include_once('../meadleware/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileName = $_POST['file'];

    // Caminho completo do arquivo
    $filePath = '../../uploads/files/' . $fileName;

    if (file_exists($filePath)) {
        // Excluir o arquivo
        unlink($filePath);
        echo "Arquivo '$fileName' excluído com sucesso!";
    } else {
        echo "Arquivo não encontrado.";
    }

    header("Location: ../../index.php");
    exit;
}
?>
