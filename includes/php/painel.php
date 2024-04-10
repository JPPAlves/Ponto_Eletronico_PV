<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <?php
    // Inicia a sessão
    session_start();
    
    // Verifica se o usuário está logado
    if (isset($_SESSION['usuario'])) {
        echo 'Olá, ' . $_SESSION['usuario'];
    } else {
        // Se o usuário não estiver logado, redirecione-o para a página de login
        header("Location: index.php");
        exit;
    }
    ?>
</body>
</html>
