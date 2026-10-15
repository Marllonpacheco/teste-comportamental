
<?php
session_start();
require 'conexao.php';

$erro = null;
$sucesso = isset($_GET['cadastro']) && $_GET['cadastro'] === 'ok';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($email === '' || $senha === '') {
        $erro = "Preencha o e-mail e a senha.";
    } else {
        $stmt = $conn->prepare(
            "SELECT id, nome, email, senha
             FROM usuarios
             WHERE email = ?"
        );

        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_regenerate_id(true);

            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            header("Location: index.php");
            exit;
        } else {
            $erro = "E-mail ou senha inválidos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar - Teste Comportamental</title>

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
            Entrar no Sistema
        </div>

        <div class="card-body">

            <?php if ($sucesso): ?>
                <div class="alert alert-success">
                    Conta criada! Faça login para continuar.
                </div>
            <?php endif; ?>

            <?php if ($erro !== null): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <label for="email" class="form-label">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control mb-3"
                    required
                >

                <label for="senha" class="form-label">Senha</label>
                <input
                    type="password"
                    id="senha"
                    name="senha"
                    class="form-control mb-3"
                    required
                >

                <button
                    type="submit"
                    class="btn w-100 text-white"
                    style="background-color: #7952b3;"
                >
                    Entrar
                </button>
            </form>

            <p class="text-center mt-3 mb-0">
                Ainda não tem conta?
                <a href="cadastro.php">Criar conta</a>
            </p>

        </div>
    </div>
</div>

</body>
</html>
