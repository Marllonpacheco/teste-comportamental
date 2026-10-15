
<?php
session_start();
require 'conexao.php';

$erro = null;
$nome = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confirmar = $_POST['confirmar'] ?? '';

    if ($nome === '' || $email === '' || $senha === '') {
        $erro = "Preencha todos os campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "E-mail inválido.";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter pelo menos 6 caracteres.";
    } elseif ($senha !== $confirmar) {
        $erro = "As senhas não conferem.";
    } else {
        $stmt = $conn->prepare(
            "SELECT id FROM usuarios WHERE email = ?"
        );
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $erro = "Este e-mail já está cadastrado.";
        } else {
            $hash = password_hash($senha, PASSWORD_DEFAULT);

            $stmt = $conn->prepare(
                "INSERT INTO usuarios (nome, email, senha)
                 VALUES (?, ?, ?)"
            );
            $stmt->execute([$nome, $email, $hash]);

            header("Location: login.php?cadastro=ok");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta - Teste Comportamental</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light">

<div class="container" style="max-width: 420px; margin-top: 60px;">
    <div class="card shadow-sm">
        <div class="card-header text-white text-center"
             style="background-color: #7952b3;">
            Criar conta
        </div>

        <div class="card-body">

            <?php if ($erro): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <label for="nome" class="form-label">Nome</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    class="form-control mb-3"
                    value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>"
                    required
                >

                <label for="email" class="form-label">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control mb-3"
                    value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>"
                    required
                >

                <label for="senha" class="form-label">Senha</label>
                <input
                    type="password"
                    id="senha"
                    name="senha"
                    class="form-control mb-3"
                    minlength="6"
                    required
                >

                <label for="confirmar" class="form-label">
                    Confirmar senha
                </label>
                <input
                    type="password"
                    id="confirmar"
                    name="confirmar"
                    class="form-control mb-3"
                    minlength="6"
                    required
                >

                <button
                    type="submit"
                    class="btn w-100 text-white"
                    style="background-color: #7952b3;"
                >
                    Cadastrar
                </button>
            </form>

            <p class="text-center mt-3 mb-0">
                Já tem conta? <a href="login.php">Entrar</a>
            </p>

        </div>
    </div>
</div>

</body>
</html>
