<?php
session_start();

// Incluir o arquivo conexaodb.php
include(__DIR__ . '/../ValidasSessao/conexaodb.php');

// Verificar se houve uma ação de exclusão
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    if (isset($_POST['id_ferias'])) {
        $id_ferias = $_POST['id_ferias'];

        // Executar a exclusão
        $stmt = $conn->prepare("UPDATE tbl_ferias SET excluido = 1 WHERE id_ferias = ?");
        $stmt->bind_param("i", $id_ferias);

        if ($stmt->execute()) {
            $_SESSION['mensagem_exclusao'] = "Férias excluídas com sucesso!";
        } else {
            $_SESSION['mensagem_exclusao'] = "Erro ao excluir férias: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['mensagem_exclusao'] = "Parâmetros ausentes para exclusão!";
    }

    // Redirecionar de volta para a página anterior para evitar reenvios de formulário
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
