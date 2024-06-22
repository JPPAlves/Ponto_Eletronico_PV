<?php
session_start();

// Verificar se o formulário foi submetido corretamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir o arquivo de conexão com o banco de dados
    include(__DIR__ . '/../ValidasSessao/conexaodb.php');

    // Verificar se todos os campos necessários foram enviados
    if (isset($_POST['data_inicio'], $_POST['data_fim'])) {
        // Capturar os dados do formulário
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $data_solicitacao = date('Y-m-d'); // Captura a data atual

        // Capturar o ID do usuário da sessão (supondo que já esteja definido na sessão)
        $id_usuario = $_SESSION['id'];

        // Preparar e executar a inserção no banco de dados
        $stmt = $conn->prepare("INSERT INTO tbl_ferias (id_usuario, data_inicio, data_fim, data_registro) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $id_usuario, $data_inicio, $data_fim, $data_solicitacao);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Férias registradas com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao registrar férias: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['mensagem'] = "Por favor, preencha todos os campos.";
    }

    // Redirecionar de volta para a página de registro de férias após o processamento
    header('Location: RegistrarFerias.php');
    exit();
} else {
    // Se alguém tentar acessar este script diretamente, redirecionar para o formulário de registro
    header('Location: RegistrarFerias.php');
    exit();
}
?>
