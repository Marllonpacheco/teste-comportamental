<?php
/* ==========================================================
   resultado.php — Tela do resultado (FRONT-END PRONTO, com dados de exemplo)

   TODO (aluno):
   1. Receber $_POST, validar nome e as 24 respostas (se inválido, voltar ao teste)
   2. Somar os pontos de cada perfil (aguia, gato, lobo, tubarao)
   3. Descobrir o maior valor e os perfis predominantes (tratar EMPATE)
   4. Calcular o percentual: pontos / 24 * 100 (formatar com 1 ou 2 casas)
   5. Substituir os valores fixos abaixo por variáveis PHP
   6. Se houver empate: usar a classe "empate" em .destaque e o título
      "Resultado combinado: Águia + Lobo"
   7. Perfil único: trocar a classe de cor (aguia | gato | lobo | tubarao)
      no .destaque e no .descricao
   8. O CÁLCULO DEVE SER FEITO NO PHP (não vale usar JavaScript)
   ========================================================== */
require_once __DIR__ . '/dados/perguntas.php';

// Perfis e suas descrições
$perfis = [
    'aguia' => [
        'nome' => 'Águia',
        'caracteristica' => 'Sonhador / Inovador',
        'descricao' => 'Criativo, visionário, gosta de mudanças, inovação e possibilidades futuras. Pode ter muitas ideias e menor atenção aos detalhes.'
    ],
    'gato' => [
        'nome' => 'Gato',
        'caracteristica' => 'Comunicativo / Relacional',
        'descricao' => 'Valoriza a comunicação, os relacionamentos e a interação com outras pessoas.'
    ],
    'lobo' => [
        'nome' => 'Lobo',
        'caracteristica' => 'Organizado / Planejador',
        'descricao' => 'Valoriza o planejamento, a organização, os processos e a atenção aos detalhes.'
    ],
    'tubarao' => [
        'nome' => 'Tubarão',
        'caracteristica' => 'Executor / Prático',
        'descricao' => 'Valoriza a ação, a praticidade, a execução das tarefas e a busca por resultados.'
    ]
];

// Se alguém acessar esta página sem enviar o formulário,
// retorna à página inicial.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$respostas = $_POST['respostas'] ?? [];

$erroNome = ($nome === '');
$erroRespostas = false;

// Verifica se todas as perguntas foram respondidas
// e se cada resposta corresponde a uma alternativa válida.
foreach ($perguntas as $indice => $pergunta) {
    if (
        !is_array($respostas) ||
        !isset($respostas[$indice]) ||
        !is_string($respostas[$indice])
    ) {
        $erroRespostas = true;
        continue;
    }

    $respostaValida = false;

    foreach ($pergunta['alternativas'] as $alternativa) {
        if ($respostas[$indice] === $alternativa['perfil']) {
            $respostaValida = true;
            break;
        }
    }

    if (!$respostaValida) {
        $erroRespostas = true;
    }
}

// Se houver erro, mostra novamente o teste.
if ($erroNome || $erroRespostas) {
    require __DIR__ . '/teste.php';
    exit;
}

// Inicializa a pontuação dos quatro perfis.
$pontos = [
    'aguia' => 0,
    'gato' => 0,
    'lobo' => 0,
    'tubarao' => 0
];

// Soma um ponto para o perfil escolhido em cada pergunta.
foreach ($perguntas as $indice => $pergunta) {
    $perfilEscolhido = $respostas[$indice];
    $pontos[$perfilEscolhido]++;
}

// Descobre a maior pontuação.
$maiorPontuacao = max($pontos);

// Identifica todos os perfis que atingiram a maior pontuação.
$vencedores = [];

foreach ($pontos as $perfil => $pontuacao) {
    if ($pontuacao === $maiorPontuacao) {
        $vencedores[] = $perfil;
    }
}

// Prepara o título e a classe visual do resultado.
$nomesVencedores = [];

foreach ($vencedores as $perfil) {
    $nomesVencedores[] = $perfis[$perfil]['nome'];
}

$empate = count($vencedores) > 1;

if ($empate) {
    $tituloResultado = 'Resultado combinado: '
        . implode(' + ', $nomesVencedores);
    $classeDestaque = 'empate';
} else {
    $perfilVencedor = $vencedores[0];
    $tituloResultado = $perfis[$perfilVencedor]['nome'];
    $classeDestaque = $perfilVencedor;
}

$totalPerguntas = count($perguntas);

// Calcula o percentual de cada perfil.
$percentuais = [];

foreach ($pontos as $perfil => $pontuacao) {
    $percentuais[$perfil] =
        ($totalPerguntas > 0)
            ? ($pontuacao / $totalPerguntas) * 100
            : 0;
}

function escapar($valor) {
    return htmlspecialchars(
        (string) $valor,
        ENT_QUOTES,
        'UTF-8'
    );
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seu resultado — Teste de perfil</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">

    <section class="destaque <?= escapar($classeDestaque) ?>">
        <div class="pequeno">
            <?= escapar($nome) ?>,
            <?php if ($empate): ?>
                você teve
            <?php else: ?>
                seu perfil predominante é
            <?php endif; ?>
        </div>

        <h1><?= escapar($tituloResultado) ?></h1>

        <?php 
        $perfilVencedor = $vencedores[0];
        if ($empate): ?>
            <p>Dois ou mais perfis empataram com a maior pontuação.</p>
            <p>
                Pontuação máxima:
                <?= $maiorPontuacao ?> pontos ·
                <?= number_format(
                    $percentuais[$vencedores[0]],
                    1,
                    ',',
                    '.'
                ) ?>%
            </p>
        <?php else: ?>
            <p>
                <strong>
                    <?= escapar($perfis[$perfilVencedor]['caracteristica']) ?>
                </strong>
                —
                <?= $pontos[$perfilVencedor] ?> pontos ·
                <?= number_format(
                    $percentuais[$perfilVencedor],
                    1,
                    ',',
                    '.'
                ) ?>%
            </p>
        <?php endif; ?>
    </section>

    <section class="painel">
        <h2>Sua pontuação</h2>

        <ul class="placar">
            <?php foreach ($pontos as $perfil => $pontuacao): ?>
                <?php
                $percentual = $percentuais[$perfil];
                ?>

                <li class="<?= escapar($perfil) ?>">
                    <div class="linha">
                        <span><?= escapar($perfis[$perfil]['nome']) ?></span>
                        <span>
                            <?= $pontuacao ?> pontos ·
                            <?= number_format($percentual, 1, ',', '.') ?>%
                        </span>
                    </div>

                    <div class="trilho">
                        <span style="width: <?= number_format($percentual, 2, '.', '') ?>%"></span>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <h2>
            <?= $empate
                ? 'Descrições dos perfis predominantes'
                : 'Descrição do perfil predominante' ?>
        </h2>

        <?php foreach ($vencedores as $perfil): ?>
            <div class="descricao <?= escapar($perfil) ?>">
                <h3>
                    <?= escapar($perfis[$perfil]['nome']) ?>
                    — <?= escapar($perfis[$perfil]['caracteristica']) ?>
                </h3>

                <p><?= escapar($perfis[$perfil]['descricao']) ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <div class="acoes">
        <a class="btn" href="index.php">Fazer o teste novamente</a>
        <button class="btn secundario" type="button"
                onclick="window.print()">
            Imprimir resultado
        </button>
    </div>

</main>
</body>
</html>