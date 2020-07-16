<?php
require('../externo/connect.php');

$cod = $_POST['codigo'];
$pesquisar = mysqli_query($connect, "SELECT * FROM $vendas WHERE $codigo = '$cod'");
$vetor = mysqli_fetch_array($pesquisar);
$n = mb_convert_case(trim($_POST['nome_novo']), MB_CASE_UPPER, 'utf-8');
$athos_novo = mb_convert_case(trim($_POST['athos_novo']), MB_CASE_UPPER, 'utf-8');
$referencia_nova = mb_convert_case(trim($_POST['codigo_novo']), MB_CASE_UPPER, 'utf-8');

// pesquisando todos os produtos para verificar se código athos fornecido já está cadastrado
$pesquisar_tudo = mysqli_query($connect, "SELECT * FROM $vendas");
$numero_todos_produtos = mysqli_num_rows($pesquisar_tudo);
$flag = false;

// verificando se o código athos já existe no banco
for ($i=0; $i < $numero_todos_produtos; $i++) { 
    $vetor_todos_produtos = mysqli_fetch_array($pesquisar_tudo);
    if ($athos_novo == $vetor_todos_produtos['cod_athos']) {
        // true se já existe no db
        $flag = true;
    }
}

// o código athos fornecido já existe no banco
if ($flag == true) {
    // pesquisando o produto que contém o código athos fornecido
    $pesquisar_produto_athos = mysqli_query($connect, "SELECT * FROM $vendas WHERE $cod_athos = '$athos_novo'");
    $vetor_produto_athos = mysqli_fetch_array($pesquisar_produto_athos);
    $vetor_codigo_produto_athos = $vetor_produto_athos['codigo'];
    $vetor_nome_produto_athos = $vetor_produto_athos['nome'];
    
    // se o código do banco passado pelo POST for diferente ao do produto com o código athos cadastrado, não atualiza nada
    // mostra o nome do produto que contém o código athos
    if ($vetor_codigo_produto_athos != $cod) {
        echo $vetor_nome_produto_athos;
    // se o código do banco passado pelo POST for igual ao do produto com o código athos cadastrado, atualiza tudo
    } else {
        $alterar = mysqli_query($connect, "UPDATE $vendas SET $id = '$referencia_nova', $cod_athos = '$athos_novo', $nome = '$n' WHERE $codigo = '$cod'");
        echo "2";
    }
// se o código athos fornecido não existir no banco, atualiza tudo
} else {
    $alterar = mysqli_query($connect, "UPDATE $vendas SET $id = '$referencia_nova', $cod_athos = '$athos_novo', $nome = '$n' WHERE $codigo = '$cod'");
    echo "1";
}

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