<?php 
require('../externo/connect.php');
$zerar_tudo = mysqli_query($connect, "UPDATE $vendas SET $quantidade = 0");
echo "0";
?>