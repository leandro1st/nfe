<?php 

if (!isset($_POST['btn_modal_excluir'])) {
    header("location:../");
} else {

require('../externo/connect.php');

$zerar_tudo = mysqli_query($connect, "UPDATE $vendas SET $quantidade = 0");
// $pesquisar = mysqli_query($connect, "SELECT quantidade FROM $vendas WHERE $quantidade > 0");
// $quantidade = mysqli_num_rows($pesquisar);
$quantidade = mysqli_affected_rows($connect);

?>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../imagens/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../externo/style.css">
    <script src="../jquery/jquery-3.4.0.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#modalExcluido').modal('show');
        });
    </script>
</head>

<body>
    <div class="modal fade" id="modalExcluido" tabindex="-1" role="dialog" aria-labelledby="modalExcluidoTitle" aria-hidden="true" onblur="window.history.go(-1)" onkeypress="window.history.go(-1)">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle">
                        <font class="text-success"><?php echo $quantidade . " registros zerados com sucesso!" ?></font>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.history.go(-1)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <?php if ($quantidade == 0) { ?>
                            <h5>Nenhum registro a ser zerado!</h5>
                        <?php } else if ($quantidade == 1) { ?>
                            <h5><?php echo $quantidade ?> registro zerado com sucesso!</h5>
                        <?php } else { ?>
                            <h5><?php echo $quantidade ?> registros zerados com sucesso!</h5>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.history.go(-1)">OK</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>