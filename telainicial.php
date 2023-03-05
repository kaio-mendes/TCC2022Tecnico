	<?php
	session_start();
	if (!isset($_SESSION['email'])){
		header('location:login.php');
		session_destroy();
	}?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="telainicial.css">
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
    <title>TelaInicial</title>
</head>
<body>
    


<?php
			$conexao=mysqli_connect('localhost:3307', 'root', '', 'peca') or die('Nao foi possível conectar ao banco de dados');
			mysqli_set_charset($conexao,"utf8");
			
			if (isset($_POST['op'])) {
				$busca=$_POST['op'];
			} else {
				$busca="";
			}
			
			if ($busca!="") {
				$key=$_POST['busca'];
			} 
			
			$query="select * from produto";

			if ($busca=="codigo") {
				$query.=" where codigo='{$key}'";
			} else if ($busca=="categoria") {
				$query.=" where categoria='{$key}'";
			} else if ($busca=="nome") {
				$query.=" where nome='{$key}'";
			}
			
			$result=mysqli_query($conexao, $query);
			$rows=mysqli_num_rows($result);	
		?>
		
		<div class="container">
		
			<div class="menu">
			

			<nav>
			<div class="img">
			<img src="assets/img/catalogo.png" height="70" width="70">
			</div>
      <ul>
	  
        <li><a href="cadastroPeca.php">Novo Produto</a></li>
        <li><a href="login.php">Sair</a></li>
		<li><a href="perfil.html">Perfil</a></li>
		<li><a href="relatorio.php">Relatório</a></li>
		
		
      </ul>
    </nav>
	</div>
			<div class="categorias">
		<li><a href="agulha.php"><img border="0" src="assets/img/agulha.png" alt="HTML tutorial" width="100" height="100"/><p>Agulhas</p></a></li>
		<li><a href="tecido.php"><img border="0" src="assets/img/tecido.png" alt="HTML tutorial" width="100" height="100"/><p>Tecidos</p></a></li>
		<li><a href="linha.php"><img border="0" src="assets/img/linha.png" alt="HTML tutorial" width="100" height="100"/></a><p>Linhas</p></li>
		<li><a href="tesoura.php"><img border="0" src="assets/img/tesoura.png" alt="HTML tutorial" width="100" height="100"/><p>Tesouras</p></a></li>
		<li><a href="botao.php"><img border="0" src="assets/img/botao.png" alt="HTML tutorial" width="100" height="100"/><p>Botões</p></a></li>				
</div>

<ul class="slider">
    <li>
	<input type="radio" id="slide1" name="slide" checked>
          <label for="slide1"></label>
          <img src="assets/img/bemvindo.png" />
    </li>
    <li>
	<input type="radio" id="slide2" name="slide">
          <label for="slide2"></label>
          <img src="assets/img/anuncie.png" />
    </li>
    <li>
	<input type="radio" id="slide3" name="slide">
          <label for="slide3"></label>
          <img src="assets/img/aviamento.png" />
    </li>
</ul>


<div class="busca">
			<div id="fs3" class="card" style="top: 30px;">
				<div class="card-header text-center">
				</div>
				<div class="card-body">
					<form action="estoque.php" onsubmit="return validaBusca(this);" method="POST">
					
					<div class="selected">
									
					<p hidden><select id="op" class="form-control" name="op"></p>
					<p hidden>	<option value="nome">Nome</option></p>
					<p hidden>	<option value="codigo">Código</option></p>
									</select>
								</div>
								<div class="formsel">
							



							<div class="input-box">
								
								<div class="form-group col-md-9">
									<label for="op" style="color: #fff"></label>
									<input type="text" class="form-control" name="busca" id="busca" placeholder="Buscar"> 
								</div>
							</div>				
								
						</div>
						<div class="buttonb">
								<button type="submit" class ="btn btn-primary" name="buscar"><a>Buscar</a></button>
									
								</div>
					</form>
				</div>
			</div>
		</div>		 

<div class="resultadobusca">
<?php
			
			if (isset($_POST['op'])) {
				$busca=$_POST['op'];
			} else {
				$busca="";
			}
			
			if ($busca!="") {
				$key=$_POST['busca'];
			} 
			
			$query="select * from produto";

			if ($busca=="codigo") {
				$query.=" where codigo='{$key}'";
			} else if ($busca=="categoria") {
				$query.=" where categoria='{$key}'";
			} else if ($busca=="nome") {
				$query.=" where nome='{$key}'";
			}
			
			$result=mysqli_query($conexao, $query);
			$rows=mysqli_num_rows($result);	
		?>








</div>






			<div class="tabela" >
		<?php
		
						if ($rows==0) {
							echo "Não foram encontrados resultados<br><br>";
						} else {
							$pecas=array();
							echo "<form method='POST' action='deletaPeca.php'><table class='table table-hover'><thead>
									<tr>
										<th scope='col'>Código produto</th>
										<th scope='col'>Nome do Item</th>
										<th scope='col'>Valor</th>
										<th scope='col'>Categoria</th>
										<th scope='col'>Observações</th>
										<th scope='col'>Imagem</th>
									</tr></thead>
									<tbody>";
							for ($i=0; $i<$rows; $i++) {
								$pecas[] = mysqli_fetch_array($result);
								if ($pecas[$i][5]<=0) {
									$pecas[$i][5]=" - ";
								} else if ($pecas[$i][5]==1) {
									$pecas[$i][5].="";
								} else {
									$pecas[$i][5].="";	
								}												
								echo "<tr>";
								for ($j=0; $j<count($pecas[$i])/2; $j++) {
									if ($pecas[$i][$j]=="") {
										$pecas[$i][$j]=" - ";
									}
									echo "<td>".$pecas[$i][$j]."</td>";
								}
								$pecas[$i][0];
								$text="window.location.assign('deletaPeca.php');";
                                    
								echo "<td><button id='delete' name='delete'  type='submit' class='btn btn-danger' value='".$pecas[$i][0]."' onclick=".$text."><img src ='assets/img/trash3.svg'>    </button>";
							
echo " </td>";
								
								echo "</tr>";
								
							}
							echo "</table></form>";
						}

					?>
		</div>

			

			

				</div>
			</div>		
			
			
		</div>


      



		<div class="footer">
			<div class="icons1">
		<img src="assets/img/if.png" height="50" width="200">
		<img src="assets/img/instagram.png" height="50" width="50">
		<img src="assets/img/facebook.png" height="50" width="50">
		
		<img src="assets/img/linkedin.png" height="50" width="50">
		<img src="assets/img/twitter.png" height="50" width="50">
		<img src="assets/img/store-front.png" height="50" width="50">
</div>
</div>

</body>
</html>