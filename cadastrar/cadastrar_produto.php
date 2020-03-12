<?php

if (!isset($_POST['nome'])) {
    header("location:./");
} else if (trim($_POST['nome'] == "") || trim($_POST['nome'] == null) || trim($_POST['id'] == "") || trim($_POST['id'] == null)) {
    header("location:./");
} else {
    require('../externo/connect.php');

    $n = mb_convert_case(trim($_POST['nome']), MB_CASE_UPPER, 'utf-8');
    $cod =  mb_convert_case(trim($_POST['id']), MB_CASE_UPPER, 'utf-8');

    $pesquisar = mysqli_query($connect, "SELECT * FROM $vendas WHERE $nome = '$n'");
    $numero_produtos = mysqli_fetch_array($pesquisar);
?>
    <html lang="en">

    <head>
        <title>NF-e | Cadastrar Produtos</title>
        <link rel="shortcut icon" href="../imagens/nfe.ico" type="image/x-icon">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../externo/style.css">
        <script src="../jquery/jquery-3.4.0.min.js"></script>
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modalCadastrado').modal('show');
            });
        </script>
    </head>

    <body>
        <?php if (($n == "" && $cod == "") || (preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $n) && preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $cod)) || (preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $n) && $cod == "") || ($n == "" && preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $cod))) { ?>
            <div class="modal fade" id="modalCadastrado" tabindex="-1" role="dialog" aria-labelledby="modalCadastradoTitle" aria-hidden="true" onblur="window.history.go(-1)" onkeypress="window.history.go(-1)">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTitle">
                                <font class="text-danger">Nenhuma informação fornecida!</font>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.history.go(-1)">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <h5 class="lead">Nome e referência do produto não foram fornecidos!</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.history.go(-1)">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else if ($n == "" || $cod == "" || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $n) || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $cod)) { ?>
            <div class="modal fade" id="modalCadastrado" tabindex="-1" role="dialog" aria-labelledby="modalCadastradoTitle" aria-hidden="true" onblur="window.history.go(-1)" onkeypress="window.history.go(-1)">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTitle">
                                <?php if ($n == "" || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $n)) { ?>
                                    <font class="text-danger">Nenhum nome fornecido!</font>
                                <?php } else { ?>
                                    <font class="text-danger">Nenhuma referência fornecida!</font>
                                <?php } ?>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.history.go(-1)">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <?php if ($n == "" || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $n)) { ?>
                                    <h5 class="lead">O nome do produto não foi fornecido!</h5>
                                <?php } else { ?>
                                    <h5 class="lead">A referência do produto não foi fornecida!</h5>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.history.go(-1)">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else if ($numero_produtos > 0) { ?>
            <div class="modal fade" id="modalCadastrado" tabindex="-1" role="dialog" aria-labelledby="modalCadastradoTitle" aria-hidden="true" onblur="window.history.go(-1)" onkeypress="window.history.go(-1)">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTitle">
                                <font class="text-warning"><?php echo $n . " já existe!" ?></font>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.history.go(-1)">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <h5 class="lead"><?php echo $n ?> já foi cadastrado uma vez!</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.history.go(-1)">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="modal fade" id="modalCadastrado" tabindex="-1" role="dialog" aria-labelledby="modalCadastradoTitle" aria-hidden="true" onblur="window.history.go(-1)" onkeypress="window.history.go(-1)">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTitle">
                                <font class="text-success"><?php echo $n . " cadastrado com sucesso!" ?></font>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.history.go(-1)">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <?php
                                $adicionar = mysqli_query($connect, "INSERT INTO $vendas(id, nome, quantidade) VALUES('$cod', '$n', '0')");
                                if ($adicionar) { ?>
                                    <div class="row">
                                        <div class="col-4" style="text-align: right; padding: 0px; margin-left: -35px">
                                            <h5 class="font-weight-bold">Nome:</h5>
                                        </div>
                                        <div class="col" style="padding-left: 10px">
                                            <h5 class="lead"><?php echo $n ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4" style="text-align: right; padding: 0px; margin-left: -35px">
                                            <h5 class="font-weight-bold">Referência:</h5>
                                        </div>
                                        <div class="col" style="padding-left: 10px">
                                            <h5 class="lead"><?php echo $cod ?></h5>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.history.go(-1)">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>

    </html>

<?php }
