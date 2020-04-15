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
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="shortcut icon" href="../imagens/nfe.ico" type="image/x-icon">
        <link rel="stylesheet" href="../externo/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
        <script src="../jquery/jquery-3.4.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            function alterar(nome, athos, id) {
                $.ajax({
                    method: "POST",
                    url: "alterar.php",
                    data: $("#form-alterar").serialize(),
                    success: function(data) {
                        if ((nome.trim() != '' && nome.trim() != null) && (athos.trim() != '' && athos.trim() != null) && (id.trim() != '' && id.trim() != null)) {
                            alert(data);
                            document.getElementById('titulo_site').innerHTML = 'NF-e | ' + nome.toUpperCase();
                            document.getElementById('titulo_principal').innerHTML = nome.toUpperCase();
                            document.getElementById('link_titulo').innerHTML = '<i class="fas fa-search text-white"></i> Pesquisar | ' + nome.toUpperCase();
                            document.getElementById('mostrar_titulo').innerHTML = nome.toUpperCase();
                            // document.getElementById('mostrar_nome').innerHTML = nome.toUpperCase();
                            document.getElementById('mostrar_athos').innerHTML = athos.toUpperCase();
                            document.getElementById('mostrar_codigo').innerHTML = id.toUpperCase();
                        } else if ((nome.trim() != '' && nome.trim() != null) && (athos.trim() != '' && athos.trim() != null)) {
                            alert(data);
                            document.getElementById('titulo_site').innerHTML = 'NF-e | ' + nome.toUpperCase();
                            document.getElementById('titulo_principal').innerHTML = nome.toUpperCase();
                            document.getElementById('link_titulo').innerHTML = '<i class="fas fa-search text-white"></i> Pesquisar | ' + nome.toUpperCase();
                            document.getElementById('mostrar_titulo').innerHTML = nome.toUpperCase();
                            // document.getElementById('mostrar_nome').innerHTML = nome.toUpperCase();
                            document.getElementById('mostrar_athos').innerHTML = athos.toUpperCase();
                        } else if ((nome.trim() != '' && nome.trim() != null) && (id.trim() != '' && id.trim() != null)) {
                            alert(data);
                            document.getElementById('titulo_site').innerHTML = 'NF-e | ' + nome.toUpperCase();
                            document.getElementById('titulo_principal').innerHTML = nome.toUpperCase();
                            document.getElementById('link_titulo').innerHTML = '<i class="fas fa-search text-white"></i> Pesquisar | ' + nome.toUpperCase();
                            document.getElementById('mostrar_titulo').innerHTML = nome.toUpperCase();
                            // document.getElementById('mostrar_nome').innerHTML = nome.toUpperCase();
                            document.getElementById('mostrar_codigo').innerHTML = id.toUpperCase();
                        } else if ((athos.trim() != '' && athos.trim() != null) && (id.trim() != '' && id.trim() != null)) {
                            alert(data);
                            document.getElementById('mostrar_athos').innerHTML = athos.toUpperCase();
                            document.getElementById('mostrar_codigo').innerHTML = id.toUpperCase();
                        } else if (nome.trim() != '' && nome.trim() != null) {
                            alert(data);
                            document.getElementById('titulo_site').innerHTML = 'NF-e | ' + nome.toUpperCase();
                            document.getElementById('titulo_principal').innerHTML = nome.toUpperCase();
                            document.getElementById('link_titulo').innerHTML = '<i class="fas fa-search text-white"></i> Pesquisar | ' + nome.toUpperCase();
                            document.getElementById('mostrar_titulo').innerHTML = nome.toUpperCase();
                            // document.getElementById('mostrar_nome').innerHTML = nome.toUpperCase();
                        } else if (athos.trim() != '' && athos.trim() != null) {
                            alert(data);
                            document.getElementById('mostrar_athos').innerHTML = athos.toUpperCase();
                        } else if (id.trim() != '' && id.trim() != null) {
                            alert(data);
                            document.getElementById('mostrar_codigo').innerHTML = id.toUpperCase();
                        }
                        //ok
                    },
                });
            }
            $(document).ready(function() {
                $('#nome_produto').autocomplete({
                    source: "../alterar/pesquisar_autocomplete.php",
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
                        <a class="nav-link underline" href="#"><i class="fas fa-search text-white" style="font-size: 24px; vertical-align: middle"></i> </a>
                    </li>
                </ul>
                <form id="form_pesquisa" class="form-inline my-2 my-lg-0" method="POST" action="./">
                    <input class="form-control mr-sm-2" id="nome_produto" name="nome_produto" placeholder="Nome/Referência do produto" aria-label="Search" autocomplete="off" style="width: 300px; background-color: #eee; border-radius: 9999px; border: none; padding-left: 20px; padding-right: 42px">
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
                    <a id="link_titulo" href="#" class="none_li"><i class="fas fa-search text-white"></i>
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
                <form id="form-alterar" method="POST" onsubmit="event.preventDefault(); alterar(document.getElementById('nome').value, document.getElementById('athos').value, document.getElementById('id').value); return false;">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-3" style="padding: 22px 0px 0px 40px">
                                <?php
                                $file_explode = explode('.', $vetor['imagem']);
                                $file_ext = strtolower(end($file_explode));
                                $extensions = array("jpeg", "jpg", "png", "gif");

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
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <font id="mostrar_titulo"><?php echo $vetor['nome'] ?></font>
                                    </h5>
                                    <p class="card-text lead">
                                        Código (banco de dados): <b><?php echo $vetor['codigo'] ?></b>
                                    </p>
                                    <!-- <p class="card-text lead">
                                        Nome do produto: <b>
                                            <font id="mostrar_nome"><?php echo $vetor['nome'] ?></font>
                                        </b>
                                    </p> -->
                                    <p class="card-text lead">
                                        Código Athos: <b>
                                            <font id="mostrar_athos"><?php echo $vetor['cod_athos'] ?></font>
                                        </b>
                                    </p>
                                    <p class="card-text lead">
                                        Referência Athos: <b>
                                            <font id="mostrar_codigo"><?php echo $vetor['id'] ?></font>
                                        </b>
                                    </p>
                                    <p class="card-text text-muted bd-callout bd-callout-warning">
                                        <small>*Não é necessário preencher todos os campos!</small>
                                    </p>
                                    <p class="card-text">
                                        <input type="hidden" name="codigo" class="form-control" value="<?php echo $vetor['codigo'] ?>">
                                        <input type="text" id="nome" name="nome_novo" class="form-control" placeholder="Nome novo" autofocus>
                                    </p>
                                    <p class="card-text">
                                        <input type="text" id="athos" name="athos_novo" class="form-control" placeholder="Novo código Athos">
                                    </p>
                                    <p class="card-text">
                                        <input type="text" id="id" name="codigo_novo" class="form-control" placeholder="Nova referência Athos">
                                    </p>
                                    <button type="submit" class="btn btn-lg btn-success" style="float: right">Alterar</button><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else if ($produto == '' || preg_match('/^[\pZ\pC]+|[\pZ\pC]+$/u', $produto)) { ?>
                <br><br>
                <center>
                    <p class="lead" style="font-size: 30px;">Nenhum nome fornecido!</p>
                </center>
            <?php } else { ?>
                <br><br>
                <center>
                    <p class="lead" style="font-size: 30px;">Nenhum cadastro encontrado!</p>
                </center>
            <?php } ?>
        </main><br><br><br><br><br><br><br><br><br>
        <footer class="footer">
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