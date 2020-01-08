<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>NF-e | Cadastrar Produtos</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" href="../imagens/nfe.ico" type="image/x-icon">
    <link rel="stylesheet" href="../externo/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="../jquery/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#nome_produto').autocomplete({
                source: "../alterar/pesquisar_autocomplete.php",
                minLength: 3,
                select: function(event, ui) {
                    $('#nome_produto').val(ui.item.value);
                }
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
                <li class="nav-item px-1 active underline">
                    <a class="nav-link text-success" href="#">Cadastrar <i class="fas fa-plus-circle text-success" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link text-danger" href="../excluir/">Excluir <i class="far fa-trash-alt text-danger" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="../alterar/">
                <input class="form-control mr-sm-2" id="nome_produto" name="nome_produto" placeholder="Nome do produto" aria-label="Search" autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </div>
    </nav>
    <nav aria-label="breadcrumb" style="position: absolute; z-index: 1;">
        <ol class="breadcrumb" style="background: none; margin: 0;">
            <li class="breadcrumb-item"><a href="../"><i class="fas fa-home"></i> Página Inicial</a></li>
            <li class="breadcrumb-item active"><a href="#" class="none_li"><i class="fas fa-plus-circle"></i> Cadastrar Produto</a></li>
        </ol>
    </nav>
    <div class="jumbotron" style="background-image: url('../imagens/wallpaper.jpg'); background-size: cover; background-position: center; padding: 100px; border-radius: 0">
        <center>
            <h1 style="color: white">Cadastrar Produto</h1>
        </center>
    </div>
    <main class="container">
        <form method="POST" action="cadastrar_produto.php">
            <label for="campo_nome">
                <b>Nome do produto:</b>
            </label>
            <input type="text" id="campo_nome" name="nome" class="form-control" placeholder="Nome do produto" required autofocus><br>
            <label for="campo_id">
                <b>Referência do produto:</b>
            </label>
            <input type="text" id="campo_id" name="id" class="form-control" placeholder="Referência do produto" required><br>
            <button type="submit" class="btn btn-success" style="float: right">Cadastrar</button>
        </form>
    </main><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- Footer -->
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