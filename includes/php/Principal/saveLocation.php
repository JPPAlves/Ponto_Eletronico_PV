<?php
session_start();
include('/xampp1/htdocs/Projeto/PontoEletronicoPV/includes/php/ValidasSessao/conexaodb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["location"]) && isset($_POST["time"]) && isset($_POST["today"])) {
        $location = strtoupper($_POST["location"]);
        $time = strtoupper($_POST["time"]);
        $today = strtoupper($_POST["today"]);
        $id_usuario = $_SESSION['id'];

        // Formatar a data para o formato esperado pelo banco de dados (Y-m-d)
        $today_formatted = date("Y-m-d", strtotime($today));

        // Determinar o tipo (entrada ou saída) com base no último registro do dia
        $result = $conn->query("SELECT tipo FROM tbl_registros_ponto WHERE data = '$today_formatted' AND id_usuario = '$id_usuario' ORDER BY hora DESC LIMIT 1");
        if ($result && $result->num_rows > 0) {
            $last_tipo = $result->fetch_assoc()["tipo"];
            $tipo = $last_tipo == 'ENTRADA' ? 'SAIDA' : 'ENTRADA';
        } else {
            $tipo = 'ENTRADA';
        }

     $tipos = strtoupper($tipo);
        // Preparar e executar o INSERT
        $stmt = $conn->prepare("INSERT INTO tbl_registros_ponto (localizacao, hora, data, tipo, id_usuario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $location, $time, $today_formatted, $tipos, $id_usuario);

        if ($stmt->execute()) {
            echo "Registro salvo com sucesso!";
        } else {
            echo "Erro ao salvar registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Parâmetros ausentes!";
    }
} else {
    echo "Método de requisição inválido!";
}

$conn->close();
?>
