<?php 

require('externo/connect.php');

$cod = $_POST['cod'];
$cod_athos_novo = $_POST['novo_cod_athos'];

$alterar = mysqli_query($connect, "UPDATE $vendas SET $cod_athos = '$cod_athos_novo' WHERE $codigo = '$cod'");

?>