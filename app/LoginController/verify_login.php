<?php

session_start();
ini_set('display_errors', true);

$email = $_POST["email"];
$password = $_POST["password"];

if ($email === "admin@admin.com"  && $password === "123") {
    $_SESSION['login'] = $email;

    header("location: ../../index.php");
} else {
    unset($_SESSION['login']);
    header("location: ../../views/login/login.php?error=login");
}

?>