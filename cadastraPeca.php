<?php
	
	require_once('classes.php');


	session_start();
	
	$conexao=mysqli_connect('localhost:3307', 'root', '', 'peca') or die('Nao foi possível conectar ao banco de dados');
	mysqli_set_charset($conexao,"utf8");
	
	$codigo=$_POST['codigo'];
	$nome=$_POST['nome'];
	$valor=$_POST['valor'];
	$categoria=$_POST['categoria'];
	$obs=$_POST['obs'];
	$img=$_POST['img'];
	
	$nova = new Peca($codigo, $nome, $valor, $categoria, $obs, $img);
	
	//$_SESSION['mat'] = $mat;
	//$_SESSION['pw'] = $pw;
	//echo $_SESSION['mat']."/".$_SESSION['pw'];
	//echo $num.$tipo.$modelo.$fornecedor.$dtFab.$garantia.$obs;
	
	$verifica=mysqli_num_rows(mysqli_query($conexao, "select * from produto where codigo ='{$codigo}'"));
		if ($verifica >= 1) {
		echo "Já existe uma peça com o número especificado<br>";
		
		header('Location: pecaexiste.php');
	}
	 else {
		$query="insert into produto values({$codigo}, '{$nome}', '{$valor}', '{$categoria}', '{$obs}', '{$img}')";
		
		if (mysqli_query($conexao, $query)==true) {
			
			echo "Adicionada com sucesso<br>";
		} else {
			echo "Erro!<br>";
		}
		header('Location: telainicial.php');
	}
	

	
	
?>

<!-- if ( empty($verifica)){
		header('Location: cadastroPeca.php');
		
	} else
	!>
