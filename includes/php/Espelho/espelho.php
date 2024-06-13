<?php
session_start();
include('/xampp1/htdocs/Projeto/PontoEletronicoPV/includes/php/ValidasSessao/conexaodb.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espelho</title>
    <link rel="stylesheet" href="css/styleEspelho.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     
</head>

<body>
    <?php include('/xampp1/htdocs/Projeto/PontoEletronicoPV/includes/templetes/navbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="content">
                <h3>Espelho de Batida</h3>
                <div class="filter-container">         
                <h2>Tabela de Registros de Ponto Do Mês Atual</h2>
                </div>
                <table id="reportTable">

                    <tbody id="reportBody">
                    <?php include('/xampp1/htdocs/Projeto/PontoEletronicoPV/includes/php/Espelho/buscaResgistro.php'); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
