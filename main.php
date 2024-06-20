<?php
if (isset($_POST['redirect'])) {
    // O URL para onde você quer redirecionar
    $url = '/Projeto/PontoEletronicoPV/includes/php/login/login.php';
    header("Location: $url");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Redirecionar</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="redirect">Redirecionar</button>
    </form>
</body>
</html>