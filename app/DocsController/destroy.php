<?php
include_once('../middleware/auth.php');
include_once('../../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileName = filter_var(htmlspecialchars($_POST['file_name']));

    $conn = getConnection();

    if (pathinfo($fileName, PATHINFO_EXTENSION) !== 'txt') {
        $fileName .= '.txt';
    }

    // Caminho completo do arquivo
    $filePath = '../../uploads/files/' . $fileName;

    if (file_exists($filePath)) {
        $query = "DELETE FROM upload WHERE file_name = ?";
        $stmt = $conn->prepare($query);

        $stmt->bind_param("s", $fileName);
        $stmt->execute();
        $stmt->close();

        // Excluir o arquivo
        unlink($filePath);
        echo "Arquivo '$fileName' excluído com sucesso!";
    } else {
        echo "Arquivo não encontrado.";
    }

    //header("Location: ../../index.php");
    exit;
}
?>
