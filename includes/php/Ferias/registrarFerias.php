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
    <title>Minha Ferias</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // Caminho relativo para a navbar.php
    include('C:\wamp64\www\Projeto\PontoEletronicoPV\includes\templetes\navbar.php');
    ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Conteúdo da Página -->
            <div class="content">
                <h1>Bem-vindo à Minha Página de solicitar ferias</h1>

                
            </div>
        </div>
    </div>
    </div>



</body>

</html>