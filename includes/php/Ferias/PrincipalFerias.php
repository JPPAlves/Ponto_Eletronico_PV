<?php
session_start();
include(__DIR__ . '/../ValidasSessao/protect.php');
include(__DIR__ . '/../../templetes/navbar.php');

// Incluir o arquivo conexaodb.php
include(__DIR__ . '/../ValidasSessao/conexaodb.php');

// Consulta para obter o histórico de férias do usuário
$id_usuario = $_SESSION['id'];
$query = "SELECT id_ferias, data_inicio, data_fim, excluido, data_registro 
          FROM tbl_ferias 
          WHERE id_usuario = ? 
          AND YEAR(data_registro) = YEAR(CURRENT_DATE)
          ORDER BY data_inicio DESC";
$stmt = $conn->prepare($query);

// Verifique se a preparação da consulta foi bem-sucedida
if (!$stmt) {
    $_SESSION['mensagem'] = "Erro ao preparar a consulta: " . $conn->error;
} else {
    // Bind do parâmetro id_usuario
    $stmt->bind_param("i", $id_usuario);
    
    // Executar a consulta
    $stmt->execute();
    
    // Obter o resultado da consulta
    $result = $stmt->get_result();
    
    // Fechar o statement após obter o resultado
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Férias</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .ferias-excluidas {
            background-color: #ffcccc; /* Cor de fundo vermelha */
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Conteúdo da Página -->
            <div class="content">
                <!-- Verificação de mensagem de exclusão -->
                <?php if (isset($_SESSION['mensagem_exclusao'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['mensagem_exclusao']; ?>
                    </div>
                    <?php unset($_SESSION['mensagem_exclusao']); // Limpar a mensagem depois de exibida ?>
                <?php endif; ?>
                
                <div class="jumbotron">
                    <h3>Férias: GPS desligado, modo sofá ativado</h3>
                    <p class="lead">Clique no botão abaixo para solicitar suas férias.</p>
                    <p>
                        <a id="botao-Solicitar" class="btn btn-lg btn-success pull-right" href="RegistrarFerias.php" role="button">
                            <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Solicitar</a>
                    </p>
                </div>

                <!-- Histórico de Férias -->
                <h3>Histórico de Férias</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Data Início</th>
                            <th>Data Fim</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr <?php if ($row['excluido'] == 1) echo 'class="ferias-excluidas"'; ?>>
                            <td><?php echo $row['data_inicio']; ?></td>
                            <td><?php echo $row['data_fim']; ?></td>
                            <td>
                                <?php if ($row['excluido'] == 1): ?>
                                    <span class="badge bg-danger">Excluído</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($row['excluido'] != 1): ?>
                                <form method="POST" action="saveExcluirFerias.php" onsubmit="return confirm('Tem certeza que deseja excluir estas férias?');">
                                    <input type="hidden" name="id_ferias" value="<?php echo $row['id_ferias']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    <input type="hidden" name="action" value="delete">
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>

<?php
$conn->close();
?>
