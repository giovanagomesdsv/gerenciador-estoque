<?php 
include "../conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <option value="1">di</option>
            <option value="2">p</option>
            <option value="3">d</option>
            <option value="4">c</option>
            <option value="5">b</option>
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

</body>
</html>