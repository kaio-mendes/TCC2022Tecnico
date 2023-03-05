<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>busca</title>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="icon" href="assets/img/ferramenta-tesoura.png">
	<script src="funcao.js"></script>
		<script type="text/javascript" src="jquery-3.4.1.js"></script>
		<script>
			$(document).ready(function() {
				$('#busca').attr('disabled', true);
				$('#op').change(function() {
					var tipo=$("#op option:selected").text();
					if (tipo=='Mostrar tudo') {
						$('#busca').attr('disabled', true);
					} else {
						$('#busca').attr('disabled', false);
					}
				});
			});	
		</script>
	</head>
	<body>
		<div class="container">
			<div id="fs3" class="card" style="top: 30px;">
				<div class="card-header text-center">
					<h1 id="name">SISCOE - Busca</h1>
				</div>
				<div class="card-body">
					<form action="estoque.php" onsubmit="return validaBusca(this);" method="POST">
						<div class="form">
							<div class="form-row">
								<div class="form-group col-md-3">
									<label for="op">Buscar por</label>
									<select id="op" class="form-control" name="op">
										<option value=""selected>Mostrar tudo</option>
										<option value="nome">Nome</option>
										<option value="codigo">Código</option>
									</select>
								</div>
								<div class="form-group col-md-9">
									<label for="op" style="color: #fff">-</label>
									<input type="text" class="form-control" name="busca" id="busca" placeholder="Insira a busca">
								</div>
							</div>				
							<input type="submit"  value="Buscar" class="btn btn-primary">
							<input type="button"  value="Voltar" class="btn btn-light" onclick="window.location.assign('telainicial.php');" >
						</div>
					</form>
				</div>
			</div>
		</div>		 
	</body>
</html>