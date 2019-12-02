<?php 
	require('../externo/connect.php');

	#$adicionar = $_POST['adicionar'];
	$cod = $_POST['cod'];
	$procurar = mysqli_query($connect, "SELECT * FROM $vendas WHERE $codigo = $cod");
	$vetor = mysqli_fetch_array($procurar);
	$vetor_quantidade = $vetor['quantidade']+1;

	$query = mysqli_query($connect, "UPDATE $vendas SET $quantidade = $vetor_quantidade WHERE $codigo = $cod");
	if($query){
		echo $vetor_quantidade;
	}
?>
