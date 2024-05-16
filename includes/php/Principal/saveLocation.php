<?php
session_start();
include('/xampp1/htdocs/Projeto/PontoEletronicoPV/includes/php/ValidasSessao/conexaodb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["location"]) && isset($_POST["time"]) && isset($_POST["today"])) {
        $location = $_POST["location"];
        $time = $_POST["time"];
        $today = $_POST["today"];
        $id_usuario = $_SESSION['id'];

        $today_formatted = date("d/m/Y", strtotime($today));

        $result = $conn->query("SELECT tipo FROM tbl_registros_ponto WHERE data = '$today_formatted' AND id_usuario = '$id_usuario' ORDER BY hora DESC LIMIT 1");
        if ($result && $result->num_rows > 0) {
            $last_tipo = $result->fetch_assoc()["tipo"];
            $tipo = $last_tipo == 'Entrada' ? 'Saída' : 'Entrada';
        } else {
            $tipo = 'Entrada';
        }

        $stmt = $conn->prepare("INSERT INTO tbl_registros_ponto (localizacao, hora, data, tipo, id_usuario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $location, $time, $today_formatted, $tipo, $id_usuario);

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
