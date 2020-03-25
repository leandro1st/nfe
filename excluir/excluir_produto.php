<?php 
	require('../externo/connect.php');

	#$adicionar = $_POST['adicionar'];
	$cod = $_POST['codigo_produto'];
	$pesquisar_nome_imagem = mysqli_query($connect, "SELECT imagem FROM $vendas WHERE $codigo = '$cod'");
	$vetor_imagem = mysqli_fetch_array($pesquisar_nome_imagem);
	$nome_imagem = $vetor_imagem['imagem'];
	$excluir = mysqli_query($connect, "DELETE FROM $vendas WHERE $codigo = '$cod'");

	// Deleta a imagem associada ao cadastro
	unlink("../produtos/" . $nome_imagem);
?>
