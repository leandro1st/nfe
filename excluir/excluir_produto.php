<?php 
	require('../externo/connect.php');

	#$adicionar = $_POST['adicionar'];
	$cod = $_POST['codigo_produto'];
    $excluir = mysqli_query($connect, "DELETE FROM $vendas WHERE $codigo = '$cod'");
?>
