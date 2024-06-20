<?php
// Incluir o arquivo validar_sessao.php
include(__DIR__ . '/../ValidasSessao/validar_sessao.php');
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!--div Slide -->
    <div class="container">
        <div class="slider">
            <div class="frame">
                <img src="https://classic.exame.com/wp-content/uploads/2016/09/size_960_16_9_ponto-eletronico1.jpg?quality=70&strip=info&w=960/pic-1.png" class="active">
                <img src="https://www.uff.br/sites/default/files/styles/large/public/prazo.jpg?itok=6qScLe44" alt="">
                <img src="https://spbancarios.com.br/sites/default/files/styles/interna_grande/public/destaques/2023-05/site-itau-horas-acordo.webp?itok=W7D3h7WQ" class="">
                <img src="https://www.sindojusmg.org.br/site/wp-content/uploads/2020/07/BANNER-SITE-7.jpg" alt="">
                <img src="https://www.bizneo.com/blog/wp-content/uploads/2022/02/Registro-de-ponto-810x455.jpg" alt="">
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
    <!--div Formulario login -->
        <div class="form-section">
            <div class="inner-content">
                <div class="logo">
                    <img src=".\..\..\..\assets\img\icons8-visit-100.png" alt="Logo">
                </div>
                <div class="header">
                    Faça o login <span>Nome do Sistema</span>
                </div>

                <form class="form-control" method="POST">
                    <div class="input-wrapper">
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input name="usuario" class="input is-large" type="text" placeholder="Nome do Usuario">
                        </div>

                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input name="senha" class="input is-large" type="password" placeholder="Sua senha">
                        </div>
                    </div>
                    <div class="login">
                        <button class="Entrar-btn " type="submit">
                            <div type="submit" class="Entrar">Entrar</div>
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
                            <mat-ripple color="rgba(255, 255, 255, 0.09)" />
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
