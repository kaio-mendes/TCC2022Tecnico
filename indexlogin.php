<?php
session_start();



include ('conexao.php');

if(empty($_POST['email']) || empty($_POST['password'])) { //nao permite acessar pagina sem preencher campos email e senha
	header('Location: login.php');
	exit();
}



$email = mysqli_real_escape_string($conexao, $_POST['email']);
$password = mysqli_real_escape_string($conexao, $_POST['password']);

$query = "select EMAIL, SENHA from usuarios where EMAIL = '{$email}' and SENHA = '{$password}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['email'] = $email;
	header('Location: telainicial.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: login.php');
	exit();
	
}

?>