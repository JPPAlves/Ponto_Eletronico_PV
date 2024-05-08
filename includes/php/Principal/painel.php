<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa com Localização Atual</title>
    <link rel="stylesheet" href="./Css/principal.css">
</head>

<body>
    <?php
    // Caminho relativo para a navbar.php
    include('C:\xampp1\htdocs\Projeto\PontoEletronicoPV\includes\templetes\navbar.php');
    ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Conteúdo da Página -->
            <div class="content">
                <div id="map"></div>
                <div class="container">
                    <div class="clock">
                        <div class="mensagem">
                            <div id="iconlogo"></div>
                            <p></p>
                        </div>
                        <div class="relogio">
                            <p></p>
                        </div>
                        <div class="calendario">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inclua a API do Google Maps -->
        <script src="./Api/ScriptApi.js"></script>
        <script src="./js/dataHora.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCQSz3GxJ922XWd1ZhpxJYgb4bKuMmufQ&callback=initMap" async defer></script>
</body>

</html>