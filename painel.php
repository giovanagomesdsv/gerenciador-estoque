<?php 
include "conexao.php";

session_start();

if (!isset($_SESSION['cnpj'])) {
    header("Location: login.php");
    exit;
}

$cnpj = $_SESSION['cnpj'];
$nome = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Gerenciador BC</title>
</head>
<body>
    <h1>Seja bem-vindo, <?php echo htmlspecialchars($nome); ?>!!!</h1>

    <header>
        <a href="#">Home</a>
        <a href="cadastro de livros/cadastro-livros.php">Cadastro de livros</a>
        <a href="vendas/vendas">Vendas</a>
        <a href="estoque/estoque">Estoque</a>
        <a href="sair.php"><i class='bx bx-log-out'></i></a>
    </header>

    <?php
    // Consulta os livros da livraria logada usando prepared statements
    $sql = "SELECT titulo, estoque FROM livro WHERE cnpj = ?";
    $hl = $conn->prepare($sql); // Prepara a consulta
    $hl->bind_param("s", $cnpj); // Vincula o parâmetro
    $hl->execute(); // Executa a consulta
    $result = $hl->get_result(); // Obtém os resultados

    if ($result->num_rows > 0) {
        while ($livro = $result->fetch_assoc()) {
            echo "<p>{$livro['titulo']} - Estoque: {$livro['estoque']}</p>";
        }
    } else {
        echo "<p>Nenhum livro encontrado no estoque.</p>";
    }
    ?>
</body>
</html>
