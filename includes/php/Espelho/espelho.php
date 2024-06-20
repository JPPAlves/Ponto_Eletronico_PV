<?php
session_start();

// Incluir o arquivo conexao.php
include(__DIR__ . '/../ValidasSessao/conexaodb.php');

// Incluir o arquivo proteção.php
include(__DIR__ . '/../ValidasSessao/protect.php');
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
<?php
// Verificar o caminho completo
echo __DIR__ . '/../../templetes/navbar.php';

// Incluir o arquivo navbar.php
include(__DIR__ . '/../../templetes/navbar.php');
?>
 
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="content">
                <div class="filter-container">         
                <h2>Tabela de Registros de Ponto Do Mês Atual</h2>
                </div>
                <table id="reportTable">

                    <tbody id="reportBody">
                    <?php 
                    include(__DIR__ . '/../Espelho/buscaResgistro.php'); 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
