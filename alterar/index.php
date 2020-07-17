<?php
if (isset($_POST['nome_produto'])) {
    require('../externo/connect.php');
    $produto = mb_convert_case(trim($_POST['nome_produto']), MB_CASE_UPPER, 'utf-8');
    if ($produto == '' || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $produto)) {
        $numero = 0;
    } else {
        $procurar = mysqli_query($connect, "SELECT * FROM $vendas WHERE $codigo = '$produto'"); /* WHERE $nome like '%" . $produto . "%' or $id like '%" . $produto . "%' */
        $numero = mysqli_num_rows($procurar);
        $vetor = mysqli_fetch_array($procurar);
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title id="titulo_site">
            <?php
            if ($produto == '' || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $produto)) {
                echo "NF-e | Pesquisar";
            } else if ($numero > 0) {
                echo "NF-e | " . $vetor['nome'] . "";
            } else {
                echo "NF-e | " . trim($_POST['nome_produto']) . "";
            }
            ?>
        </title>
        <link rel="stylesheet" href="../externo/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="shortcut icon" href="../imagens/nfe.ico" type="image/x-icon">
        <link rel="stylesheet" href="../externo/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
        <script src="../externo/jquery/jquery-3.4.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
        <script src="../externo/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            function alterar(nome, athos, id) {
                $.ajax({
                    method: "POST",
                    url: "alterar.php",
                    data: $("#form-alterar").serialize(),
                    success: function(data) {
                        // unfocusing input 'athos' to avoid 1+ submit
                        $('#athos').blur();
                        // alert(data);
                        // se código athos não existir no db
                        if (data == "1" || data == "2") {
                            document.getElementById('titulo_site').innerHTML = 'NF-e | ' + nome.trim().toUpperCase();
                            document.getElementById('titulo_principal').innerHTML = nome.trim().toUpperCase();
                            document.getElementById('link_titulo').innerHTML = '<i class="fas fa-search text-white"></i> Pesquisar | ' + nome.trim().toUpperCase();

                            // informações do modal
                            document.getElementById('nome_antigo_modal').innerHTML = document.getElementById('nome_antigo').value.trim();
                            document.getElementById('nome_novo_modal').innerHTML = nome.trim().toUpperCase();
                            document.getElementById('athos_antigo_modal').innerHTML = document.getElementById('athos_antigo').value.trim();
                            document.getElementById('athos_novo_modal').innerHTML = athos.trim().toUpperCase();
                            document.getElementById('referencia_antiga_modal').innerHTML = document.getElementById('referencia_antiga').value.trim();
                            document.getElementById('referencia_nova_modal').innerHTML = id.trim().toUpperCase();
                            $('#modalAlteradoInfo').modal('show');
                        } else {
                            document.getElementById('span_repetido').innerHTML = "O código Athos <span class='lead text-warning'><b>(" + athos + ")</b></span> já está sendo utilizado por <span class='lead text-warning'><b>" + data + "</b></span>!";
                            $('#modalRepetido').modal('show');
                            document.getElementById('athos').value = document.getElementById('athos_antigo').value;
                        }
                    },
                });
            }

            // Resentando o valor do input, pois o cursor estava começando da direita
            $(document).ready(function() {
                var copia_nome = document.getElementById('nome').value.trim();
                document.getElementById('nome').value = '';
                document.getElementById('nome').value = copia_nome;
                document.getElementById('nome').focus();
            });

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

            // validador de input
            function validar_inputs() {
                var nome_input = $("#nome").val().trim();
                var athos_input = $("#athos").val().trim();
                var referencia_input = $("#id").val().trim();

                if (nome_input && athos_input && referencia_input) {
                    document.getElementById('btn_enviar').className = 'btn btn-lg btn-success';
                    document.getElementById('btn_enviar').disabled = false;
                    document.getElementById('btn_enviar').style.cursor = 'pointer';
                } else {
                    document.getElementById('btn_enviar').className = 'btn btn-lg btn-danger';
                    document.getElementById('btn_enviar').disabled = true;
                    document.getElementById('btn_enviar').style.cursor = 'not-allowed';
                }
            }
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
                    <li class="nav-item px-1">
                        <a class="nav-link" href="../excluir/"><i class="far fa-trash-alt text-danger" style="font-size: 24px; vertical-align: middle"></i> </a>
                    </li>
                    <li class="nav-item px-1 active">
                        <a class="nav-link underline" href="javascript:void(0)"><i class="fas fa-search text-white" style="font-size: 24px; vertical-align: middle"></i> </a>
                    </li>
                </ul>
                <form id="form_pesquisa" class="form-inline my-2 my-lg-0" method="POST" action="./">
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
                <li class="breadcrumb-item active">
                    <a id="link_titulo" href="javascript:void(0)" class="none_li"><i class="fas fa-search text-white"></i>
                        <?php
                        if ($produto == '' || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $produto)) {
                            echo "Pesquisar";
                        } else if ($numero > 0) {
                            echo  "Pesquisar | " . $vetor['nome'];
                        } else {
                            echo "Pesquisar | " . trim($_POST['nome_produto']) . "";
                        }
                        ?>
                    </a>
                </li>
            </ol>
        </nav>
        <div class="jumbotron" style="background-image: url('../imagens/wallpaper.jpg'); background-size: cover; background-position: center; padding: 100px; border-radius: 0">
            <center>
                <h1>
                    <font id="titulo_principal" color="white">
                        <?php if ($produto == '' || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $produto)) { ?>
                            Pesquisar
                        <?php } else if ($numero > 0) {
                            echo $vetor['nome'];
                        } else {
                            echo "Pesquisar";
                        } ?>
                    </font>
                </h1>
            </center>
        </div>
        <main class="container">
            <?php
            $contador = 0;
            if ($numero > 0) {
            ?>
                <form id="form-alterar" method="POST" class="needs-validation" novalidate onsubmit="event.preventDefault(); alterar(document.getElementById('nome').value, document.getElementById('athos').value, document.getElementById('id').value); return false;">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-3" style="padding: 22px 0px 0px 40px">
                                <?php
                                $file_explode = explode('.', $vetor['imagem']);
                                $file_ext = strtolower(end($file_explode));
                                $extensions = array("jpeg", "jpg", "png", "gif", "webp");

                                if (($file_ext == "") || (in_array($file_ext, $extensions) === false)) { ?>
                                    <fieldset id="sem_imagem" class="img-thumbnail text-center" style="padding: 40px; background-color: #575759">
                                        <div>
                                            <i class="fas fa-image" style="font-size: 40px; color: white; margin-bottom: 10px"></i>
                                        </div>
                                        <div style="margin: 0 -40px 0 -40px">
                                            <span class="font-weight-bold" style="font-size: 14px; color: white">IMAGEM NÃO CADASTRADA</span>
                                        </div>
                                    </fieldset>
                                <?php } else { ?>
                                    <img src="../produtos/<?php echo $vetor['imagem'] ?>" class="rounded card-img" alt="Foto Produto">
                                <?php } ?>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body" style="margin-bottom: 3rem">
                                    <!-- <p class="card-text text-muted bd-callout bd-callout-warning">
                                        <small>*Não é necessário preencher todos os campos!</small>
                                    </p> -->
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label for="nome" class="lead">
                                                <b>Nome novo:</b>
                                            </label>
                                            <!-- Nome antigo modal -->
                                            <input type="hidden" id="nome_antigo" class="form-control" value="<?php echo $vetor['nome'] ?>">
                                            <input type="text" id="nome" name="nome_novo" class="form-control" placeholder="Nome novo" value="<?php echo $vetor['nome'] ?>" required onkeyup="validar_inputs()">
                                            <div class="invalid-feedback">
                                                Forneça o nome novo do produto!
                                            </div>
                                        </div>
                                    </p>
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label for="athos" class="lead">
                                                <b>Código Athos novo:</b>
                                            </label>
                                            <!-- Código athos antigo modal -->
                                            <input type="hidden" id="athos_antigo" class="form-control" value="<?php echo $vetor['cod_athos'] ?>">
                                            <input type="text" id="athos" name="athos_novo" class="form-control" placeholder="Novo código Athos" value="<?php echo $vetor['cod_athos'] ?>" required onkeyup="validar_inputs()">
                                            <div class="invalid-feedback">
                                                Forneça o código Athos novo do produto!
                                            </div>
                                        </div>
                                    </p>
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label for="id" class="lead">
                                                <b>Referência nova:</b>
                                            </label>
                                            <!-- Referência antiga modal -->
                                            <input type="hidden" id="referencia_antiga" class="form-control" value="<?php echo $vetor['id'] ?>">
                                            <input type="text" id="id" name="codigo_novo" class="form-control" placeholder="Nova referência Athos" value="<?php echo $vetor['id'] ?>" required onkeyup="validar_inputs()">
                                            <div class="invalid-feedback">
                                                Forneça a referência nova do produto!
                                            </div>
                                        </div>
                                    </p>
                                    <input type="hidden" name="codigo" class="form-control" value="<?php echo $vetor['codigo'] ?>">
                                    <button id="btn_enviar" type="submit" class="btn btn-lg btn-success" style="float: right">Alterar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else if ($produto == '' || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $produto)) { ?>
                <script>
                    $(document).ready(function() {
                        if (window.matchMedia("(max-width:1366px)").matches) {
                            document.getElementById("footer1").style.marginBottom = "-269px";
                        } else if (window.matchMedia("(min-width:1600px) and (max-width:1920px)").matches) {
                            document.getElementById("footer1").style.marginBottom = "-68px";
                        }
                    });
                </script>
                <p class="lead" style="padding-top: 13%; font-size: 40px; text-align: center">Nenhum código do banco fornecido!</p>
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
                <p class="lead" style="padding-top: 13%; font-size: 40px; text-align: center">Nenhum cadastro encontrado!</p>
            <?php } ?>
        </main>

        <!-- Modal alteração -->
        <div class="modal fade" id="modalAlteradoInfo" tabindex="-1" role="dialog" aria-labelledby="modalAlteradoInfoTitle" aria-hidden="true" onkeypress="$('#modalAlteradoInfo').modal('toggle');">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-success" id="modalTitle">
                            Informações alteradas!
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="text-center text-warning table-warning lead">
                                        <th width="17%"></th>
                                        <th>ANTIGO</th>
                                        <th>NOVO</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr class="lead">
                                        <td class="text-right">
                                            <b>Nome</b>
                                        </td>
                                        <td>
                                            <span id="nome_antigo_modal"></span>
                                        </td>
                                        <td>
                                            <span class="text-success" id="nome_novo_modal"></span>
                                        </td>
                                    </tr>
                                    <tr class="lead">
                                        <td class="text-right">
                                            <b>Cód. Athos</b>
                                        </td>
                                        <td>
                                            <span id="athos_antigo_modal"></span>
                                        </td>
                                        <td>
                                            <span class="text-success" id="athos_novo_modal"></span>
                                        </td>
                                    </tr>
                                    <tr class="lead">
                                        <td class="text-right">
                                            <b>Referência</b>
                                        </td>
                                        <td>
                                            <span id="referencia_antiga_modal"></span>
                                        </td>
                                        <td>
                                            <span class="text-success" id="referencia_nova_modal"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal codigo athos repetido -->
        <div class="modal fade" id="modalRepetido" tabindex="-1" role="dialog" aria-labelledby="modalRepetidoTitle" aria-hidden="true" onkeypress="$('#modalRepetido').modal('toggle');">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-warning" id="modalTitle">
                            Código Athos repetido!
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <span id="span_repetido"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();

            // onkeyup validation
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('keyup', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
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
    </body>

    </html>
<?php } else { ?>
    <script>
        window.location.href = '../';
    </script>
<?php } ?>