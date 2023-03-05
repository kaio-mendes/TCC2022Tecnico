<?php
	
	require_once('classes.php');
	
	session_start();
	
	$conexao=mysqli_connect('localhost:3307', 'root', '', 'peca') or die('Nao foi possível conectar ao banco de dados');
	mysqli_set_charset($conexao,"utf8");
	
	//$peca=$_POST['peca'];
	//$quantidade=$_POST['quantidade'];
	$codigo=$_POST['delete'];
	
	
	//$_SESSION['mat'] = $mat;
	//$_SESSION['pw'] = $pw;
	//echo $_SESSION['mat']."/".$_SESSION['pw'];
	//echo $num.$tipo.$modelo.$fornecedor.$dtFab.$garantia.$obs;

	$query="delete from produto where codigo='{$codigo}'";
	
	echo $query."<br>";
		
	if (mysqli_query($conexao, $query)==true) {
		echo "Removida com sucesso<br>";
		header('Location: telainicial.php');
	} else {
		echo "Erro!<br>";
	}

?>