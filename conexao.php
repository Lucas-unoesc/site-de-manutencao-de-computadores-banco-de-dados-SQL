<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "site2026"; // Confira se este é o nome exato do seu banco no phpMyAdmin

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");