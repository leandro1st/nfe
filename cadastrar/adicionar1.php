<?php 
	require('../externo/connect.php');

	#$adicionar = $_POST['adicionar'];
	$cod = $_POST['cod'];
	$procurar = mysqli_query($connect, "SELECT * FROM $vendas WHERE $codigo = $cod");
	$vetor = mysqli_fetch_array($procurar);
	$vetor_quantidade = $vetor['quantidade']+1;
	
	date_default_timezone_set('America/Sao_Paulo');
	$hora_modificacao = date("Y-m-d H:i:s");
	$query_hora = mysqli_query($connect, "UPDATE $vendas SET $ultima_mod = '$hora_modificacao'  WHERE $codigo = $cod");

	$query = mysqli_query($connect, "UPDATE $vendas SET $quantidade = $vetor_quantidade WHERE $codigo = $cod");
	if($query){
		echo $vetor_quantidade;
	}
	// $host = 'localhost';
	// $user = 'root';
	// exec("C:/xampp/mysql/bin/mysqldump --single-transaction --user=$user --skip-password --host=$host nfe > ../file.sql");
?>
