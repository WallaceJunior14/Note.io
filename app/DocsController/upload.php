<?php
include_once('../meadleware/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']['name']) && count($_FILES['file']['name']) > 0) {
        $total_files = count($_FILES['file']['name']);
        
        for ($i = 0; $i < $total_files; $i++) {
            $file_tmp = $_FILES['file']['tmp_name'][$i];
            $file_name = $_FILES['file']['name'][$i];
            $file_error = $_FILES['file']['error'][$i];

            
            if ($file_error == 0) {
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $extension = strtolower($extension);

                if ($extension === 'txt') {
                    $directory = '../../uploads/files/';

                    // Mover arquivo para o diretório
                    if (move_uploaded_file($file_tmp, $directory . $file_name)) {
                        echo "Arquivo '{$file_name}' enviado com sucesso.<br>";
                    } else {
                        echo "Erro ao enviar o arquivo '{$file_name}'.<br>";
                    }
                } else {
                    echo "Arquivo '{$file_name}' com extensão inválida. Somente .txt são aceitos.<br>";
                }
            } else {
                echo "Erro no upload do arquivo '{$file_name}'. Código de erro: {$file_error}.<br>";
            }
        }

        header("Location: ../../index.php");
        exit;
    } else {
        echo "Nenhum arquivo foi enviado.";
        exit;
    }
} else {
    echo "Método inválido. Utilize o formulário para enviar dados.";
    exit;
}
?>
