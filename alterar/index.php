<?php
require('../externo/connect.php');
$produto = mb_convert_case(trim($_POST['nome_produto']), MB_CASE_UPPER, 'utf-8');
$procurar = mysqli_query($connect, "SELECT * FROM $vendas WHERE $nome like '%" . $produto . "%' or $id like '%" . $produto . "%'");
$numero = mysqli_num_rows($procurar);
$vetor = mysqli_fetch_array($procurar);
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title id="titulo_site">NF-e | <?php echo $vetor['nome'] ?></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" href="../imagens/nfe.ico" type="image/x-icon">
    <link rel="stylesheet" href="../externo/style.css">
    <script src="../jquery/jquery-3.4.0.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function alterar(nome, id) {
            $.ajax({
                method: "POST",
                url: "alterar.php",
                data: $("#form-alterar").serialize(),
                success: function(data) {
                    if ((nome != '' && nome != null) && (id != '' && id != null)) {
                        alert(data);
                        document.getElementById('titulo_site').innerHTML = 'NF-e | ' + nome.toUpperCase();
                        document.getElementById('mostrar_titulo').innerHTML = nome.toUpperCase();
                        document.getElementById('mostrar_nome').innerHTML = nome.toUpperCase();
                        document.getElementById('mostrar_codigo').innerHTML = id.toUpperCase();
                    } else if (nome != '' && nome != null) {
                        alert(data);
                        document.getElementById('titulo_site').innerHTML = 'NF-e | ' + nome.toUpperCase();
                        document.getElementById('mostrar_titulo').innerHTML = nome.toUpperCase();
                        document.getElementById('mostrar_nome').innerHTML = nome.toUpperCase();
                    } else if (id != '' && id != null) {
                        alert(data);
                        document.getElementById('mostrar_codigo').innerHTML = id.toUpperCase();
                    }
                    //ok
                },
            });
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
                    <a class="nav-link text-success" href="../cadastrar/">Cadastrar <i class="fas fa-plus-circle text-success" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link text-danger" href="../excluir/">Excluir <i class="far fa-trash-alt text-danger" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
                <li class="nav-item px-1 active underline">
                    <a class="nav-link text-primary" href="#">Editar <i class="far fa-edit text-primary" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="./">
				<input class="form-control mr-sm-2" name="nome_produto" placeholder="Nome do produto" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
			</form>
        </div>
    </nav>
    <nav aria-label="breadcrumb" style="position: absolute; z-index: 1;">
        <ol class="breadcrumb" style="background: none; margin: 0;">
            <li class="breadcrumb-item"><a href="../"><i class="fas fa-home"></i> Página Inicial</a></li>
            <li class="breadcrumb-item active"><a href="#" class="none_li"><i class="far fa-trash-alt"></i> Editar Produto</a></li>
        </ol>
    </nav>
    <div class="jumbotron" style="background-image: url('../imagens/wallpaper.jpg'); background-size: cover; background-position: center; padding: 100px; border-radius: 0">
        <center>
            <h1>
                <font color="white">Editar Produto</font><br>
            </h1>
        </center>
    </div>
    <main class="container">
        <?php
        $contador = 0;
        if ($numero > 0) {
            ?>
            <form id="form-alterar" method="POST">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="../produtos/<?php echo $vetor['imagem'] ?>" class="card-img" alt="Foto Produto">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <font id="mostrar_titulo"><?php echo $vetor['nome'] ?></font>
                                </h5>
                                <p class="card-text lead">
                                    Código: <b><?php echo $vetor['codigo'] ?></b>
                                </p>
                                <p class="card-text lead">
                                    Nome do produto: <b>
                                        <font id="mostrar_nome"><?php echo $vetor['nome'] ?></font>
                                    </b>
                                </p>
                                <p class="card-text lead">
                                    Referência Athos: <b>
                                        <font id="mostrar_codigo"><?php echo $vetor['id'] ?></font>
                                    </b>
                                </p><br>
                                <p class="card-text lead">
                                    <input type="hidden" name="codigo" class="form-control" value="<?php echo $vetor['codigo'] ?>">
                                    <input type="text" id="nome" name="nome_novo" class="form-control" placeholder="Nome novo" autofocus>
                                </p>
                                <p class="card-text lead">
                                    <input type="text" id="id" name="codigo_novo" class="form-control" placeholder="Nova referência Athos">
                                </p>
                                <button type="button" class="btn btn-lg btn-success" style="float: right" onclick="alterar(document.getElementById('nome').value, document.getElementById('id').value)">Alterar</button><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <br><br>
            <center><p class="lead" style="font-size: 30px;">Nenhum cadastro encontrado!</p></center>
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