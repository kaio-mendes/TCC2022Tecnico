<!DOCTYPE html>
<html>
	<head>	
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="assets/css/estoque.css">
        <link rel="icon" href="assets/img/ferramenta-tesoura.png">
        <script src="funcoes.js"></script>
		<meta charset="UTF-8"/>
		<title>Busca</title>
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
         <div class="form-image">
         <img src="assets/img/undraw_web_search_re_efla.svg">
        </div>
		<div class="container1">

       

			<div id="fs3" class="card" style="top: 30px;">
				<div class="card-header text-center">
					<h1 id="name">Resultado da Busca</h1>
				</div>
				<div class="card-body">
					
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
                    
              
                
                echo "</tr>";
                
            }
            echo "</table></form>";
        }

    ?>
					<input type="button" value="Voltar" class="btn btn-gray" onclick="window.location.assign('telainicial.php');"/>
				</div>
			</div>			
		</div>
	</body>
</html>