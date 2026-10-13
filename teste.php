<?php
/* ==========================================================
   teste.php — Tela das perguntas (FRONT-END PRONTO)
   Aqui só existe o layout de UMA pergunta de exemplo.

   TODO (aluno):
   1. Criar o array $perguntas em dados/perguntas.php e fazer o require aqui
   2. Gerar os cartões .pergunta com foreach (24 perguntas, 4 alternativas cada)
   3. Cada <input type="radio"> de uma pergunta compartilha o MESMO name
      (ex.: name="respostas[0]") e o value guarda o PERFIL da alternativa
   4. Validar no servidor: nome preenchido e as 24 perguntas respondidas
   5. Se faltar resposta, reexibir o teste com .alerta e marcar
      o cartão faltante com a classe "sem-resposta"
   6. (Desafio) embaralhar as alternativas sem perder o perfil
   ========================================================== */
// Carrega as perguntas cadastradas no arquivo de dados.
require_once __DIR__ . '/dados/perguntas.php';

// Recebe o nome enviado pela página inicial.
$nome = trim($_POST['nome'] ?? '');

// Permite exibir avisos quando o teste for reaberto
// após uma validação feita no resultado.php.
$erroNome = isset($erroNome) ? $erroNome : ($nome === '');
$erroRespostas = $erroRespostas ?? false;

// Recupera respostas anteriores, se existirem.
$respostasAnteriores = $_POST['respostas'] ?? [];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste de perfil — perguntas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="topo-progresso">
    <div class="container" style="padding: 0">
        <div class="texto">
            <span>Olá, <?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?></span>
            <span id="contador">0 de <?= count($perguntas) ?> respondidas</span>
        </div>

        <div class="barra">
            <span id="preenchimento"></span>
        </div>
    </div>
</div>

<main class="container">

    <h1 class="titulo-pagina">Escolha uma alternativa por pergunta</h1>

    <?php if ($erroNome): ?>
        <div class="alerta" role="alert">
            <strong>Informe seu nome para continuar.</strong>
            Preencha o campo abaixo.
        </div>
    <?php endif; ?>

    <?php if ($erroRespostas): ?>
        <div class="alerta" role="alert">
            <strong>Faltam perguntas sem resposta.</strong>
            Responda todas para ver seu resultado.
        </div>
    <?php endif; ?>

    <form action="resultado.php" method="post" id="form-teste">

        <?php if ($erroNome): ?>
            <label class="campo" for="nome">Seu nome</label>
            <input
                type="text"
                id="nome"
                name="nome"
                value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>"
                required
            >
        <?php else: ?>
            <input
                type="hidden"
                name="nome"
                value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>"
            >
        <?php endif; ?>

        <?php foreach ($perguntas as $indice => $pergunta): ?>

            <?php
            $respostaAtual = $respostasAnteriores[$indice] ?? '';
            $semResposta = $erroRespostas && $respostaAtual === '';
            ?>

            <fieldset
                class="pergunta <?= $semResposta ? 'sem-resposta' : '' ?>"
                style="margin-left: 0; margin-right: 0"
            >
                <legend class="numero" style="padding: 0">
                    Pergunta <?= $indice + 1 ?> de <?= count($perguntas) ?>
                </legend>

                <h2>
                    <?= htmlspecialchars(
                        $pergunta['pergunta'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </h2>

                <?php foreach ($pergunta['alternativas'] as $letra => $alternativa): ?>

                    <label class="opcao">
                        <input
                            type="radio"
                            name="respostas[<?= $indice ?>]"
                            value="<?= htmlspecialchars(
                                $alternativa['perfil'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>"
                            <?= $respostaAtual === $alternativa['perfil'] ? 'checked' : '' ?>
                           
                        >

                        <span>
                            <?= $letra ?>)
                            <?= htmlspecialchars(
                                $alternativa['texto'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>
                        </span>
                    </label>

                <?php endforeach; ?>

            </fieldset>

        <?php endforeach; ?>

        <div class="acoes">
            <button class="btn" type="submit">
                Ver meu resultado
            </button>
        </div>

    </form>

</main>

<script>
const formulario = document.getElementById('form-teste');
const contador = document.getElementById('contador');
const preenchimento = document.getElementById('preenchimento');
const totalPerguntas = <?= count($perguntas) ?>;

function atualizarProgresso() {
    const respondidas = formulario.querySelectorAll(
        'input[type="radio"]:checked'
    ).length;

    contador.textContent = `${respondidas} de ${totalPerguntas} respondidas`;

    const percentual = (respondidas / totalPerguntas) * 100;
    preenchimento.style.width = `${percentual}%`;
}

formulario.addEventListener('change', atualizarProgresso);
atualizarProgresso();
</script>

</body>
</html>
