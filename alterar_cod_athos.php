<?php
require('externo/connect.php');
$procurar = mysqli_query($connect, "SELECT * FROM $vendas ORDER BY nome ASC");
$numero = mysqli_num_rows($procurar);
$pesquisar_maior_id = mysqli_query($connect, "SELECT codigo FROM $vendas ORDER BY codigo DESC LIMIT 1");
$vetor_maior_id = mysqli_fetch_array($pesquisar_maior_id);

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>NF-e</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/nfe.ico" type="image/x-icon">
    <link rel="stylesheet" href="externo/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="jquery/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function text_to_input(codigo) {
            document.getElementById('input-' + codigo).value = '';
            document.getElementById('input-' + codigo).type = 'text';
            document.getElementById('input-' + codigo).focus();
            document.getElementById('texto-' + codigo).innerHTML = '';            
        }

        function cadastrar(codigo, novo_athos) {
            $.ajax({
                method: 'POST',
                url: 'alterando_athos.php',
                data: $('#form-' + codigo).serialize(),
                success: function(data) {
                    document.getElementById('input-' + codigo).type = 'hidden';
                    document.getElementById('texto-' + codigo).innerHTML = novo_athos;
                },
                error: function(data) {
                    alert("Ocorreu um erro!");
                }
            });
        }
    </script>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="imagens/logo.png" alt="logo" width="35px">
            <!-- <i class="far fa-calendar-alt" style="font-size: 35px;"></i> -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item px-1">
                    <a class="nav-link" href="./"><i class="fas fa-home" style="font-size: 24px; vertical-align: middle"></i></a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link" href="cadastrar/"><i class="fas fa-edit text-success" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link" href="excluir/"><i class="far fa-trash-alt text-danger" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
                <li class="nav-item px-1 active">
                    <a class="nav-link underline" href="#"><i class="fas fa-archive text-warning" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="alterar/">
                <input class="form-control mr-sm-2" id="nome_produto" name="nome_produto" placeholder="Nome/Referência do produto" aria-label="Search" autocomplete="off" style="width: 300px; background-color: #eee; border-radius: 9999px; border: none; padding-left: 20px; padding-right: 42px">
                <div id="div_autocomplete">
                </div>
                <button type="submit" style="position: absolute; margin-left: 259px; border: none"><i class="fas fa-search text-success"></i></button>
            </form>
        </div>
    </nav>
    <div class="jumbotron" style="background-image: url('imagens/wallpaper.jpg'); background-size: cover; background-position: center; padding: 100px; border-radius: 0">
        <center>
            <h1 style="color: white">
                <?php
                $meses = array(
                    '01' => 'Janeiro',
                    '02' => 'Fevereiro',
                    '03' => 'Março',
                    '04' => 'Abril',
                    '05' => 'Maio',
                    '06' => 'Junho',
                    '07' => 'Julho',
                    '08' => 'Agosto',
                    '09' => 'Setembro',
                    '10' => 'Outubro',
                    '11' => 'Novembro',
                    '12' => 'Dezembro'
                );
                $mes = $meses[date('m')];
                ?>
                <?php print $mes . ' - ' . date('Y'); ?>
            </h1>
        </center>
    </div>
    <main class="container">
        <table class="table table-striped table-light table-hover" id="tabela_produtos">
            <thead>
                <tr align="center" class="table-warning">
                    <th>Código Athos</th>
                    <th>NOME</th>
                    <th><i class="far fa-edit" style="color: green; font-size: 22px;" data-toggle="tooltip" data-html="true" title="<i><b>Adicionar 1</b></i>"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < $numero; $i++) {
                    $vetor = mysqli_fetch_array($procurar);
                ?>
                    <form id="form-<?php echo $vetor['codigo']; ?>" method="POST">
                        <input type="hidden" class="form-control" id="cod" name="cod" value="<?php echo $vetor['codigo'] ?>">
                        <tr>
                            <td class="align-middle" align="center">
                                <input type="hidden" class="form-control" id="input-<?php echo $vetor['codigo'] ?>" name="novo_cod_athos" value="<?php echo $vetor['cod_athos'] ?>" onblur="cadastrar('<?php echo $vetor['codigo'] ?>', document.getElementById('input-<?php echo $vetor['codigo'] ?>').value)">
                                <span id="texto-<?php echo $vetor['codigo'] ?>" class="font-weight-bold"><?php echo $vetor['cod_athos'] ?></span>
                            </td>
                            <td class="align-middle" width="70%">
                                <b><?php echo $vetor['nome']; ?></b>
                            </td>
                            <td align="center">
                                <i class="fas fa-pen-square text-success" style="font-size: 42px; cursor: pointer" onclick="text_to_input('<?php echo $vetor['codigo'] ?>')"></i>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
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
            <a href="https://sakamototen.com.br/">
                SakamotoTen – Produtos Orientais e Naturais
            </a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

</html>