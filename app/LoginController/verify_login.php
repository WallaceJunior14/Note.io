<?php

session_start();
ini_set('display_errors', true);

include_once("../../config/database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var(htmlspecialchars($_POST['email']));
    $password = filter_var(htmlspecialchars($_POST['password']));

    if (empty($email) || empty($password)) {
        die(json_encode(["error" => ["message" => "Email e senha devem estar preenchidos"]]));
    }

    $conn = getConnection();

    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = $user;
            echo json_encode(["success" => ["message" => "Login realizado com sucesso"]]);
            header("Location: ../../index.php");
        } else {
            echo json_encode(["error" => ["message" => "Senha incorreta"]]);
            header("Location: http://localhost/UTFPR-Web-Servidor/Noteio/views/login/login.php");
        }
    } else {
        echo json_encode(["error" => ["message" => "Usuário não encontrado"]]);
        header("Location: http://localhost/UTFPR-Web-Servidor/Noteio/views/login/login.php?error=login");
    }

    $stmt->close();
    $conn->close();
}
?>
