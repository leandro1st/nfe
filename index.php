<?php
require('externo/connect.php');
$procurar = mysqli_query($connect, "SELECT * FROM $vendas ORDER BY nome ASC");
$numero = mysqli_num_rows($procurar);
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
	<script src="jquery/jquery-3.4.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		function cadastrar(id, contador) {
			var cont = parseInt(contador);
			$.ajax({
				type: "POST",
				url: "cadastrar/adicionar1.php",
				cache: false,
				data: $("#form-" + id + '').serialize(),
				success: function(data) {
					document.getElementById("qntd-" + id + '').innerHTML = data;
					if (data > 0 && data < 2) {
						cont++;
						document.getElementById('cont').innerHTML = cont;
					}
					//ok
				},
			});
		}

		function remover(id, contador) {
			var cont = parseInt(contador);
			$.ajax({
				type: "POST",
				url: "cadastrar/remover1.php",
				cache: false,
				data: $("#form-" + id + '').serialize(),
				success: function(data) {
					if (data == 0) {
						cont--;
						document.getElementById('cont').innerHTML = cont;
						document.getElementById("qntd-" + id + '').innerHTML = data;
					} else if (data < 0) {
						document.getElementById("qntd-" + id + '').innerHTML = 0;
					} else {
						document.getElementById("qntd-" + id + '').innerHTML = data;
					}
					//ok
				},
			});
		}

		function excluirTudo() {
			$.ajax({
				method: 'POST',
				url: 'cadastrar/zerar.php',
				data: $('#form_excluirTudo').serialize(),
				success: function(data) {
					document.location.reload(true);
				},
			});
		}

		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		})
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
				<li class="nav-item px-1 active underline">
					<a class="nav-link" href="#"><i class="fas fa-home" style="font-size: 24px; vertical-align: middle"></i></a>
				</li>
				<li class="nav-item px-1">
					<a class="nav-link text-success" href="cadastrar/">Cadastrar <i class="fas fa-plus-circle text-success" style="font-size: 24px; vertical-align: middle"></i> </a>
				</li>
				<li class="nav-item px-1">
					<a class="nav-link text-danger" href="excluir/">Excluir <i class="far fa-trash-alt text-danger" style="font-size: 24px; vertical-align: middle"></i> </a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0" method="POST" action="alterar/">
				<input class="form-control mr-sm-2" name="nome_produto" placeholder="Nome do produto" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
			</form>
		</div>
	</nav>
	<div class="jumbotron" style="background-image: url('imagens/wallpaper.jpg'); background-size: cover; background-position: center; padding: 100px; border-radius: 0">
		<center>
			<h1>
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
				<font color="white"><?php print $mes . ' - ' . date('Y'); ?></font><br>
				<a href="export.php"><button class="btn btn-success">Exportar como .xlsx</button></a>
			</h1>
		</center>
	</div>
	<main class="container">
		<table class="table table-striped table-light table-hover" id="tabela_produtos">
			<thead>
				<tr align="center" class="table-warning">
					<th>#</th>
					<th>NOME</th>
					<th>QUANTIDADE</th>
					<th><i class="far fa-edit" style="color: green; font-size: 22px;" data-toggle="tooltip" data-html="true" title="<i><b>Adicionar 1</b></i>"></i></th>
					<th>
						<a data-toggle="modal" data-target="#modalExcluirTudo" style="cursor: pointer">
							<i class="far fa-trash-alt" style="color: red; font-size: 22px;" data-toggle="tooltip" data-html="true" title="<i><b>Zerar Tudo</b></i>"></i>
						</a>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$contador = 0;
				for ($i = 0; $i < $numero; $i++) {
					$vetor = mysqli_fetch_array($procurar);
					if ($vetor['quantidade'] > 0) {
						$contador++;
					}
					// echo $contador;
					?>
					<form id="form-<?php echo $vetor['codigo']; ?>" method="POST">
						<tr>
							<input type="hidden" class="form-control" name="cod" value="<?php echo $vetor['codigo']; ?>">
							<td class="align-middle" align="center"><b><?php echo $vetor['id']; ?></b></td>
							<td class="align-middle" width="70%" data-toggle="tooltip" data-html="true" title="<img width='100px' src='produtos/<?php echo $vetor['imagem'] ?>'>">
								<b><?php echo $vetor['nome']; ?></b>
							</td>
							<td class="align-middle" width="5%" align="center" style="font-size:18px">
								<b>
									<font id="qntd-<?php echo $vetor['codigo']; ?>"><?php echo $vetor['quantidade']; ?></font>
								</b>
							</td>
							<td align="center"><button class="btn btn-success" type="button" onclick="cadastrar('<?php echo $vetor['codigo'] ?>', document.getElementById('cont').innerHTML)">+1</button></td>
							<td align="center"><button class="btn btn-danger" type="button" onclick="remover('<?php echo $vetor['codigo'] ?>', document.getElementById('cont').innerHTML)">-1</button></td>
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
	<!-- Modal excluir tudo -->
	<form id="form_excluirTudo" method="POST">
		<div class="modal fade" id="modalExcluirTudo" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTudoTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modalTitle" class="text-danger">
							Deseja realmente zerar todos os registros?
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-9">
								<?php if ($contador == 1) { ?>
									<h5 class="text-warning">Você irá zerar 1 registro!</h5>
								<?php } else { ?>
									<h5 class="text-warning">Você irá zerar <span id='cont'><?php echo $contador ?></span> registro(s)!</h5>
									<!-- <h5 class="text-warning">Você irá zerar <input id='cont' value="<?php echo $contador ?>" style="all:unset; text-align:center; cursor:text; width:30px;" readonly> registros!</h5> -->
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" id="btn_modal_excluir" class="btn btn-danger" onclick="excluirTudo()">Zerar tudo</button>
					</div>
				</div>
			</div>
		</div>
	</form><!-- Modal excluir tudo -->
</body>

</html>