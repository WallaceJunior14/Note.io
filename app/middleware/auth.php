<?php
session_start();

// Verifica se a sessão de login existe e está válida
if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
    // Redireciona para a página de login com caminho absoluto a partir da raiz
    header('Location: http://localhost/UTFPR-Web-Servidor/Noteio/views/login/login.php');
}

// Filtra a variável de sessão para garantir segurança
$logado = $_SESSION['login'];

