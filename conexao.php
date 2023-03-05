<?php 

$conexao = mysqli_connect('localhost:3307', 'root', '', 'cadastro');
	if (mysqli_connect_errno())
	{
	  	echo "Conexão falhou: " . mysqli_connect_error();
	}

?>