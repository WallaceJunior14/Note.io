<?php
include_once('../middleware/auth.php');
include_once("../../config/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileName = filter_var(htmlspecialchars($_POST['file-name']));
    $content = filter_var($_POST['content']);

    $conn = getConnection();
    
    if (pathinfo($fileName, PATHINFO_EXTENSION) !== 'txt') {
        $fileName .= '.txt';
    }
    
    $conn = getConnection();

    // Verifica se já existe um documento com o mesmo nome e renomeia adicionando "(1)", "(2)", etc.
    $baseFileName = $fileName;
    $index = 1;
    $query_count = "SELECT COUNT(*) AS total_records FROM upload WHERE file_name = ?";
    $stmt = $conn->prepare($query_count);

    $stmt->bind_param("s", $fileName);
    $stmt->execute();
    $stmt->bind_result($total_records);
    $stmt->fetch();
    $stmt->close();

    while ($total_records > 0) {
        $fileName = pathinfo($baseFileName, PATHINFO_FILENAME) . "($index).txt";
        $stmt = $conn->prepare($query_count);
        $stmt->bind_param("s", $fileName);
        $stmt->execute();
        $stmt->bind_result($total_records);
        $stmt->fetch();
        $stmt->close();
        $index++;
    }

    $fileName = basename($fileName);

    $directory = '../../uploads/files/';
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true); 
    }

    $filePath = $directory . $fileName;
    $datetime = date("Y-m-d h:i:s");

    $file = fopen($filePath, 'w');
    if ($file) { 
        fwrite($file, $content);
        fclose($file);

        $query = "INSERT INTO upload (file_name, user_id, created_at) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        if (isset($logado['id'])) {
            $userId = $logado['id'];
        } else {
            echo json_encode(["error" => ["message" => "Usuário não autenticado"]]);
            exit;
        }

        $stmt->bind_param("sis", $fileName, $userId, $datetime);
        $stmt->execute();

       if ($stmt->affected_rows > 0) {
            echo json_encode(["success" => ["message" => "Arquivo salvo e registrado com sucesso."]]);
        } else {
            echo json_encode(["error" => ["message" => "Erro ao registrar o arquivo no banco de dados."]]);
        }

        $stmt->close();
        $conn->close();

    } else {
        echo json_encode(["error" => ["message" => "Erro ao abrir o arquivo para escrita."]]);
        exit;
    }

    // Redireciona para a página principal
    header("Location: ../../index.php");
    exit;
} else {
    echo json_encode(["error" => ["message" => "Método não permitido"]]);
    header("Location: ../../index.php");
    http_response_code(405);
    exit;
}
?>
