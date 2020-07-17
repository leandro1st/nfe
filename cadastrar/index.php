<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>NF-e | Cadastrar Produtos</title>
    <link rel="stylesheet" href="../externo/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" href="../imagens/nfe.ico" type="image/x-icon">
    <link rel="stylesheet" href="../externo/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="../externo/jquery/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="../externo/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form_cadastrar')[0].reset();
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

        function pesquisar_produto() {
            $.ajax({
                method: 'POST',
                url: '../pesquisar/pesquisa_produto.php',
                data: $('#form_cadastrar').serialize(),
                success: function(data) {
                    // Dividindo a data em um array de strings
                    dados_produto = data.split("|");
                    // Preenchendo automaticamente de acordo com o código Athos fornecido
                    // Se o código não existir no banco, os campos não serão preenchidos
                    document.getElementById('campo_nome').value = dados_produto[1].trim();
                    document.getElementById('campo_id').value = dados_produto[2].trim();

                    // chamando a função para validar os inputs
                    validar_inputs();
                },
                error: function(data) {
                    alert("Ocorreu um erro!");
                }
            });
        }

        function validar_inputs() {
            var nome_input = $("#campo_nome").val().trim();
            var athos_input = $("#campo_cod_athos").val().trim();
            var referencia_input = $("#campo_id").val().trim();

            if (nome_input && athos_input && referencia_input) {
                document.getElementById('btn_enviar').className = 'btn btn-success';
                document.getElementById('btn_enviar').disabled = false;
                document.getElementById('btn_enviar').style.cursor = 'pointer';
            } else {
                document.getElementById('btn_enviar').className = 'btn btn-danger';
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
                <li class="nav-item px-1 active">
                    <a class="nav-link underline" href="javascript:void(0)"><i class="fas fa-edit text-success" style="font-size: 24px; vertical-align: middle"></i> </a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link" href="../excluir/"><i class="far fa-trash-alt text-danger" style="font-size: 24px; vertical-align: middle"></i> </a>
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)" class="none_li"><i class="far fa-edit"></i> Cadastrar Produto</a></li>
        </ol>
    </nav>
    <div class="jumbotron" style="background-image: url('../imagens/wallpaper.jpg'); background-size: cover; background-position: center; padding: 100px; border-radius: 0">
        <center>
            <h1 style="color: white">Cadastrar Produto</h1>
        </center>
    </div>
    <main class="container">
        <form id="form_cadastrar" method="POST" action="cadastrar_produto.php" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label for="campo_cod_athos">
                            <b>Código Athos do produto:</b>
                        </label>
                        <input type="text" id="campo_cod_athos" name="codigo_athos" class="form-control" placeholder="Código do produto" onkeyup="pesquisar_produto()" required autofocus>
                        <div class="invalid-feedback">
                            Forneça o código Athos do produto!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="campo_nome">
                            <b>Nome do produto:</b>
                        </label>
                        <input type="text" id="campo_nome" name="nome" class="form-control" placeholder="Nome do produto" required onkeyup="validar_inputs()">
                        <div class="invalid-feedback">
                            Forneça o nome do produto!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="campo_id">
                            <b>Referência do produto:</b>
                        </label>
                        <input type="text" id="campo_id" name="id" class="form-control" placeholder="Referência do produto" required onkeyup="validar_inputs()">
                        <div class="invalid-feedback">
                            Forneça a referência do produto!
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center form-group" style="margin: 1.9em 0 0 0">
                        <!-- <input type="file" id="campo_img" name="imagem" class="btn btn-success" placeholder="Imagem do produto" accept="image/*" style="padding-bottom: 36px"> -->
                        <label for="campo_img" style="margin: 0">
                            <figure>
                                <img id="preview" src="../imagens/upload.png" class="img-thumbnail" title="Selecionar uma imagem" width="200px" height="" style="cursor: pointer; display: none">
                                <fieldset id="sem_imagem" class="img-thumbnail" style="padding: 40px; cursor: pointer">
                                    <div>
                                        <i class="fas fa-upload" style="font-size: 40px; color: #92b0b3; margin-bottom: 10px"></i>
                                    </div>
                                    <div>
                                        <span class="lead" style="font-size: 18px">Escolher uma imagem</span>
                                    </div>
                                </fieldset>
                                <input id="campo_img" name="imagem" type="file" accept="image/*" style="display: none;" onchange="document.getElementById('sem_imagem').style.display = 'none'; document.getElementById('preview').style.display = 'inline'; document.getElementById('preview').src = window.URL.createObjectURL(this.files[0]); document.getElementById('btn_img').style.display = 'none';">
                                <figcaption class="text-center">
                                    <span id="nome_imagem"></span>
                                    <p id="btn_img" class="btn btn-sm btn-warning" style="margin-top: 5px"><i class="fas fa-camera"></i> Adicionar uma foto</p>
                                </figcaption>
                            </figure>
                        </label>
                    </div>
                </div>
            </div>
            <button id="btn_enviar" type="submit" class="btn btn-success" style="float: right">Cadastrar</button>
        </form>
    </main>
    <!-- Footer -->
    <footer class="footer" style="margin-bottom: -250px">
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

        // Mostra o nome do arquivo
        $("#campo_img").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            if (fileName.trim() != "") {
                document.getElementById("nome_imagem").innerHTML = fileName;
                document.getElementById("preview").title = fileName;
            }
        });
    </script>
</body>

</html>