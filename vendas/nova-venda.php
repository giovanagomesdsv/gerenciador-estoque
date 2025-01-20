<?php 
include "../conexao.php";
session_start();

$cnpj =  $_SESSION['cnpj'];

$itens = $_POST['itens'];
$quant = $_POST['quant'];
$forma_pagamento= $_POST['forma_pagamento'];
$local = $_POST['local'];
$especificacao_venda = $_POST['especificacao_venda'];
$valor = $_POST['valor'];

$insert = "INSERT INTO venda (cnpj, itens, quantidade, total, forma_pagamento, especificacao_venda) VALUES ('$cnpj', '$itens', '$quant', '$valor', '$forma_pagamento', '$especificacao_venda')";

if($resultado = mysqli_query($conn, $insert)) {
    echo "
    <script>
    alert('Dados inseridos com sucesso!');
    location.href = 'vendas.php';
</script>
";
} else {
echo "<script>alert('Erro ao inserir os dados!'); 
    location.href = 'vendas.php'; 
      </script>
";
}
?>