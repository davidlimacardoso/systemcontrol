<?php session_start();
$_SESSION['urlAtual'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";//PEGAR PÁGINA ATUAL E ARMAZENAR
$idCompraProduto = $_POST['idCompraProduto'];
 include('banco/conexao.php');

 $sql = "select numeroPedido, nomeFornecedor, numeroNotaFiscal, dataCompra, dataEntrega, nomeUsuario,estadoCompra from Tb_ListaProduto TLP
 	inner join tb_compraproduto TCP
		on TLP.idPedido = TCP.idCompraProduto
	inner join Tb_Produto TP
		on TP.idProduto = TLP.produto
	inner join Tb_Fornecedor TF
		on TF.idFornecedor = TCP.idFornecedor
	inner join Tb_Usuario TU
		on TCP.idUsuarioCadastro = TU.idUsuario
	where idcompraproduto = '$idCompraProduto'";


				$qr = mysqli_query($conn, $sql);

				//----------------------------------------------------------------------------------------
				if(mysqli_num_rows($qr) > 0)
				{

				while($row_produto = mysqli_fetch_array($qr)){
				$pedido = $row_produto['numeroPedido'];
				$fornecedor = $row_produto['nomeFornecedor'];
				$fornecedor = $row_produto['nomeFornecedor'];
				$notafiscal = $row_produto['numeroNotaFiscal'];
				$dataCompra = $row_produto['dataCompra'];
				$dataEntrega = $row_produto['dataEntrega'];
				$usuarioCompra = $row_produto['nomeUsuario'];
				$estado = $row_produto['estadoCompra'];
				
				
				}
			}
?>
<script type="text/javascript" src="js/modalCompra.js"></script>
<script type="text/javascript" src="js/jquery16.js"></script>
<script src="js/dist/jquery.inputmask.js"></script>
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
		<span class="mt-n4 mb-3 lead"><i class="fas fa-shopping-cart mr-2"></i><?php echo "DETALHES DO PEDIDO Nº ".$pedido; ?></span>
		<span class="mt-n4 mb-2 lead">
			<?php date_default_timezone_set("America/Sao_Paulo");
	        $data = date('Y-m-d H:i'); 
	        if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
		</span>
	</div>

	<div class="mb-3">
		<div class="row">
			<div class="col-4">
				<a href="compras.php" class="btn text-light" style="background-color: <?php if (!isset($_SESSION['corLogoFundo'])) { echo "#808080";}else{ echo $_SESSION['corLogoFundo']; }?>;">
					<i class="fas fa-arrow-left"></i>
					VOLTAR
				</a>
			</div>
		</div>
	</div>


	<div class="modal-content mb-5">
		<div class="modal-body container">

			<div>
				<div>
					<div class="row">

						<div class="form-group text-left col-5">
							<label>Fornecedor</label>
							<input required class="form-control" value="<?php echo $fornecedor; ?>" disabled>
						</div>
						<div class="form-group text-left col-3">
							<label>Número do pedido</label>
							<input type="text" class="form-control" value="<?php echo $pedido; ?>" disabled>
						</div>
						<div class="form-group text-left col-4">
							<label>Nota fiscal</label>
							<input type="text" class="form-control" value="<?php echo $notafiscal; ?>" disabled>
						</div>
					</div>
					<div class="row">
						
						<div class="col-3">
							<label>Data da compra</label>
							<div class="input-group date" id="" data-target-input="nearest">
								<input type="text" class="form-control text-center" value="<?php echo date('d/m/Y', strtotime($dataCompra)); ?>" disabled>
								<div class="input-group-append">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>

						<div class="col-3">
							<label>Data de entrega</label>
							<div class="input-group">
								<input type="text" class="form-control text-center" value="<?php echo date('d/m/Y', strtotime($dataEntrega)); ?>" disabled>
								<div class="input-group-append">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>
						<div class="form-group text-left col-4">
							<label>Usuário que realizou a compra</label>
							<input type="text" class="form-control" value="<?php echo $usuarioCompra; ?>" disabled>
						</div>
						<div class="form-group text-left col-2">
							<label>Situação</label>
							<input type="text" class="form-control" value="<?php echo $estado; ?>" disabled>
						</div>
					</div>
				</div>
				<section class="my-5">
					<table class="border text-center hover compact resposive stripe nowrap" id="minhaTabela">
						<thead>
							<tr>
								<!-- 							<th scope="col"><input type="checkbox" id="selecctall"></th>
							 -->
								<th scope="col">PRODUTO</th>
								<th scope="col">MARCA</th>
								<th scope="col">DATA DA COMPRA</th>
								<th scope="col">FORNECEDOR</th>
								<!-- 							<th scope="col">Tipo</th>
							 -->
								<!-- 							<th scope="col">VALOR UNITÁRIO</th>
							 -->
								<th scope="col">QUANTIDADE</th>
								<th scope="col">VALOR UNITÁRIO</th>
								<!-- 							<th scope="col">VALOR TOTAL</th>
							 -->
								<th scope="col">VALOR TOTAL</th>
							</tr>
						</thead>
						<tbody>
							<?php	
						
						     

							$sql = "select * from Tb_ListaProduto TLP
										inner join tb_compraproduto TCP
											on TLP.idPedido = TCP.idCompraProduto
										inner join Tb_Produto TP
											on TP.idProduto = TLP.produto
										inner join Tb_Fornecedor TF
											on TF.idFornecedor = TCP.idFornecedor 
									where idcompraproduto = '$idCompraProduto'";


				$qr = mysqli_query($conn, $sql);

				//----------------------------------------------------------------------------------------
				if(mysqli_num_rows($qr) > 0)
				{

				while($row_produto = mysqli_fetch_array($qr)){
				$id_produto = $row_produto['idCompraProduto'];
				?>
							<tr>
								<!-- 							<th scope="row"><input class="checkbox1" name="check[]" value="item1" type="checkbox"></th>
							 -->
								<td><?php echo $row_produto['nomeProduto']; ?></td>
								<td><?php echo $row_produto['marcaProduto']; ?></td>
								<td><?php echo date('d/m/Y', strtotime($row_produto['dataCompra'])); ?></td>
								<td><?php echo $row_produto['nomeFornecedor']; ?></td>
								<!-- <td>?php echo $row_produto['tipoProduto']; ?</td> -->
								<!--<td><?php /*
								$valorVenda = number_format($row_produto['valorUnitario'],2,',','.');
								echo $valorVenda; */?>
							</td>
								-->
								<td><?php echo $row_produto['quantidadeProduto']; ?>
								<td><?php echo "R$ " . number_format($row_produto['valorUnitario'],2, ',', '.'); ?>
								<td><?php echo "R$ " . number_format($row_produto['quantidadeProduto'] * $row_produto['valorUnitario'],2, ',', '.'); ?>
									<!-- <td>R$ <?php /*
								$valorTotal = ($row_produto['quantidade'] * $row_produto['valorUnitario']);
								echo number_format($valorTotal,2,',','.'); */?>
							</td> -->

							</tr>
							<?php 	
							}
						
						}
						?>

						</tbody>
					</table>
				</section>

			</div>

		</div>

	</div>

	<div class="float-right align-bottom mt-n5">

		<?php 
					
					//---------------------------------------------------------------------------------

					?>

	</div>

</div>
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
					"next": "Proxima"
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



	$(document).ready(function() {
		$('#sidebarCollapse').on('click', function() {
			$('#sidebar').toggleClass('active');
		});
	});

</script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
