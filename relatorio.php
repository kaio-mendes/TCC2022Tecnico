<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/ferramenta-tesoura.png">
    <link rel="stylesheet" href="telainicial.css">
    <title>Relatório</title>
</head>
<body>
    <h1>Todos os Itens cadastrados</h1>


	<?php
//quantidade de produtos
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'peca';
$mysqli = new mysqli($host,$user,$pass,$db);

$sql="SELECT count(codigo) AS  total FROM produto";
$result=mysqli_query($mysqli,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
echo "Quantidade de produtos ativos: " . $num_rows ; 
?>




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
		

        <div class="tabela" >
		<?php
		
						if ($rows==0) {
							echo "Não foram encontrados resultados<br><br>";
						} else {
							$pecas=array();
							echo "<form method='POST' action='deletaPeca2.php'><table class='table table-hover'><thead>
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
								$text="window.location.assign('deletaPeca2.php');";
                                    
								echo "<td><button id='delete' name='delete' type='submit' class='btn btn-danger' value='".$pecas[$i][0]."' onclick=".$text."><img src ='assets/img/trash3.svg'></button></td>";
								echo "</tr>";
								
							}
							echo "</table></form>";
						}
					?>
		</div>

<h1>Todos os perfis cadastrados</h1>
<?php
//quantidade de usuarios
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cadastro';
$mysqli = new mysqli($host,$user,$pass,$db);

$sql="SELECT count(id) AS  total FROM usuarios";
$result=mysqli_query($mysqli,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
echo "Quantidade de usuarios ativos: " . $num_rows;
?>
<?php
			$conexao=mysqli_connect('localhost', 'root', '', 'cadastro') or die('Nao foi possível conectar ao banco de dados');
			mysqli_set_charset($conexao,"utf8");
			
			if (isset($_POST['op'])) {
				$busca=$_POST['op'];
			} else {
				$busca="";
			}
			
			if ($busca!="") {
				$key=$_POST['busca'];
			} 
			
			$query="select * from usuarios";

			if ($busca=="id") {
				$query.=" where id='{$key}'";
			} else if ($busca=="nome") {
				$query.=" where nome='{$key}'";
			} 
			else if ($busca=="email") {
				$query.=" where email='{$key}'";
			}
			
			$result=mysqli_query($conexao, $query);
			$rows=mysqli_num_rows($result);	
		?>
		

        <div class="tabela" >
		<?php
		
						if ($rows==0) {
							echo "Não foram encontrados resultados<br><br>";
						} else {
							$pecas=array();
							echo "<form method='POST' action='deletaPeca2.php'><table class='table table-hover'><thead>
									<tr>
										<th scope='col'>Id</th>
										<th scope='col'>Nome</th>
                                        <th scope='col'>Estado</th>
										<th scope='col'>Cidade</th>
										<th scope='col'>Telefone</th>
                                        <th scope='col'>Email</th>
										<th scope='col'>Senha</th>
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
								$text="window.location.assign('deletaPeca2.php');";
                                    
								echo "<td><button id='delete' name='delete' type='submit' class='btn btn-danger' value='".$pecas[$i][0]."' onclick=".$text."><img src ='assets/img/trash3.svg'></button></td>";
								echo "</tr>";
								
							}
							echo "</table></form>";
						}


					?>
		</div>

		

</body>
</html>