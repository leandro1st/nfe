<?php
require('externo/connect.php');
$procurar = mysqli_query($connect, "SELECT * FROM $vendas ORDER BY nome ASC");
$numero = mysqli_num_rows($procurar);
$pesquisar_maior_id = mysqli_query($connect, "SELECT codigo FROM $vendas ORDER BY codigo DESC LIMIT 1");
$vetor_maior_id = mysqli_fetch_array($pesquisar_maior_id);

$pesquisar_ultima_data = mysqli_query($connect, "SELECT * FROM $observacao");
$vetor_ultima_data = mysqli_fetch_array($pesquisar_ultima_data);
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
		function cadastrar(id, contador, ultima_quantidade) {
			var cont = parseInt(contador);
			$.ajax({
				type: "POST",
				url: "cadastrar/adicionar1.php",
				cache: false,
				data: $("#form-" + id + '').serialize(),
				success: function(data) {
					document.getElementById("qntd-" + id + '').innerHTML = data;
					if (data - ultima_quantidade > 0) {
						document.getElementById("adicionado-" + id + '').className = "text-success";
					} else if (data - ultima_quantidade == 0) {
						document.getElementById("adicionado-" + id + '').className = "";
					} else {
						document.getElementById("adicionado-" + id + '').className = "text-danger";
					}
					document.getElementById("adicionado-" + id + '').innerHTML = data - ultima_quantidade;
					// alert(data - ultima_quantidade);
					if (data > 0 && data < 2) {
						cont++;
						document.getElementById('cont').innerHTML = cont;
						document.getElementById('input_contador').value = cont;
					}
					//ok
				},
			});
		}

		function remover(id, contador, ultima_quantidade) {
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
						document.getElementById('input_contador').value = cont;
						document.getElementById("qntd-" + id + '').innerHTML = data;
						document.getElementById("adicionado-" + id + '').innerHTML = data - ultima_quantidade;
					} else if (data < 0) {
						document.getElementById("qntd-" + id + '').innerHTML = 0;
					} else {
						document.getElementById("qntd-" + id + '').innerHTML = data;
						document.getElementById("adicionado-" + id + '').innerHTML = data - ultima_quantidade;
					}
					if (data - ultima_quantidade > 0) {
						document.getElementById("adicionado-" + id + '').className = "text-success";
					} else if (document.getElementById("adicionado-" + id + '').innerHTML == 0) {
						document.getElementById("adicionado-" + id + '').className = "";
					} else {
						document.getElementById("adicionado-" + id + '').className = "text-danger";
					}
					//ok
				},
			});
		}

		// function excluirTudo(maior_id) {
		// 	$.ajax({
		// 		method: 'POST',
		// 		url: 'cadastrar/zerar.php',
		// 		data: $('#form_excluirTudo').serialize(),
		// 		success: function(data) {
		// 			// for (var i = 1; i <= maior_id; i++) {
		// 			// 	documnent.getElementById('qntd-' + i).innerHTML = data;
		// 			// }
		// 			location.reload();
		// 		},
		// 	});
		// }

		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		})

		$(document).ready(function() {
			var meses = ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez'];
			var month = new Date().getMonth();
			for (var i = 0; i < 12; i++) {
				if (month == i) {
					document.getElementById(meses[i]).selected = true;
				}
			}
		});

		$(document).ready(function() {
			$('#nome_produto').autocomplete({
				source: "alterar/pesquisar_autocomplete_index.php",
				minLength: 1,
				select: function(event, ui) {
					$('#nome_produto').val(ui.item.value);
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
		<a class="navbar-brand" href="#">
			<img src="imagens/logo.png" alt="logo" width="35px">
			<!-- <i class="far fa-calendar-alt" style="font-size: 35px;"></i> -->
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item px-1 active">
					<a class="nav-link underline" href="#"><i class="fas fa-home" style="font-size: 24px; vertical-align: middle"></i></a>
				</li>
				<li class="nav-item px-1">
					<a class="nav-link" href="cadastrar/"><i class="fas fa-edit text-success" style="font-size: 24px; vertical-align: middle"></i> </a>
				</li>
				<li class="nav-item px-1">
					<a class="nav-link" href="excluir/"><i class="far fa-trash-alt text-danger" style="font-size: 24px; vertical-align: middle"></i> </a>
				</li>
				<!-- apagar depois -->
				<li class="nav-item px-1">
					<a class="nav-link" href="alterar_cod_athos.php"><i class="fas fa-archive text-warning" style="font-size: 24px; vertical-align: middle"></i> </a>
				</li>
				<!-- apagar -->
			</ul>
			<form class="form-inline my-2 my-lg-0" method="POST" action="alterar/">
				<input class="form-control mr-sm-2" id="nome_produto" name="nome_produto" placeholder="Nome/Referência do produto" aria-label="Search" autocomplete="off" style="width: 300px; background-color: #eee; border-radius: 9999px; border: none; padding-left: 20px; padding-right: 42px">
				<div id="div_autocomplete">
				</div>
				<button type="submit" style="position: absolute; margin-left: 259px; border: none; cursor: pointer"><i class="fas fa-search text-success"></i></button>
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
				<div class="form-inline" style="position: absolute; left: 75%; top: 157px">
					<form action="export.php" id="exportar_excel" method="POST">
						<select class="form-control" id="mes_ano" name="mes_ano" style="width: 125px;">
							<option id="jan" value="Janeiro">Janeiro</option>
							<option id="fev" value="Fevereiro">Fevereiro</option>
							<option id="mar" value="Março">Março</option>
							<option id="abr" value="Abril">Abril</option>
							<option id="mai" value="Maio">Maio</option>
							<option id="jun" value="Junho">Junho</option>
							<option id="jul" value="Julho">Julho</option>
							<option id="ago" value="Agosto">Agosto</option>
							<option id="set" value="Setembro">Setembro</option>
							<option id="out" value="Outubro">Outubro</option>
							<option id="nov" value="Novembro">Novembro</option>
							<option id="dez" value="Dezembro">Dezembro</option>
						</select>
						<button class="btn btn-success">
							Gerar Excel <i class="far fa-file-excel"></i>
						</button>
					</form>
				</div>
			</h1>
		</center>
	</div>
	<main class="container">
		<form action="cadastrar/observacao.php" method="post">
			<div class="accordion" id="accordionObs" style="margin-bottom: 1.5em">
				<div class="card">
					<div class="card-header collapsed" id="heading_1" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" aria-controls="collapse_1" style="cursor: pointer;">
						<h5 class="accordion-toggle" style="margin: 0px">
							<span class="text-danger">Feito até o dia <?php echo date("d/m/Y", strtotime($vetor_ultima_data['ultima_data'])) ?></span>
						</h5>
					</div>
					<div id="collapse_1" class="collapse" aria-labelledby="heading_1" data-parent="#accordionObs">
						<div class="card-body" style="padding: 15px 40px 0px 40px;">
							<div class="form-group row">
								<label for="data" class="col-form-label" style="margin-right: 5px">Feito até o dia:</label>
								<input id="data" name="data" type="date" class="form-control" style="width: 180px; margin-right: 8px" required>
								<button type="submit" class="btn btn-success">Confirmar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>

		<table class="table table-striped table-light table-hover" id="tabela_produtos">
			<thead>
				<tr align="center" class="table-warning">
					<th>Código Athos</th>
					<th>Referência</th>
					<th>NOME</th>
					<th><i class="fas fa-history text-success" style="font-size: 22px" data-toggle="tooltip" data-html="true" title="<b>Última atividade</b>"></i></th>
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
							<td class="align-middle" align="center"><b><?php echo $vetor['cod_athos']; ?></b></td>
							<td class="align-middle" align="center"><b><?php echo $vetor['id']; ?></b></td>
							<td class="align-middle" width="70%">
								<!--  data-toggle="tooltip" data-html="true" title="<img width='100px' src='produtos/<?php echo $vetor['imagem'] ?>'>" -->
								<b><?php echo $vetor['nome']; ?></b>
								<?php if ($vetor['ultima_mod'] != "0000-00-00 00:00:00") { ?>
									<small class="text-muted"> (Última modificação: <?php echo date("d/m/Y H:i:s", strtotime($vetor['ultima_mod'])) ?>)</small>
								<?php } ?>
							</td>
							<td class="align-middle" width="5%" align="center" style="font-size:18px">
								<b>
									<font id="adicionado-<?php echo $vetor['codigo']; ?>">0</font>
								</b>
							</td>
							<td class="align-middle" width="5%" align="center" style="font-size:18px">
								<b>
									<font id="qntd-<?php echo $vetor['codigo']; ?>" data-toggle="tooltip" data-html="true" title="Última contagem: <?php echo $vetor['quantidade'] ?>"><?php echo $vetor['quantidade']; ?></font>
								</b>
							</td>
							<td align="center"><button class="btn btn-success" type="button" onclick="cadastrar('<?php echo $vetor['codigo'] ?>', document.getElementById('cont').innerHTML, '<?php echo $vetor['quantidade'] ?>')">+1</button></td>
							<td align="center"><button class="btn btn-danger" type="button" onclick="remover('<?php echo $vetor['codigo'] ?>', document.getElementById('cont').innerHTML, '<?php echo $vetor['quantidade'] ?>')">-1</button></td>
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
					<form id="form_excluirTudo" method="POST" action="cadastrar/zerar.php">
						<!-- <input type="hidden" name="verificador" value="<?php echo $vetor['codigo']; ?>"> -->
						<input type="hidden" id="input_contador" name="input_contador" value="<?php echo $contador ?>">
						<input type="submit" name="btn_modal_excluir" id="btn_modal_excluir" class="btn btn-danger" value="Zerar tudo"></button><!-- onclick="excluirTudo(<?php echo $vetor_maior_id['codigo'] ?>)" -->
					</form>
				</div>
			</div>
		</div>
	</div><!-- Modal excluir tudo -->

</body>

</html>