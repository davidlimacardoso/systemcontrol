<?php session_start(); ?>

<?php $_SESSION['urlAtual'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";//PEGAR PÁGINA ATUAL E ARMAZENAR ?>

<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<script type="text/javascript" src="js/jquery16.js"></script>
<script src="js/dist/jquery.inputmask.js"></script>
<script src="node_modules/jquery/dist/jquery.js"></script>
<!--SUBMETER FORMULARIO CADASTAR TIPO PRODUTO COM BOTÃO ENTER-->
<script>
	$('#formCadTipoProduto').bind('submit', false);

	$('button#cadastraTipoProduto').click(function() {
		$('#formCadTipoProduto').submit();
	});

</script>
<style>
	/*-------------- TODOS INPUTS MAIUSCULAS ------------------*/
	input,
	textarea {
		text-transform: uppercase;
	}

</style>

<div class="wrapper">
	<!-- Sidebar  -->
	<?php include('validacoes/menu.php'); ?>

	<div class="d-flex justify-content-between">
		<span class="mt-n4 mb-3 lead"><i class="fas fa-box mr-2"></i><?php echo "PRODUTOS"; ?></span>
		<span class="mt-n4 mb-2 lead">
			<?php date_default_timezone_set("America/Sao_Paulo");
	        $data = date('Y-m-d H:i'); 
	        if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
		</span>
	</div>

	<?php 
				   			if(isset($_SESSION['msgCad'])){
							echo $_SESSION['msgCad'];
							unset($_SESSION['msgCad']);
		}
				   	?>

	<div class="mb-3">
		<div class="row">
			<div class="col-4">
				<button type="button" class="btn text-light" data-toggle="modal" data-target="#modalAddProduto" style="background-color: <?php if (!isset($_SESSION['corLogoFundo'])) { echo "#808080";}else{ echo $_SESSION['corLogoFundo']; }?>;">
					<i class="fas fa-plus-circle mr-2"></i>
					ADICIONAR
				</button>
			</div>
		</div>
	</div>


	<section class="mb-5">
		<table class="shadow text-center hover compact stripe nowrap" id="minhaTabela">
			<thead>
				<tr>
					<!-- 							<th scope="col"><input type="checkbox" id="selecctall"></th>
							 -->
					<th scope="col">CÓDIGO DE BARRAS</th>
					<th scope="col">PRODUTOS</th>
					<th scope="col">MARCA</th>
					<!-- 							<th scope="col">Tipo</th>
							 -->
					<th scope="col">CATEGORIA</th>
					<th scope="col">QUANTIDADE</th>
					<th scope="col">AÇÕES</th>
				</tr>
			</thead>
			<tbody>
				<?php	
						
							include('banco/conexao.php');


							$result = "select * from Tb_Produto TP
										left join Tb_PrecoVenda TPV
											on TPV.idPrecoVenda = TP.idPrecoVenda
										left join Tb_TipoProduto TTP
											on TTP.idTipoProduto = TP.idTipoProduto
										left join Tb_Usuario TU
											on TP.idUsuarioCadastroProduto = TU.idUsuario
										 
											WHERE  TP.ativo = 1";

							$result = mysqli_query($conn, $result);
				
		
//----------------------------------------------------------------------------------------
				
						
						if(mysqli_num_rows($result) > 0)
						{

						while($row_produto = mysqli_fetch_assoc($result)){
							
							$id_produto = $row_produto['idProduto'];
					?>
				<tr>
					<td><?php echo $row_produto['codigoBarras']; ?></td>
					<td><?php echo $row_produto['nomeProduto']; ?></td>
					<td><?php echo $row_produto['marcaProduto']; ?></td>
					<td><?php echo $row_produto['nomeTipoProduto']; ?></td>
					<td><?php echo $row_produto['quantidadeTotal']; ?></td>

					<td class="row m-auto">
						<form action='validacoes/excluirProduto.php' method='post' class="mb-n1">
							<button class="btn btn-sm" type="submit" aria-label='EXCLUIR' name='btnExcluir' value='<?php echo"$id_produto"?>'><span class='fas fa-trash text-danger' aria-hidden='true'></span></button>
						</form>

						<button class="btn btn-sm  btn_icone" value='<?php echo"$row_produto[idProduto];"?>' data-toggle="modal" data-target="#modalDetProd" title="Informações sobre o produto" name="btn_info" data-whatever="<?php echo $row_produto['idProduto']; ?>" data-whatevernomeproduto="<?php echo $row_produto['nomeProduto']; ?>" data-whateverdescricaoproduto="<?php echo $row_produto['descricaoProduto']; ?>" data-whateverdataentproduto="<?php echo date('d/m/Y H:i', strtotime($row_produto['dataCadastroPreco'])); ?>" data-whatevercodproduto="<?php echo $row_produto['codigoBarras']; ?>" data-whatevervalproduto="<?php echo date('d/m/Y', strtotime($row_produto['validade'])); ?>" data-whatevercatproduto="<?php echo $row_produto['idTipoProduto']; ?>" data-whatevermarcaproduto="<?php echo $row_produto['marcaProduto']; ?>" data-whatevervalidadeproduto="<?php echo $row_produto['situacaoValidade']; ?>" data-whatevermarcaproduto="<?php echo $row_produto['marcaProduto']; ?>" data-whateverqntminproduto="<?php echo $row_produto['estoqueMinimo']; ?>" data-whateverunmedidaproduto="<?php echo $row_produto['idUnidadeAbreviada']; ?>" data-whateverdiasminproduto="<?php echo $row_produto['dataMinimo']; ?>" data-whateverunvalorproduto="<?php echo $row_produto['valorMedida']; ?>" data-whateveridprecoproduto="<?php echo $row_produto['idPrecoVenda']; ?>" data-whateveridproduto="<?php echo $row_produto['idProduto']; ?>" data-whateverusuariocadproduto="<?php echo $row_produto['nomeUsuario']; ?>" data-whateverprecoproduto="<?php $precoProduto = number_format($row_produto['precoVenda'],2, ',', '.'); echo $precoProduto; ?>">
							<span class="fas fa-info text-warning" aria-hidden='true'></span>
						</button>

						<div>
						</div>

					</td>
				</tr>
				<?php 	
							}
						
						}
						?>

			</tbody>
		</table>
	</section>


	<div class="float-right align-bottom mt-n5">

	</div>

</div>
<?php include_once('modal/modalProduto.php');?>

<script type="text/javascript" src="js/modalProduto.js"></script>

<script type="text/javascript">
	setTimeout(function() {
		$('#salvo').fadeOut('fast');
	}, 2000);

</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#minhaTabela').DataTable({
			colReorder: true,
			"searching": true,
			"language": {
				"search": "Pesquise por:",
				"paginate": {
					"previous": "Anterior",
					"next": "Próximo"
				},
				"lengthMenu": "Mostrando _MENU_ registros por página",
				"zeroRecords": "Nada encontrado",
				"info": "Mostrando página _PAGE_ de _PAGES_",
				"infoEmpty": "Nenhum registro disponível",
				"infoFiltered": "(filtrado de _MAX_ registros no total)"
			},

			dom: 'frtBp',
			buttons: ['excel', 'print']
		});
		$('#minhaTabela_filter').addClass('form-inline');
		$('#minhaTabela_filter').addClass('mb-3');
		$('#minhaTabela_filter').addClass('mt-n5');
	});

</script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script type="text/javascript">
	$('#modalAddTipoProduto.in').modal('hide')

</script>

<!--############### 	MODAL TIPO PRODUTO OCULTA ADD PRODUTO	 ##################-->
<script>
	$('#modalAddTipoProduto').on('show.bs.modal', function(e) {
		$('#modalAddProduto').modal('hide')
	});
	$('#modalAddTipoProduto').on('hide.bs.modal', function(e) {
		$('#modalAddProduto').modal('show')
	})

</script>

<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
