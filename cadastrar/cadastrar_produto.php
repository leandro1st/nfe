<?php
require('../externo/connect.php');

$n = mb_convert_case(trim($_POST['nome']), MB_CASE_UPPER, 'utf-8');
$cod =  mb_convert_case(trim($_POST['id']), MB_CASE_UPPER, 'utf-8');

$pesquisar = mysqli_query($connect, "SELECT * FROM $vendas WHERE $nome = '$n'");
$numero_produtos = mysqli_fetch_array($pesquisar);
if ($numero_produtos > 0) { ?>
    <script>
        alert("<?php echo $n . " já existe!"; ?>");
        window.history.go(-1);
    </script>
    <?php } else {
        $adicionar = mysqli_query($connect, "INSERT INTO $vendas(id, nome, quantidade) VALUES('$cod', '$n', '0')");
        if ($adicionar) { ?>
        <script>
            alert("<?php echo $n .   " - " . $cod . " cadastrado com sucesso!"; ?>");
            window.history.go(-1);
        </script>
<?php
    }
}
