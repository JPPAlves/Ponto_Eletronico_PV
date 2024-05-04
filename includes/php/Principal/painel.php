<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <title>Minha Principal</title>
   
    <script type="module" src="ScriptApi.js"></script>
    
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
                <h1>Bem-vindo à Minha Página</h1>
                <!-- Mapa -->
                <div id="map"></div>
            </div>
        </div>
    </div>
</body>

<!-- Inclua a API do Google Maps -->
< <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdTV-z2xPDcrf1MeyFpEKzkDXHaPvGIKQ&callback=initMap&v=weekly"
      defer
    ></script>
</html>
