<?php

function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "noteio";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Erro de conexão: " . mysqli_connect_error());
    }
    return $conn;
}