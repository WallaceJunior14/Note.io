<?php
include_once('../meadleware/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileName = $_POST['file-name'];
    $content = $_POST['content'];

    if (pathinfo($fileName, PATHINFO_EXTENSION) !== 'txt') {
        $fileName .= '.txt';
    }

    $directory = '../../uploads/files/';

    $filePath = $directory . $fileName;

    $file = fopen($filePath, 'w');

    if ($file) {
        fwrite($file, $content);
        fclose($file);

        echo "Arquivo '$fileName' foi salvo com sucesso!";
        header("Location: ../../index.php");
    } else {
        echo "Erro ao abrir o arquivo para escrita.";
        exit;
    }
} else {
    echo "Método inválido. Utilize o formulário para enviar dados.";
    exit;
}
?>
