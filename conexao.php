<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "bc";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_errno) {
    echo "Falha ao conectar(".$conn->connect_errno.") ".$conn->connect_error;
} else {
    echo "Conectado!!!!!!! ";
}
?>