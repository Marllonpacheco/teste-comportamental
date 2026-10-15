
<?php

$host = "localhost";
$banco = "teste_comportamental";
$usuario = "root";
$senha = "";

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    error_log("Erro de conexão com o banco: " . $e->getMessage());
    exit("Não foi possível conectar ao banco de dados.");
}
