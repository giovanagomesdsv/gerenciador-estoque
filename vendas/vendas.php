<?php 
include "../conexao.php";

session_start();

if (!isset($_SESSION['cnpj'])) {
    header("Location: login.php");
    exit;
}

$cnpj = $_SESSION['cnpj'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Vendas</title>
</head>
<body>
<div>
    <form action="nova-venda.php" method="POST">
        <label for="itens">Itens:</label>
        <input type="text" name="itens" required>

        <label for="quant">Quantidade total:</label>
        <input type="number" name="quant" required>

        <label for="valor">Valor total:</label>
        <input type="number" step="0.01" name="valor" required>

        <label for="forma_pagamento">Forma de pagamento:</label>
        <select name="forma_pagamento" required>
            <option value="">Selecione...</option>
            <option value="dinheiro">Dinheiro</option>
            <option value="cartao_debito">cartão débito</option>
            <option value="cartao_credito">cartao crédito</option>
            <option value="boleto">boleto</option>
            <option value="pix">pix</option>
        </select>

        <label for="especificacao_venda">Especificação de venda:</label>
        <select name="especificacao_venda" required>
            <option value="">Selecione...</option>
            <option value="Venda Online">Venda Online</option>
            <option value="Loja">Loja</option>
            <option value="Site BC">Site BC</option>
        </select>

        <input type="submit" value="Salvar">
    </form>
</div>

<div>
<?php
    
    $sql = "SELECT * FROM venda WHERE cnpj = ?";
    $hl = $conn->prepare($sql); 
    $hl->bind_param("s", $cnpj); // Vincula o parâmetro
    $hl->execute(); // Executa a consulta
    $result = $hl->get_result(); // Obtém os resultados

    if ($result->num_rows > 0) {
        while ($venda = $result->fetch_assoc()) {
            echo "<p><strong>{$venda['data_venda']}</strong></p> <p>{$venda['itens']}</p>
            <p>{$venda['quantidade']}</p>
            <p>{$venda['total']}</p>
            <p>{$venda['forma_pagamento']}</p>
            <p>{$venda['especificacao_venda']}</p>
             <div>
                    <a href='altera-formulario-venda.php?id={$venda['id_venda']}'>
                        <div class=\"bx bxs-edit-alt\"></div>
                    </a>

                    <a href='apaga-venda.php?id={$venda['id_venda']}'>
                        <div class=\"bx bxs-trash\"></div>
                    </a>
                </div>
            ";
        }
    } else {
        echo "<p>Nenhuma venda encontrada.</p>";
    }
    ?>
</div>

</body>
</html>