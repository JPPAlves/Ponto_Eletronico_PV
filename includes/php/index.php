<?php
include 'conexaodb.php';

if (isset($_POST['usuario']) || isset($_POST['senha'])) {

    if (strlen($_POST['usuario']) == 0) {
        echo 'Preencha o usuário';
    } else if (strlen($_POST['senha']) == 0) {
        echo 'Preencha a sua senha';
    } else {
        $usuario = $conn->real_escape_string($_POST['usuario']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $query = "SELECT primeiro_nome, senha FROM usuario WHERE primeiro_nome = '$usuario' AND senha = '$senha'";

        $sql_query = $conn->query($query) or die("Falha na execução do SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['usuario'] = $usuario['primeiro_nome'];
            header("Location: painel.php");
            exit; // Importante para interromper a execução após redirecionar
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container">
    <div class="slider">
        <div class="frame">
            <img src="https://i.ibb.co/4Y8JLnG/pic-1.jpg" class="active">
            <img src="https://i.ibb.co/S3RSyQV/pic-2.png" alt="">
            <img src="https://i.ibb.co/fnDCfPk/pic-3.jpg" alt="">
            <img src="https://i.ibb.co/Jng5Qnv/pic-4.jpg" alt="">
            <img src="https://i.ibb.co/jw3p4vw/pic-5.png" alt="">
        </div>
        <div class="overlay"></div>
        <div class="control">
            <div class="bullet bullet-1 active">
                <div class="inner"></div>
            </div>
            <div class="bullet bullet-2">
                <div class="inner"></div>
            </div>
            <div class="bullet bullet-3">
                <div class="inner"></div>
            </div>
            <div class="bullet bullet-4">
                <div class="inner"></div>
            </div>
            <div class="bullet bullet-5">
                <div class="inner"></div>
            </div>
        </div>
    </div>

    <div class="form-section">
        <div class="inner-content">
            <div class="logo">
                <img src="./img/icons8-visit-100.png" alt="Logo">
            </div>  
            <div class="header">
                Faça o login <span>Nome do Sistema</span>
            </div>

            <form class="form-control" method="POST">
                <div class="input-wrapper">
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="usuario" class="input is-large" type="text" placeholder="Nome do Usuario" autofocus="">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="senha" class="input is-large" type="password" placeholder="Sua senha">
                    </div>
                </div>

                <div class="login">
                    <button class="submit" type="submit">
                        <div class="txt">Entrar</div>
                        <svg class="spinner" width="32" height="32" style="display: none;">
                            <circle class="path" cx="16" cy="16" r="10" fill="none" stroke-width="1" stroke-miterlimit="10" />
                        </svg>
                        <mat-ripple color="rgba(255, 255, 255, 0.09)"/>
                    </button>
                </div>

                <div class="separator">
                    <div class="line"></div>
                    <span>OU</span>
                </div>

                <div class="esqueceuSenha">
                    <button class="esqueceuSenha-btn senha" type="button">
                        <i class="fab fa fa-key"></i>
                        Esqueceu Senha?
                        <mat-ripple color="rgba(255, 255, 255, 0.09)"/>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
