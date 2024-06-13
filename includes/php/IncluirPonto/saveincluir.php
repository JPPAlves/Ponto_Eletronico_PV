<?php
session_start();
include('/xampp1/htdocs/Projeto/PontoEletronicoPV/includes/php/ValidasSessao/conexaodb.php');

// Função para obter o endereço a partir das coordenadas
function getAddressFromCoordinates($latitude, $longitude) {
    $apiKey = 'AIzaSyCCQSz3GxJ922XWd1ZhpxJYgb4bKuMmufQ';
    $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitude},{$longitude}&key={$apiKey}";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data['status'] === 'OK') {
        return $data['results'][0]['formatted_address'];
    } else {
        return 'Não foi possível obter o endereço';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os campos necessários estão presentes e não estão vazios
    if (isset($_POST["latitude"]) && isset($_POST["longitude"]) && isset($_POST["hora"]) && isset($_POST["data"]) && isset($_POST["justificativa"])) {
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $hora = $_POST["hora"];
        $data = $_POST["data"];
        $justificativa = $_POST["justificativa"];
        $id_usuario = $_SESSION['id'];

        // Definir o tipo padrão como "entrada" se nenhum checkbox de tipo estiver marcado
        $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : "entrada";

        // Obter o endereço a partir das coordenadas
        $location = getAddressFromCoordinates($latitude, $longitude);

        // Formatando a data no formato desejado (d-m-Y)
        $data_formatada = date("Y-m-d", strtotime($data));

        // Converter para maiúsculas
        $location = strtoupper($location);
        $hora = strtoupper($hora);
        $data_formatada = strtoupper($data_formatada);
        $justificativa = strtoupper($justificativa);
        $tipo = strtoupper($tipo);

        // Agora temos todos os dados necessários, podemos salvar no banco de dados
        $stmt = $conn->prepare("INSERT INTO tbl_registros_ponto(localizacao, hora, data, tipo, justificativa, id_usuario) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $location, $hora, $data_formatada, $tipo, $justificativa, $id_usuario);

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
