<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Boleto</title>
    <link rel="stylesheet" href="styleForm.css">
</head>

<body>

    <h1>Preencha os Dados para Gerar o Boleto</h1>

    <form action="" method="POST">
        <label for="nome_cliente">Nome do Cliente:</label>
        <input type="text" name="nome_cliente" id="nome_cliente" required><br><br>

        <label for="cpf_cliente">CPF do Cliente:</label>
        <input type="text" name="cpf_cliente" id="cpf_cliente" required><br><br>

        <label for="vencimento">Data de Vencimento:</label>
        <input type="date" name="vencimento" id="vencimento" required><br><br>

        <label for="valor">Valor do Boleto:</label>
        <input type="text" name="valor" id="valor" required><br><br>

        <label for="nosso_numero">Nosso Número:</label>
        <input type="text" name="nosso_numero" id="nosso_numero" required><br><br>

        <label for="codigo_banco">Código do Banco:</label>
        <input type="text" name="codigo_banco" id="codigo_banco" required><br><br>

        <button type="submit" name="gerar_boleto">Gerar Boleto</button>
    </form>

    <?php
    if (isset($_POST['gerar_boleto'])) {
        // Captura os dados do formulário
        $nome_cliente = $_POST['nome_cliente'];
        $cpf_cliente = $_POST['cpf_cliente'];
        $vencimento = $_POST['vencimento'];
        $valor = $_POST['valor'];
        $nosso_numero = $_POST['nosso_numero'];
        $codigo_banco = $_POST['codigo_banco'];

        // Formatação do valor para "R$"
        $valor_formatado = "R$ " . number_format($valor, 2, ',', '.');

        // Gerar o boleto em HTML
        echo "<h2>Boleto Gerado</h2>";
        echo "<table border='1' style='width: 100%; border-collapse: collapse;'>";
        echo "<tr><th colspan='2'>Dados do Boleto</th></tr>";
        echo "<tr><td><strong>Nome do Cliente</strong></td><td>$nome_cliente</td></tr>";
        echo "<tr><td><strong>CPF do Cliente</strong></td><td>$cpf_cliente</td></tr>";
        echo "<tr><td><strong>Data de Vencimento</strong></td><td>$vencimento</td></tr>";
        echo "<tr><td><strong>Valor</strong></td><td>$valor_formatado</td></tr>";
        echo "<tr><td><strong>Nosso Número</strong></td><td>$nosso_numero</td></tr>";
        echo "<tr><td><strong>Código do Banco</strong></td><td>$codigo_banco</td></tr>";
        echo "</table>";

        // Layout do Boleto (simplificado)
        echo "<h3>Visualização do Boleto</h3>";
        echo "<div style='border: 1px solid #000; padding: 20px; width: 600px; margin-top: 20px;'>";
        echo "<h4>Banco: $codigo_banco</h4>";
        echo "<p><strong>Nosso Número: </strong>$nosso_numero</p>";
        echo "<p><strong>Cliente: </strong>$nome_cliente</p>";
        echo "<p><strong>CPF: </strong>$cpf_cliente</p>";
        echo "<p><strong>Vencimento: </strong>$vencimento</p>";
        echo "<p><strong>Valor: </strong>$valor_formatado</p>";
        echo "<p><strong>Codigo de barras: </strong>[CODIGO DE BARRAS SIMULADO]</p>";
        echo "<p><strong>Instruções: </strong>Após o pagamento, aguarde confirmação.</p>";
        echo "</div>";
    }
    ?>

</body>
</html>
