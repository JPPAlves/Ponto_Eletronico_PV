<?php
session_start();

include('/xampp1/htdocs/Projeto/PontoEletronicoPV/includes/php/ValidasSessao/conexaodb.php');

if(isset($_POST['usuario']) && isset($_POST['senha'])) {
    if(empty($_POST['usuario'])) {
        echo "Preencha seu usuário";
    } else if(empty($_POST['senha'])) {
        echo "Preencha sua senha";
    } else {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $query = "SELECT id_usuario, primeiro_nome, senha FROM tbl_usuario WHERE primeiro_nome = ? AND senha = ?";
        
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('ss', $usuario, $senha);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 1) {
                $stmt->bind_result($id_usuario, $primeiro_nome, $senha_hash);
                $stmt->fetch();

                $_SESSION['id'] = $id_usuario;
                $_SESSION['nome'] = $primeiro_nome;

                header("Location:/Projeto/PontoEletronicoPV/includes/php/Principal/painel.php");
                exit;
            } else {
                echo "Falha ao logar! Usuário ou senha incorretos";
            }
        } else {
            echo "Erro de banco de dados";
        }
        $stmt->close();
    }
}
?>
