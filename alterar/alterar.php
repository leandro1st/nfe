<?php
require('../externo/connect.php');

$cod = $_POST['codigo'];
$pesquisar = mysqli_query($connect, "SELECT * FROM $vendas WHERE $codigo = '$cod'");
$vetor = mysqli_fetch_array($pesquisar);
$n = mb_convert_case(trim($_POST['nome_novo']), MB_CASE_UPPER, 'utf-8');
$athos_novo = mb_convert_case(trim($_POST['athos_novo']), MB_CASE_UPPER, 'utf-8');
$referencia_nova = mb_convert_case(trim($_POST['codigo_novo']), MB_CASE_UPPER, 'utf-8');

$alterar = mysqli_query($connect, "UPDATE  $vendas SET $id = '$referencia_nova', $cod_athos = '$athos_novo', $nome = '$n' WHERE $codigo = '$cod'");

/*
// Altera todos os valores
if (($n != null && $n != '') and ($athos_novo != null && $athos_novo != '') and ($referencia_nova != null && $referencia_nova != '')) {
    $alterar = mysqli_query($connect, "UPDATE  $vendas SET $id = '$referencia_nova', $cod_athos = '$athos_novo', $nome = '$n' WHERE $codigo = '$cod'");
    echo $vetor['nome'] . " alterado para " . $n . "\n" . $vetor['cod_athos'] . " alterado para " . $athos_novo . "\n" . $vetor['id'] . " alterado para " . $referencia_nova;
// Altera o nome e o código Athos
} else if (($n != null && $n != '') and ($athos_novo != null && $athos_novo != '')) {
    $alterar = mysqli_query($connect, "UPDATE $vendas SET $cod_athos = '$athos_novo', $nome = '$n' WHERE $codigo = '$cod'");
    echo $vetor['nome'] . " alterado para " . $n . "\n" . $vetor['cod_athos'] . " alterado para " . $athos_novo;
// Altera o nome e a referência
} else if (($n != null && $n != '') and ($referencia_nova != null && $referencia_nova != '')) {
    $alterar = mysqli_query($connect, "UPDATE $vendas SET $id = '$referencia_nova', $nome = '$n' WHERE $codigo = '$cod'");
    echo $vetor['nome'] . " alterado para " . $n . "\n" . $vetor['id'] . " alterado para " . $referencia_nova;
// Altera o código Athos e a referência
} else if (($athos_novo != null && $athos_novo != '') and ($referencia_nova != null && $referencia_nova != '')) {
    $alterar = mysqli_query($connect, "UPDATE $vendas SET $id = '$referencia_nova', $cod_athos = '$athos_novo' WHERE $codigo = '$cod'");
    echo $vetor['cod_athos'] . " alterado para " . $athos_novo . "\n" . $vetor['id'] . " alterado para " . $referencia_nova;
// Altera somente o nome
} else if ($n != null && $n != '') {
    $alterar = mysqli_query($connect, "UPDATE $vendas SET $nome = '$n' WHERE $codigo = '$cod'");
    echo $vetor['nome'] . " alterado para " . $n;
// Altera somente o código Athos
} else if ($athos_novo != null && $athos_novo != '') {
    $alterar = mysqli_query($connect, "UPDATE $vendas SET $cod_athos = '$athos_novo' WHERE $codigo = '$cod'");
    echo $vetor['cod_athos'] . " alterado para " . $athos_novo;
// Altera somente a referência
} else if ($referencia_nova != null && $referencia_nova != '') {
    $alterar = mysqli_query($connect, "UPDATE $vendas SET $id = '$referencia_nova' WHERE $codigo = '$cod'");
    echo $vetor['id'] . " alterado para " . $referencia_nova;
} else {
    #
}
*/