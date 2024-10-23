<?php

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $filePath = '../../database/files/' . $fileName;

    if (file_exists($filePath)) {
        $content = file_get_contents($filePath);
    } else {
        $content = "";
        echo "Arquivo não encontrado.";
        exit;
    }
} 

?>