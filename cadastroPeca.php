<?php
session_start();
if (!isset($_SESSION['email'])){
	header('location:login.php');
	session_destroy();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	!-->
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	<script src="funcoes.js"></script>
	<link rel="stylesheet" href="assets/css/prod.css">

	<link rel="icon" href="assets/img/ferramenta-tesoura.png">

	 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>
 
 
<script>
jQuery(function() {
   
    jQuery("#valor").maskMoney({
    prefix:'R$ ',
    thousands:'.',
    decimal:','
})
 
});
</script>

		<title>Cadastrar Novo Produto</title>
		
	</head>
	<body>
	<body >
	
			<div class="container">
			<div class="form-image">
         <img src="assets/img/undraw_add_post_re_174w.svg">
        </div>
					<div id="fs3" class="card">
						<div class="card-header" >
							<h1 id="name">Cadastrar novo item</h1>
						</div>
						<div class="card-body">
							
							<form class="form" onsubmit="return validaFormPeca(this);" id="formCadastroPeca" action="cadastraPeca.php" method="POST">
							<div class="form-row">
									<div class="form-group col-md-6">
										<label for="nome">Nome do Item</label>
										<input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome" required>
									</div>
									<div class="form-group">
										<label for="valor">Valor</label>
										<input type="text" class="form-control" id="valor" name="valor" placeholder="Insira o valor" required>
									</div>
							<div class="form-row">
								
									<div class="form-group ">
										<label for="codigo">Código produto</label>
										<input type="text" class="form-control" name="codigo" id="codigo" placeholder="Insira o código do produto" maxlength="7" required>
									</div>
									<div class="form-group">
											<label for="categoria">Categoria</label>
											<div class="dropdown">
											<div class="dropdown-select">
											<select id="categoria" class="form-control" name="categoria" required>
												<option value="" selected >Selecione a categoria</option>
												<option value="Tecido">Tecido</option>
												<option value="Agulhas e Alfinetes">Agulhas e Alfinetes</option>
												<option value="Linhas">Linhas</option>
												<option value="Botões e Zíperes">Botões e Zíperes</option>
												<option value="Tesouras e Máquinas">Tesouras e Máquinas</option>
											</select>
											</div>
											</div>
									</div>
									<div class="form-group">
									<label  for="obs">Observações</label>
								<div class="form-row">								
										 
										<textarea type="text" class="form-control" id="obs" name="obs" placeholder="Insira suas obeservações" required></textarea>
								
								</div>
								
								</div>
									<div class="form-row">
									<div class="file">
									<label for="img">Imagem</label>
										<input type="file" class="form-control" id="img" name="img">	
									</div>
								</div>
								
								
									<div class="caditem"> 
								<button type="submit" class ="Cadastrar" name="sbt"><a>Cadastrar</a></button>
								</div>
</div>
									
								
								</div>
								
								<!--<input type="button" class="btn btn-light" value="Voltar" onclick="window.location.assign('inicio.html');"/>!--></form>
						</div>
						
					</div>
					
				</div>
	
	</body>
</html>
