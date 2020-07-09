<?php

require('../externo/connect.php');

$cod_athos_produto = $_POST['codigo_athos'];

$pesquisa_produto = mysqli_query($connect, "SELECT id_produto, nome, referencia FROM $produtos WHERE $cod_athos = '$cod_athos_produto'");
$vetor_produto = mysqli_fetch_array($pesquisa_produto);

// data
echo $vetor_produto[0] . "|" . $vetor_produto[1] . "|" . $vetor_produto[2];

?>