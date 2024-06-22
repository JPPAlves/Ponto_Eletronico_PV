<?php

// Incluir o arquivo conexao.php
include(__DIR__ . '/../ValidasSessao/conexaodb.php');

// Incluir o arquivo proteção.php
include(__DIR__ . '/../ValidasSessao/protect.php');

// Incluir o arquivo navbar.php
include(__DIR__ . '/../../templetes/navbar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Batida</title>
    <link rel="stylesheet" href="./css/styleIncluir.css">
</head>

<body>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Conteúdo da Página -->
            <div class="content">
                <h3>Incluir Batida</h3>
                <form class="form-incluir" method="POST" action="saveincluir.php">
                    <div class="form-group">
                        <div class="endereco" id="endereco">
                            Carregando localização...
                        </div>
                        <input type="hidden" id="localizacao" name="localizacao">
                    </div>

                    <div class="form-group">
                        <label for="data">Data:</label>
                        <input type="date" id="data" name="data" required>
                    </div>
                    <div class="form-group">
                        <label for="hora">Hora:</label>
                        <input type="time" id="hora" name="hora" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <div class="checkbox-group">
                            <input type="checkbox" id="entrada" name="tipo" value="entrada">
                            <label for="entrada">Entrada</label>
                            <input type="checkbox" id="saida" name="tipo" value="saida">
                            <label for="saida">Saída</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="justificativa">Justificativa:</label>
                        <textarea id="justificativa" name="justificativa" rows="4" required></textarea>
                    </div>

                    <button id="registrarPontoBtn" type="submit">Registrar Ponto</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Inclua o js -->
    <script src="./js/GeocodificacaoApi.js"></script>
    <script src="./js/GeolocalizacaoApi.js"></script> 
    <script src="./js/script.js"></script>

</body>

</html>