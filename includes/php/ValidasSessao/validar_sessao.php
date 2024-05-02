<?php
include('./conexaodb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['usuario']) || empty($_POST['senha'])) {
        echo 'Preencha o usuário e a senha';
    } else {
        $usuario = $conn->real_escape_string($_POST['usuario']);
        $senha = $conn->real_escape_string($_POST['senha']);

        // Use prepared statements para evitar SQL Injection
        $query = "SELECT primeiro_nome, senha FROM usuario WHERE primeiro_nome = ?";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('s', $usuario);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 1) {
                $stmt->bind_result($primeiro_nome, $senha_hash);
                $stmt->fetch();

                // Verificar a senha usando função de hash
                if (password_verify($senha, $senha_hash)) {
                    // Iniciar sessão se o login for bem-sucedido
                    session_start();
                    $_SESSION['usuario'] = $primeiro_nome;
                    $stmt->close();
                    header("Location: ../../includes/php/Principal/painel.php");
                    exit;
                } else {
                    echo "Falha ao logar! Nome de usuário ou senha incorretos";
                }
            } else {
                echo "Falha ao logar! Nome de usuário ou senha incorretos";
            }
        } else {
            echo "Erro de banco de dados";
        }
    }
}
?>
