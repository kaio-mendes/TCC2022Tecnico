<!DOCTYPE html>
<html>
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/ferramenta-tesoura.png">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="cidades-estados.js"></script>

<script type="text/javascript">
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('celular').onkeyup = function(){
		mascara( this, mtel );
	}
}
</script>


</head>
	<title>Sistema de Cadastro</title>

</head>
<body>
<div class="container">
       <div class="form-image">
         <img src="assets/img/undraw_online_shopping_re_k1sv.svg">
        </div>
           <div class="form">

	<form name="signup" method="post"	action="cadastrando.php">

	<div class="form-header">
                <div class="title">
                    <h1>Cadastre-se</h1>
                </div>

				<div class="login-button">
                    <button> <a href="login.php">Já tem login?</a></button>
                </div>
                
                </div>
				<div class="input-group">
        <div class="input-box">
		<label for="nome">Nome Completo</label>
		<input type="text" name="nome" placeholder="Digite seu nome" required>
	    </div>

		


<div class="form-group">
    <div class="cat">
<label for="estado">Estado</label>
<select id="estado" name="estado"></select>
</div>
<div class="cid">
<label for="cidade">Cidade</label>
    <select id="cidade" name="cidade" style="width: 210px;"></select>
    </div>
    <script language="JavaScript" type="text/javascript" charset="utf-8">
      new dgCidadesEstados({
        cidade: document.getElementById('cidade'),
        estado: document.getElementById('estado')
      })
    </script>
</div>



	

		<div class="input-box">
		<label for="numero">Celular</label>
		<input type="text" id ="celular" name="celular" maxlength="15" placeholder="(xx) xxxx-xxxx" required> 
</div>

		<div class="mail">
		E-mail: <br>
		<input type="text" name="email" placeholder="Digite seu email" required>
		</div>

		<div class="input-box">
		<label for="senha">Senha</label>
		<input type="password" name="senha" placeholder="Digite sua senha" required>
		</div>
		
		
	</form>
	<div class="login-button2">
		<button type="submit" value="Cadastrar"> <a>Fazer Cadastro</a></button>
		</div>
</div>

</body>
</html>