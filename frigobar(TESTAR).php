<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | Funcionários</title>
    <link rel="stylesheet" href="styleForm.css">
</head>

<body>

<?php
// Definir os preços dos itens
$prices = [
    'agua' => 2.50,       // Preço por unidade de água
    'cerveja' => 5.00,    // Preço por unidade de cerveja
    'refrigerante' => 3.00, // Preço por unidade de refrigerante
    'suco' => 4.00        // Preço por unidade de suco
];

// Função para calcular o total
function calculateTotal($quantities, $prices) {
    $total = 0;
    foreach ($quantities as $item => $quantity) {
        if ($quantity > 0) {
            $total += $quantity * $prices[$item];
        }
    }
    return $total;
}

// Processamento do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta das quantidades dos itens
    $quantities = [
        'agua' => $_POST['agua'] ?? 0,
        'cerveja' => $_POST['cerveja'] ?? 0,
        'refrigerante' => $_POST['refrigerante'] ?? 0,
        'suco' => $_POST['suco'] ?? 0
    ];

    // Calcular o total
    $total = calculateTotal($quantities, $prices);
    echo "<h2>Resumo do Pedido:</h2>";
    echo "<ul>";
    foreach ($quantities as $item => $quantity) {
        if ($quantity > 0) {
            echo "<li>" . ucfirst($item) . ": $quantity unidade(s) - R$ " . number_format($prices[$item] * $quantity, 2, ',', '.') . "</li>";
        }
    }
    echo "<li><strong>Total: R$ " . number_format($total, 2, ',', '.') . "</strong></li>";
    echo "</ul>";
}
?>

<!-- Formulário para selecionar os itens -->
<h1>Selecione seus itens do Frigobar</h1>
<form method="POST" action="">
    <label for="agua">Água (R$ 2,50 cada):</label>
    <input type="number" id="agua" name="agua" min="0" value="0"><br><br>

    <label for="cerveja">Cerveja (R$ 5,00 cada):</label>
    <input type="number" id="cerveja" name="cerveja" min="0" value="0"><br><br>

    <label for="refrigerante">Refrigerante (R$ 3,00 cada):</label>
    <input type="number" id="refrigerante" name="refrigerante" min="0" value="0"><br><br>

    <label for="suco">Suco (R$ 4,00 cada):</label>
    <input type="number" id="suco" name="suco" min="0" value="0"><br><br>

    <button type="submit">Calcular Total</button>
</form>

</body>
</html>