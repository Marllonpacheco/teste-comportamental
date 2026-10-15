
<?php
session_start();

if (isset($_GET['limpar'])) {
    $_SESSION = [];
    session_destroy();

    header("Location: diagnostico_sessao.php");
    exit;
}

if (isset($_GET['criar'])) {
    session_regenerate_id(true);
    $_SESSION['usuario_id'] = 999;
    $_SESSION['usuario_nome'] = 'Teste de Sessão';

    header("Location: diagnostico_sessao.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Diagnóstico de sessão</title>
</head>
<body>
    <h1>Diagnóstico de sessão</h1>

    <p>
        ID da sessão:
        <?= htmlspecialchars(session_id(), ENT_QUOTES, 'UTF-8') ?>
    </p>

    <p>
        Usuário na sessão:
        <?= htmlspecialchars(
            $_SESSION['usuario_nome'] ?? 'Nenhum',
            ENT_QUOTES,
            'UTF-8'
        ) ?>
    </p>

    <p>
        <a href="?criar=1">Criar sessão de teste</a>
    </p>

    <p>
        <a href="?limpar=1">Limpar sessão de teste</a>
    </p>
</body>
</html>
