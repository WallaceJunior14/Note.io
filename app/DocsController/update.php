<?php
include_once('../middleware/auth.php');
include_once("../../config/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_filename = filter_var(htmlspecialchars($_POST['old_filename']));
    $fileName = filter_var(htmlspecialchars($_POST['file-name']));
    $content = filter_var($_POST['content']);

    if (pathinfo($fileName, PATHINFO_EXTENSION) !== 'txt') {
        $fileName .= '.txt';
    }

     $fileName = basename($fileName);
     $old_filename = basename($old_filename);
 
     $directory = '../../uploads/files/';
     if (!is_dir($directory)) {
        mkdir($directory, 0777, true); 
     }
 
    $oldFilePath = $directory . $old_filename;
    $newFilePath = $directory . $fileName;
 
    $conn = getConnection();

    $query_id = "SELECT id FROM upload WHERE file_name=? LIMIT 1";
    $stmt = $conn->prepare($query_id);
    $stmt->bind_param("s", $old_filename);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->fetch();
    $stmt->close();

    if ($id && file_exists($oldFilePath)) {
        if (rename($oldFilePath, $newFilePath)) {
            $file = fopen($newFilePath, 'w');

            if ($file) {
                fwrite($file, $content);
                fclose($file);

                $query = "UPDATE upload SET file_name=? WHERE id=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("si", $fileName, $id);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo json_encode(["success" => ["message" => "Arquivo renomeado e atualizado com sucesso."]]);
                } else {
                    echo json_encode(["error" => ["message" => "Erro ao atualizar o nome do arquivo no banco de dados."]]);
                }

                $stmt->close();
            } else {
                echo json_encode(["error" => ["message" => "Erro ao abrir o arquivo para escrita."]]);
            }
        } else {
            echo json_encode(["error" => ["message" => "Erro ao renomear o arquivo físico."]]);
        }
    } else {
        echo json_encode(["error" => ["message" => "Arquivo original não encontrado ou ID inválido."]]);
    }

    $conn->close();

    // Redireciona para a página principal
    header("Location: ../../index.php");
    http_response_code(201);
    exit;

} else {
    // Redireciona para a página principal
    echo json_encode(["error" => ["message" => "Método não permitido"]]);
    header("Location: ../../index.php");
    http_response_code(405); 
    exit;
 }
?>