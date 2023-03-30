<?php
    // Deixe essas duas linhas. Caso contrário, o navegador não vai conseguir rodar os testes.
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    // Deixe isso. Vai te ajudar.
    date_default_timezone_set("America/Sao_Paulo");
    $hoje = (new DateTimeImmutable("now"))->setTime(0, 0, 0, 0);

/*
Exercício 2 - Formulário, parte 1.

Crie uma página PHP com as seguintes características:
- 1. Os campos recebidos por POST são: "nome", "sexo" e "data-nascimento".
- 2. Sempre devolva uma página HTML completa e bem formada (o teste sempre vai passar ela num validador).
- 3. Se os dados estiverem todos bem formados, coloque dentro do <body>, apenas uma tag <p> contendo o seguinte:
     [Nome] é ["um garoto" ou "uma garota"] de [x] anos de idade.
- 4. Se os dados não estiverem todos bem-formado, coloque dentro do <body>, apenas uma tag <p> contendo o texto "Errado".
- 5. Os únicos valores válidos para o campo "sexo" são "M" e "F".
- 6. O campo "data-nascimento" está no formato "yyyy-MM-dd" e deve corresponder a uma data válida.
     - As partes do mês e do dia devem ter 2 dígitos casa e a do ano deve ter 4 dígitos.
- 7. A data de nascimento não pode estar no futuro e nem ser de mais de 120 anos no passado.
- 8. Espaços à direita ou a esquerda do nome devem ser ignorados. O nome nunca deve estar em branco.
- 9. Se qualquer dado não aparecer no POST, isso é considerado um erro.

Dica:
- Procure no material que o professor já deixou pronto.
*/
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>ado - php</title>
</head>
<body>
<?php
if (!isset($_POST['nome'], $_POST['sexo'], $_POST['data-nascimento'])) {
    echo "<p>Errado</p>";
    exit;
}

$nome = trim($_POST['nome']);

if (empty($nome)) {
    echo "<p>Errado</p>";
    exit;
}

$sexo = $_POST['sexo'];
if ($sexo !== 'M' && $sexo !== 'F') {
    echo "<p>Errado</p>";
    exit;
}

$data_nascimento = $_POST['data-nascimento'];
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_nascimento)) {
    echo "<p>Errado</p>";
    exit;

}

    if ($sexo === 'M') {
        $genero = "um garoto";
    } else {
        $genero = "uma garota";
    }


echo "<p>$nome é $genero de $idade anos de idade.</p>"
?>
</body>
</html>