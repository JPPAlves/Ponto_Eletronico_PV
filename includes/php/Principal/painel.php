<?php
include(__DIR__ . '/../ValidasSessao/protect.php');
?>

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
// Verificar o caminho completo
echo __DIR__ . '/../../templetes/navbar.php';

// Incluir o arquivo navbar.php
include(__DIR__ . '/../../templetes/navbar.php');
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
                        <!--Botao para registar o ponto-->
                        <div class="botao">
                            <button id="button" class="ready" onclick="registerPonto(); clickButton();">
                                <div class="message submitMessage">
                                    <polyline stroke="currentColor" points="2,7.1 6.5,11.1 11,7.1 " />
                                    <line stroke="currentColor" x1="6.5" y1="1.2" x2="6.5" y2="10.3" />
                                    </svg> <span class="button-text">Bater Ponto</span>
                                </div>
                                <div class="message loadingMessage">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 17">
                                        <circle class="loadingCircle" cx="2.2" cy="10" r="1.6" />
                                        <circle class="loadingCircle" cx="9.5" cy="10" r="1.6" />
                                        <circle class="loadingCircle" cx="16.8" cy="10" r="1.6" />
                                    </svg>
                                </div>
                                <div class="message successMessage">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 11">
                                        <polyline stroke="currentColor" points="1.4,5.8 5.1,9.5 11.6,2.1 " />
                                    </svg><span class="button-text">Registrado!</span>
                                </div>
                            </button>
                            <canvas id="canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
                <div class="local" id="local">
                    Av. Aqui vai aparecer meu Endereço, 1234
                </div>
                <div class="Rhora">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#FFD43B" d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                    </svg>
                    <h6>Não Há Pobreza que Resistar a 12 Horas de trabalho</h6>
                </div>
            </div>
        
    </div>
    <!-- Inclua a API do Google Maps e js -->
    <script src="./Api/GeolocalizacaoApi.js"></script>
    <script src="./Api/GeocodificacaoApi.js"></script>
    <script src="./js/Relogio.js"></script>
    <script src="./js/botão.js"></script>
    <script src="./js/RegistrarPonto.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCQSz3GxJ922XWd1ZhpxJYgb4bKuMmufQ&callback=initMap" async defer></script>
</body>

</html>