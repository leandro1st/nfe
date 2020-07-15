<?php 

if (!isset($_POST['btn_modal_excluir'])) {
    header("location:../");
} else {

require('../externo/connect.php');

$contador = $_POST['input_contador'];
$zerar_tudo = mysqli_query($connect, "UPDATE $vendas SET $quantidade = 0, $ultima_mod = '0000-00-00 00:00:00'");
$zerar_observacao = mysqli_query($connect, "UPDATE $observacao SET $ultima_data = '0000-00-00'");
// $quantidade = mysqli_affected_rows($connect);

?>
<html lang="en">

<head>
    <title>NF-e | Zerar Registros</title>
    <link rel="shortcut icon" href="../imagens/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../externo/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../externo/style.css">
    <script src="../externo/jquery/jquery-3.4.0.min.js"></script>
    <script src="../externo/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#modalExcluido').modal('show');
        });
    </script>
</head>

<body>
    <div class="modal fade" id="modalExcluido" tabindex="-1" role="dialog" aria-labelledby="modalExcluidoTitle" aria-hidden="true" onblur="window.location.replace('../')" onkeypress="window.location.replace('../')">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle">
                        <font class="text-success"><?php echo $contador . " registro(s) zerado(s) com sucesso!" ?></font>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.replace('../')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <?php if ($contador == 0) { ?>
                            <h5>Nenhum registro foi zerado!</h5>
                        <?php } else if ($contador == 1) { ?>
                            <h5><?php echo $contador ?> registro zerado com sucesso!</h5>
                        <?php } else { ?>
                            <h5><?php echo $contador ?> registros zerados com sucesso!</h5>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.location.replace('../')">OK</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>