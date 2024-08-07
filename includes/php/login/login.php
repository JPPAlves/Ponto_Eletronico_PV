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
                <img src="https://spbancarios.com.br/sites/default/files/styles/interna_grande/public/destaques/2023-05/site-itau-horas-acordo.webp?itok=W7D3h7WQ" alt="">
                <img src="https://www.sindojusmg.org.br/site/wp-content/uploads/2020/07/BANNER-SITE-7.jpg" alt="">
                <img src="https://www.bizneo.com/blog/wp-content/uploads/2022/02/Registro-de-ponto-810x455.jpg" alt="">
            </div>
            <div class="overlay"></div>
        </div>
        
        <!--div Formulario login -->
        <div class="form-section">
            <div class="inner-content">
                <div class="logo">
                    <img src=".\..\..\..\assets\img\icons8-visit-100.png" alt="Logo">
                </div>
                <div class="header">
                    Faça o login - <span> Ponto móvel</span>
                </div>

                <form class="form-control" method="POST">
                    <div class="input-wrapper">
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input name="usuario" class="input is-large" type="text" placeholder="Nome do Usuario" required>
                        </div>

                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input id="senha" name="senha" class="input is-large" type="password" placeholder="Sua senha" required>
                            <i class="fas fa-eye" id="toggleSenha" style="cursor:pointer;pointer-events: auto; margin-top:-12%; right: 10px;"></i>
                        </div>
                    </div>
                    <div class="login">
                        <button class="Entrar-btn" type="submit">
                            <div class="Entrar">Entrar</div>
                        </button>
                    </div>

                    <div class="separator">
                        <div class="line"></div>
                        <span>OU</span>
                    </div>

                    <div class="esqueceuSenha">
                        <button class="esqueceuSenha-btn senha" type="button">
                            <i class="fab fa fa-key"></i>
                            Já abriu o Chamado?
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Visualizar Senha não quiz funcionar importando de outra js press f
        document.getElementById('toggleSenha').addEventListener('click', function () {
            var senhaInput = document.getElementById('senha');
            var senhaIcon = document.getElementById('toggleSenha');
            
            if (senhaInput.type === 'password') {
                senhaInput.type = 'text'; 
                senhaIcon.classList.remove('fa-eye'); 
                senhaIcon.classList.add('fa-eye-slash'); 
            } else {
                senhaInput.type = 'password'; 
                senhaIcon.classList.remove('fa-eye-slash'); 
                senhaIcon.classList.add('fa-eye'); 
            }
        });
    </script>

</body>
</html>