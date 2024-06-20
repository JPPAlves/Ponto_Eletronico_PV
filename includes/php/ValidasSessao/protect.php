<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    // Redireciona para a página de acesso negado ou mostra uma mensagem personalizada
    header("Location:/Projeto/PontoEletronicoPV/includes/php/ValidasSessao/pagina_nao_autorizada.php");

    exit;
}
?>
