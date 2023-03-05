<?php
session_start();
/*if (!isset($_SESSION['email'])){
	header('location:login.php');
	session_destroy();
}*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/ferramenta-tesoura.png">
    <title>Formulario de Login</title>
    
</head>
<body>
    <div class="container">
       <div class="form-image">
         <img src="assets/img/undraw_login_re_4vu2.svg">
        </div>
        
        <div class="form">
            <form action = "indexlogin.php" method = "POST"> <!--- vazio pq nao tem acao pq precisa do back end-->
                    <div class="form-header">
                    <div class="title">
                        <h1>Login</h1>
                    </div>
                    <div class="cadastro-button">
                        <button> <a href="cadastro.php">Cadastre-se</a></button>
                    </div>
                    </div>
    
                    <div class="input-group">
    
                        <div class="input-box">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" name="email" placeholder="Digite seu email" required>
                        </div>
                        <div class="input-box">
                            <label for="password">Senha</label>
                            <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                        </div>
                        
                        
                        </div>
                        <div class="login-button3">
                        <button type="submit" class ="logar"><a>Login</a></button>
                        </div>
                        </form>
                        
                        </div>
    </body>
    </html>
