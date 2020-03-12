<?php 
	$connect = mysqli_connect("localhost", "root", "") or die("<center>Ocorreu um erro ao estabelecer conexão com nossos servidores! Por favor, tente mais tarde.</center>");
	$select_db = mysqli_select_db($connect, "nfe") or die("<center>Ocorreu um erro ao estabelecer conexão com nosso Banco de Dados! Por favor, tente mais tarde.</center>");

	$vendas = "vendas";
	$observacao = "observacao";

	$quantidade = "quantidade";
	$id = "id";
	$codigo = "codigo";
	$nome = "nome";
	$ultima_mod = "ultima_mod";
	$ultima_data = "ultima_data";
?>