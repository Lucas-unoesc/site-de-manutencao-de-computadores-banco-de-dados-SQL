<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contatos.html");
    exit;
}

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "site2026"; // Altere para o nome exato do seu banco no XAMPP

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$mensagem = trim($_POST["mensagem"] ?? "");

if ($nome === "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || $mensagem === "") {
    echo "Preencha nome, um e-mail válido e mensagem.";
    exit;
}

$stmt = $conexao->prepare(
    "INSERT INTO contatos (nome, email, mensagem) VALUES (?, ?, ?)"
);
$stmt->bind_param("sss", $nome, $email, $mensagem);

if ($stmt->execute()) {
    echo "Mensagem enviada com sucesso para a GlitchTech!";
} else {
    echo "Erro ao salvar: " . $stmt->error;
}

$stmt->close();
$conexao->close();