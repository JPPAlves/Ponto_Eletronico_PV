<?php
session_start();
include(__DIR__ . '/../ValidasSessao/protect.php');
include(__DIR__ . '/../../templetes/navbar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Férias</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Estilo para o body e elementos básicos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            /* Largura máxima para o conteúdo */
            margin: 0 auto;
            /* Centraliza o conteúdo na página */
            padding: 20px;
            display: flex;
            /* Ativa o flexbox para layout flexível */
            justify-content: space-between;
            /* Distribui os itens com espaço entre eles */
        }

        .content-wrapper {
            flex: 1;
            /* Ocupa o espaço restante */
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-incluir {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            /* Layout flexível para os elementos do formulário */
            flex-wrap: wrap;
            /* Quebra de linha automática quando necessário */
        }

        .form-group {
            margin-bottom: 15px;
            flex: 1;
            /* Ocupa o espaço disponível */
            margin-right: 10px;
            /* Espaçamento entre os campos */
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="date"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: calc(50% - 5px);
            /* 50% do espaço, menos o espaçamento entre os campos */
        }

        #registrarFeriasBtn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            width: 15%;
            /* Botão ocupa todo o espaço disponível */
        }

        #registrarFeriasBtn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Conteúdo da Página -->
            <div class="content">
                <h3>Incluir Férias</h3>

                <!-- Verificar se há mensagem de sucesso -->
                <?php if (isset($_SESSION['mensagem'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['mensagem']; ?>
                    </div>
                    <?php unset($_SESSION['mensagem']);          ?>
                <?php endif; ?>

                <form class="form-incluir" method="POST" action="saveFerias.php">
                    <div class="form-group">
                        <label for="data_inicio">Data Inicial:</label>
                        <input type="date" id="data_inicio" name="data_inicio" required>
                    </div>

                    <div class="form-group">
                        <label for="data_fim">Data Final:</label>
                        <input type="date" id="data_fim" name="data_fim" required>
                    </div>

                    <button id="registrarFeriasBtn" type="submit">Registrar Férias</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
