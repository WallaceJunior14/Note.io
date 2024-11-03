<?php
include_once("../middleware/auth.php");
include_once("../../config/database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    # Conversão para texto e sanetização nos campos
    $name = filter_var(htmlspecialchars($_POST['name']));
    $email = filter_var(htmlspecialchars($_POST['email']));
    $password = filter_var(htmlspecialchars($_POST['password']));

    if (empty($email) || empty($password)) {
        die(json_encode(["error" => ["message" => "Email e senha devem estar preenchidos"]]));
    }

    $pass_hash = password_hash($password, PASSWORD_DEFAULT);

    $conn = getConnection();

    $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$pass_hash')";

    if (mysqli_query($conn, $sql)) {
        die(json_encode(["success" => ["message" => "Usuario cadastrado com sucesso"]]));
        header("Location: ../../views/login.php");
    } else {
        die(json_encode(["error" => ["message" => mysqli_error($conn)]]));
    }

    mysqli_close($conn);
} else {
    die(json_encode(["error" => ["message" => "Metodo de requisição não permoitido"]]));
}
