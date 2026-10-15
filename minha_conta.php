
<?php
require 'verifica_login.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Minha conta</title>
</head>
<body>
    <h1>Minha conta</h1>

    <p>
        Olá,
        <?= htmlspecialchars(
            $_SESSION['usuario_nome'],
            ENT_QUOTES,
            'UTF-8'
        ) ?>!
    </p>

    <a href="logout.php">Sair</a>
    <a href="index.php">Voltar ao teste</a>
</body>
</html>
