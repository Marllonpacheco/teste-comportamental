<?php
/* ==========================================================
   dados/perguntas.php — TODO (aluno)
   Monte aqui o array $perguntas com as 24 perguntas do enunciado.
   Estrutura sugerida:

   $perguntas = [
     [
       'texto' => 'Quando surge um problema inesperado, eu costumo...',
       'alternativas' => [
         ['texto' => '...', 'perfil' => 'aguia'],
         ['texto' => '...', 'perfil' => 'gato'],
         ['texto' => '...', 'perfil' => 'lobo'],
         ['texto' => '...', 'perfil' => 'tubarao'],
       ]
     ],
     // demais perguntas...
   ];
   ========================================================== */
$perguntas = [
    [
        'pergunta' => 'Quando surge um problema inesperado, eu costumo...',
        'alternativas' => [
            'A' => ['texto' => 'Pensar em uma solução inovadora e diferente.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Conversar com outras pessoas para buscar apoio.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Analisar as informações antes de decidir.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Agir rapidamente para resolver o problema.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Em um trabalho em grupo, eu normalmente...',
        'alternativas' => [
            'A' => ['texto' => 'Imagino possibilidades que ninguém pensou.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Animo o grupo e facilito a comunicação.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Organizo tarefas, prazos e informações.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Assumo a frente para fazer o trabalho avançar.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Quando recebo uma tarefa nova, minha primeira reação é...',
        'alternativas' => [
            'A' => ['texto' => 'Imaginar o resultado ideal e novas possibilidades.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Pensar em quem poderá trabalhar comigo.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Entender regras, requisitos e critérios.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Definir o que precisa ser feito imediatamente.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Eu me sinto mais motivado quando...',
        'alternativas' => [
            'A' => ['texto' => 'Posso criar, inventar ou experimentar.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Estou cercado de pessoas e boas conversas.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Tenho organização, clareza e segurança.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Tenho uma meta desafiadora para alcançar.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Quando preciso tomar uma decisão importante...',
        'alternativas' => [
            'A' => ['texto' => 'Penso no futuro e nas oportunidades.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Considero como a decisão afetará as pessoas.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Procuro dados e evidências antes de decidir.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Escolho a alternativa que gera resultado mais rápido.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Meu ambiente de trabalho ideal é...',
        'alternativas' => [
            'A' => ['texto' => 'Flexível, criativo e aberto a novidades.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Dinâmico, colaborativo e cheio de interação.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Organizado, previsível e bem estruturado.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Orientado a metas e com liberdade para executar.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Quando alguém apresenta uma ideia nova...',
        'alternativas' => [
            'A' => ['texto' => 'Fico interessado em explorar suas possibilidades.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Quero conversar sobre a ideia com a equipe.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Pergunto como ela funcionará e quais são os riscos.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Quero saber quando podemos colocá-la em prática.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Em relação a prazos, eu...',
        'alternativas' => [
            'A' => ['texto' => 'Prefiro liberdade para desenvolver a melhor ideia.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Procuro combinar prazos que funcionem para todos.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Planejo as etapas para não deixar nada de fora.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Faço o necessário para entregar o quanto antes.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Quando cometo um erro...',
        'alternativas' => [
            'A' => ['texto' => 'Penso em como transformar o erro em uma nova oportunidade.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Converso com alguém para entender melhor a situação.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Analiso exatamente onde ocorreu a falha.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Corrijo e sigo em frente rapidamente.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Quando aprendo algo novo, prefiro...',
        'alternativas' => [
            'A' => ['texto' => 'Explorar e descobrir possibilidades por conta própria.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Aprender conversando e trocando experiências.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Seguir uma sequência clara e bem explicada.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Aprender fazendo e testando imediatamente.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Durante uma discussão, eu geralmente...',
        'alternativas' => [
            'A' => ['texto' => 'Apresento novas perspectivas para mudar a forma de pensar.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Busco manter um clima positivo entre as pessoas.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Uso fatos e argumentos para organizar a discussão.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Vou direto ao ponto e tento chegar a uma decisão.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Se eu tivesse que organizar um evento, eu começaria...',
        'alternativas' => [
            'A' => ['texto' => 'Imaginando como poderia ser um evento diferente.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Pensando no público e nas pessoas envolvidas.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Montando uma lista de tarefas, recursos e prazos.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Definindo a meta do evento e partindo para a execução.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Uma característica que mais reconheço em mim é...',
        'alternativas' => [
            'A' => ['texto' => 'Criatividade.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Comunicação.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Organização.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Determinação.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Quando recebo muitas informações ao mesmo tempo...',
        'alternativas' => [
            'A' => ['texto' => 'Procuro identificar ideias e possibilidades.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Comento e compartilho as informações com outras pessoas.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Classifico e organizo tudo antes de utilizar.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Seleciono rapidamente o que é necessário para agir.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Em uma situação de pressão...',
        'alternativas' => [
            'A' => ['texto' => 'Tento enxergar uma saída diferente.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Procuro apoio e mantenho as pessoas unidas.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Volto aos fatos, prioridades e procedimentos.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Concentro-me na solução e no resultado.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Quando trabalho em um projeto longo...',
        'alternativas' => [
            'A' => ['texto' => 'Imagino como o projeto pode evoluir no futuro.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Valorizo a interação e o envolvimento da equipe.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Controlo etapas, documentação e detalhes.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Foco em metas e entregas concretas.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Se uma regra atrapalha o trabalho...',
        'alternativas' => [
            'A' => ['texto' => 'Questiono a regra e penso em uma alternativa.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Converso com os envolvidos para entender a situação.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Verifico por que a regra existe e suas consequências.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Procuro uma forma prática de resolver o problema.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Quando preciso apresentar um trabalho...',
        'alternativas' => [
            'A' => ['texto' => 'Quero mostrar uma visão criativa e marcante.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Quero envolver e conquistar quem está ouvindo.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Quero garantir que todas as informações estejam corretas.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Quero ser objetivo e mostrar os resultados.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Ao receber um feedback...',
        'alternativas' => [
            'A' => ['texto' => 'Penso em novas maneiras de melhorar.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Presto atenção à forma como a pessoa percebe meu trabalho.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Analiso ponto a ponto o que precisa ser ajustado.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Escolho o que posso mudar imediatamente.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Em uma equipe, eu costumo contribuir mais com...',
        'alternativas' => [
            'A' => ['texto' => 'Ideias e novas possibilidades.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Motivação e relacionamento.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Planejamento e controle.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Execução e tomada de decisão.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Quando um plano não funciona...',
        'alternativas' => [
            'A' => ['texto' => 'Crio rapidamente uma nova possibilidade.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Converso com a equipe para buscar alternativas.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Analiso o que saiu errado antes de refazer.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Mudo a estratégia e parto para a ação.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'O que mais me incomoda em um projeto é...',
        'alternativas' => [
            'A' => ['texto' => 'Não poder inovar.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Falta de colaboração entre as pessoas.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Desorganização e falta de informações.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Lentidão e falta de resultados.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Se eu pudesse escolher uma função em uma equipe, seria...',
        'alternativas' => [
            'A' => ['texto' => 'Pessoa responsável por criar soluções e visão.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Pessoa responsável por comunicação e integração.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Pessoa responsável por planejamento e organização.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Pessoa responsável por execução e resultados.', 'perfil' => 'tubarao'],
        ],
    ],
    [
        'pergunta' => 'Ao terminar uma tarefa importante, eu penso primeiro...',
        'alternativas' => [
            'A' => ['texto' => 'Em como poderíamos fazer algo ainda melhor.', 'perfil' => 'aguia'],
            'B' => ['texto' => 'Em compartilhar o resultado com as pessoas.', 'perfil' => 'gato'],
            'C' => ['texto' => 'Em conferir se tudo foi feito corretamente.', 'perfil' => 'lobo'],
            'D' => ['texto' => 'Em qual é o próximo objetivo.', 'perfil' => 'tubarao'],
        ],
    ],
];
