<!DOCTYPE html>
<html>
<head>
	<title>Cadastrando</title>
</head>
<body>
	<?php
	$con = mysqli_connect('localhost:3307', 'root', '', 'cadastro');
	if (mysqli_connect_errno())
	{
	  	echo "Conexão falhou: " . mysqli_connect_error();
	}
	?>

	<?php
		$nome = $_POST['nome'];
		
		$estado = $_POST['estado'];
		$cidade = $_POST['cidade'];
		$celular = $_POST['celular'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$sql = mysqli_query($con, "INSERT INTO USUARIOS( NOME, ESTADO, CIDADE,CELULAR, EMAIL, SENHA) VALUES('$nome',  '$estado', '$cidade', '$celular', '$email', '$senha')");
		mysqli_close($con);
		//echo "Dados cadastrados com sucesso!";
		
			$_SESSION['nao_autenticado'] = true;
			header('Location: login.php');
			exit();
			

?>
</body>
</html>