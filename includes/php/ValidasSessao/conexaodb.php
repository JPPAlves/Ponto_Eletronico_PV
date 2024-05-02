<?php
// Conexão com o banco de dados 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_PontoEletronico";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
