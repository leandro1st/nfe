<?php
require('../externo/connect.php');
$procurar = mysqli_query($connect, "SELECT * FROM $vendas ORDER BY nome ASC");
$numero = mysqli_num_rows($procurar);
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>NF-e | Excluir Produtos</title>
    <link rel="stylesheet" href="../externo/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" href="../imagens/nfe.ico" type="image/x-icon">
    <link rel="stylesheet" href="../externo/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="../externo/jquery/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="../externo/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function nomeProduto(nome, codigo) {
            document.getElementById("nome1_modal").innerHTML = nome;
            document.getElementById("nome2_modal").innerHTML = nome;
            document.getElementById("id_modal").value = codigo;
        }

        function excluir(id) {
            $.ajax({
                method: "POST",
                url: "excluir_produto.php",
                data: $("#form-" + id + '').serialize(),
                success: function(data) {
                    $('#linha-' + id).fadeOut(300, function() {
                        $('#linha-' + id).remove();
                    });
                    //ok
                },
            });
        }
        $(document).ready(function() {
            $('#nome_produto').autocomplete({
                source: "../pesquisar/pesquisar_autocomplete.php",
                minLength: 1,
                select: function(event, ui) {
                    $('#nome_produto').val(ui.item.value);
                    $('#form_pesquisa').submit();
                },
                appendTo: "#div_autocomplete"
            }).data('ui-autocomplete')._renderItem = function(ul, item) {
                return $("<li class='ui-autocomplete-row'></li>")
                    .data("item.autocomplete", item)
                    .append(item.label)
                    .appendTo(ul);
            };
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../">
            <img src="../imagens/logo.png" alt="logo" width="35px">
            <!-- <i class="far fa-calendar-alt" style="font-size: 35px;"></i> -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item px-1">
                    <a class="nav-link" href="../"><i class="fas fa-home" style="font-size: 24px; vertical-align: middle"></i></a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link" href="../cadastrar/"><i class="fas fa-edit text-success" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
                <li class="nav-item px-1 active">
                    <a class="nav-link underline" href="javascript:void(0)"><i class="far fa-trash-alt text-danger" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
            </ul>
            <form id="form_pesquisa" class="form-inline my-2 my-lg-0" method="POST" action="../alterar/">
                <input class="form-control mr-sm-2" id="nome_produto" name="nome_produto" placeholder="Nome/Código do banco" aria-label="Search" autocomplete="off" style="width: 300px; background-color: #eee; border-radius: 9999px; border: none; padding-left: 20px; padding-right: 42px">
                <div id="div_autocomplete">
                </div>
                <button type="submit" style="position: absolute; margin-left: 259px; border: none; cursor: pointer"><i class="fas fa-search text-success"></i></button>
            </form>
        </div>
    </nav>
    <nav aria-label="breadcrumb" style="position: absolute; z-index: 1;">
        <ol class="breadcrumb" style="background: none; margin: 0;">
            <li class="breadcrumb-item"><a href="../"><i class="fas fa-home"></i> Página Inicial</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)" class="none_li"><i class="far fa-trash-alt"></i> Excluir Produtos</a></li>
        </ol>
    </nav>
    <div class="jumbotron" style="background-image: url('../imagens/wallpaper.jpg'); background-size: cover; background-position: center; padding: 100px; border-radius: 0">
        <center>
            <h1>
                <font color="white">Excluir Produtos</font>
            </h1>
        </center>
    </div>
    <main class="container">
        <?php if ($numero > 0) { ?>
            <table class="table table-striped table-light table-hover" id="tabela_produtos">
                <thead>
                    <tr align="center" class="table-warning">
                        <th class="theader_top" width="">Banco</th>
                        <th class="theader_top" width="10%">Athos</th>
                        <th class="theader_top">Referência</th>
                        <th class="theader_top">Nome do produto</th>
                        <th class="theader_top">
                            <i class="far fa-trash-alt" style="color: red; font-size: 22px;"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 0;
                    for ($i = 0; $i < $numero; $i++) {
                        $vetor = mysqli_fetch_array($procurar);
                    ?>
                        <form id="form-<?php echo $vetor['codigo']; ?>" method="POST">
                            <?php
                            $file_explode = explode('.', $vetor['imagem']);
                            $file_ext = strtolower(end($file_explode));
                            $extensions = array("jpeg", "jpg", "png", "gif", "webp");

                            if (($file_ext == "") || (in_array($file_ext, $extensions) === false)) { ?>
                                <tr id="linha-<?php echo $vetor['codigo']; ?>" data-toggle="tooltip" data-html="true" data-placement="top" title="<i class='fas fa-image' style='font-size: 16px; color: #92b0b3'></i>">
                                <?php } else { ?>
                                <tr id="linha-<?php echo $vetor['codigo']; ?>" data-toggle="tooltip" data-html="true" data-placement="top" title="<img src='../produtos/<?php echo $vetor['imagem'] ?>' width='130px'><br><span class='text-center'><?php echo $vetor['imagem'] ?></span>">
                                <?php } ?>
                                <input type="hidden" class="form-control" name="codigo_produto" value="<?php echo $vetor['codigo']; ?>">
                                <td class="align-middle" align="center"><b><?php echo $vetor['codigo']; ?></b></td>
                                <td class="align-middle" align="center"><b><?php echo $vetor['cod_athos']; ?></b></td>
                                <td class="align-middle" align="center"><b><?php echo $vetor['id']; ?></b></td>
                                <td class="align-middle" width="75%" style="max-width: 400px; word-wrap: break-word;"><b><?php echo $vetor['nome']; ?></b></td>
                                <td align="center" width="7%">
                                    <i class="fas fa-times" data-toggle="modal" data-target="#modalExcluir" onclick="nomeProduto('<?php echo $vetor['nome']; ?>', '<?php echo $vetor['codigo']; ?>')" style="color: red; font-size: 28px; cursor: pointer;">
                                </td>
                                </tr>
                        </form>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <script>
                $(document).ready(function() {
                    if (window.matchMedia("(max-width:1366px)").matches) {
                        document.getElementById("footer1").style.marginBottom = "-269px";
                    } else if (window.matchMedia("(min-width:1600px) and (max-width:1920px)").matches) {
                        document.getElementById("footer1").style.marginBottom = "-68px";
                    }
                });
            </script>
            <p class="lead" style="padding-top: 13%; font-size: 40px; text-align: center">Não há nenhum registro a ser excluído!</p>
        <?php } ?>
    </main>
    <footer id="footer1" class="footer" style="margin-bottom: -250px">
        <!-- Footer Elements -->
        <div style="background-color: #3e4551; padding: 16px">
            <center>
                <div class="row" style="display: inline-block">
                    <a href="https://www.facebook.com/sakamototen/" class="btn-social btn-facebook" style="margin-right: 40px;"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://github.com/leandro1st" class="btn-social btn-github" style="margin-right: 40px;"><i class="fab fa-github"></i></a>
                    <a href="https://www.instagram.com/sakamototen/" class="btn-social btn-instagram" style="margin-right: 40px;"><i class="fab fa-instagram"></i></a>
                </div>
            </center>
        </div>
        <!-- Footer Elements -->
        <!-- Copyright -->
        <div class="text-center" style="background-color: #323741; padding: 16px; color: #dddddd">©
            2019 Copyright –
            <a href="https://sakamototen.com.br/" style="text-decoration: none"> SakamotoTen – Produtos Orientais e
                Naturais</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle" class="text-danger" style="word-break: break-word">
                        Deseja realmente excluir <font color="#d9534f" id="nome1_modal"></font>?
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col" style="word-break: break-word">
                            <input id="id_modal" type="hidden" value="">
                            <h5 class="text-warning">Você irá excluir <font id="nome2_modal"></font>!</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="btn_modal_excluir" class="btn btn-danger" onclick="excluir(document.getElementById('id_modal').value)" data-dismiss="modal">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>