
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="categoria.css">
    <link rel="icon" href="assets/img/ferramenta-tesoura.png">
    
</head>
    <title>Tecido</title>
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
			
			$query="SELECT * FROM `produto` WHERE categoria = 'Tecido'";

			if ($busca=="categoria") {
				$query.=" where categoria='{$key}'";
			}
			
			$result=mysqli_query($conexao, $query);
			$rows=mysqli_num_rows($result);	
		?>
		
		
		<div class="container">
		
			<div class="menu">
			<div class="barra"></div>

			<nav>
			<div class="img">
			<img src="assets/img/catalogo.png" height="70" width="70">
			</div>
      <ul>
	  
        <li><a href="cadastroPeca.php">Novo Produto</a></li>
        <li><a href="telainicial.php">Tela inicial</a></li>

      </ul>
    </nav>
	</div>

			<div class="tabela">
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
                                    
								echo "<td><button id='delete' name='delete' type='submit' class='btn btn-danger' value='".$pecas[$i][0]."' onclick=".$text.">Deletar</button></td>";
								echo "</tr>";
								
							}
							echo "</table></form>";
						}
					?>
		</div>

			

			

				</div>
			</div>			
		</div>


      






</body>
</html>