	<div class="wrapper">
		<!-- Sidebar  -->
		<?php include('validacoes/menu.php'); 

		?>
		<link rel="stylesheet" href="bootstrap-select/dist/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="datepicker/tempus-dominus/tempusdominus-bootstrap-4.min.css" />

		<script type="text/javascript" src="js/modalEstoque.js"></script>




		<div class="d-flex justify-content-between">
			<span class="mt-n4 mb-3 lead"><i class="fas fa-shopping-cart mr-2"></i><?php echo "ESTOQUE"; ?></span>
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
					<button type="button" class="btn text-light" data-toggle="modal" data-target="#modalAddLote" style="background-color: <?php if (!isset($_SESSION['corLogoFundo'])) { echo "#808080";}else{ echo $_SESSION['corLogoFundo']; }?>;">
						<i class="fas fa-plus-circle mr-2"></i>
						ADICIONAR
					</button>
				</div>
			</div>
		</div>

		<?php 
				   			if(isset($_SESSION['msgCad'])){
							echo $_SESSION['msgCad'];
							unset($_SESSION['msgCad']);
		}?>

		<section class="mb-5">
			<table class="shadow responsive text-center hover compact stripe nowrap" id="minhaTabela">
				<thead>
					<tr>
						<!-- 						<th scope="col"><input type="checkbox" id="selecctall"></th>
						 -->
						<th scope="col">Nº DE LOTE</th>
						<th scope="col">PRODUTO</th>
						<th scope="col">MARCA</th>
						<th scope="col">TIPO</th>
						<th scope="col">QUANTIDADE</th>
						<th scope="col">VALIDADE</th>
						<th scope="col">ENTRADA</th>
					</tr>
				</thead>
				<tbody>
					<?php	
						
							include('banco/conexao.php');


							$result = "select distinct TL.idLote, TCP.idCompraProduto,dataEntrada,nomeProduto,marcaProduto,nomeTipoProduto,quantidadeLote,validade, situacaoValidade from Tb_Lote TL
inner join tb_compraproduto TCP
on TCP.idCompraProduto = TL.idCompraProduto
inner join Tb_ListaProduto TLP
	on TLP.idPedido = TCP.idCompraProduto
inner join Tb_Fornecedor TF
	on TCP.idFornecedor = TF.idFornecedor
inner join Tb_Produto TP
	on TP.idProduto = TL.idProduto
inner join Tb_TipoProduto TTP
on TTP.idTipoProduto = TP.idTipoProduto
group by TL.idLote
";
						
							//PEGAR OS DADOS DO BANCO ATRAVÉS DA QUERY E ATRIBUIR À VARIÁVEL
							$result = mysqli_query($conn, $result);
				
		
		//----------------------------------------------------------------------------------------
				
						
						if(mysqli_num_rows($result) > 0)
						{

						while($row_produto = mysqli_fetch_assoc($result)){
							
							$dataValidade = date('d/m/Y', strtotime($row_produto['validade']));
							$dataEntrada = $row_produto['dataEntrada'];
							$situacaoValidade = $row_produto['situacaoValidade'];
							$dataAtual = date('d/m/Y');
							$dataVencendo = date('d/m/Y', strtotime('+10 month'));
							
							//echo $dataVencendo;
					?>
					<tr>
					
						<!-- 						<th scope="row"><input class="checkbox1" name="check[]" value="item1" type="checkbox"></th>
						 -->
						<td><?php echo $row_produto['idLote']; ?></td>
						<td><?php echo $row_produto['nomeProduto']; ?></td>
						<td><?php echo $row_produto['marcaProduto']; ?></td>
						<td><?php echo $row_produto['nomeTipoProduto']; ?></td>
						<td><?php echo $row_produto['quantidadeLote']; ?></td>
						<td><?php 
							
							if ($situacaoValidade == 0){ 
								echo "SEM VALIDADE";
							
							}else{
								
								if($dataValidade > $dataAtual){
									
									echo $dataValidade;	
									
								}
							}
							
							/*elseif($dataValidade > $dataAtual){
								
								echo $dataValidade;	
								
							}elseif($dataValidade < $dataVencendo && $dataValidade > $dataAtual){
								
								echo 'oi';
								
							}else{
								echo "<div class='text-danger'>$dataValidade<a class='btn btn-sm mt-n1' data-container='body' data-toggle='popover' data-placement='top' tabindex='0' data-trigger='focus' data-content='Este produto venceu, por favor verifique seu estoque!'><span class='fas fa-info text-danger' aria-hidden='true'></span></a></div>";
							}*/
							?></td>
						<td><?php echo date('d/m/Y H:i',strtotime($dataEntrada)); ?></td>



					</tr>
					<?php 	
							}
						
						}
						?>
				</tbody>
			</table>
		</section>
		<?php include_once('modal/modalEstoque.php');?>

	</div>

	<script>
		//POPOVER PRODUTO VENCIDO
		$(function() {
			$('[data-toggle="popover"]').popover()
		});

		$(function() {
			enable_cb();
			$("#group1").click(enable_cb);
		});

		function enable_cb() {
			if (this.checked) {
				$("input.group1").removeAttr("disabled");
			} else {
				$("input.group1").attr("disabled", true);
			}
		}

	</script>
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
	<script type="text/javascript">
		$(document).ready(function() {
			$('#sidebarCollapse').on('click', function() {
				$('#sidebar').toggleClass('active');
			});
		});

	</script>


	<script type="text/javascript" src="datepicker/moment/min/moment.min.js"></script>
	<script type="text/javascript" src="datepicker/moment/locale/pt-br.js"></script>
	<script type="text/javascript" src="datepicker/tempus-dominus/tempusdominus-bootstrap-4.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.js"></script>
	<script src="bootstrap-select/dist/js/bootstrap-select.min.js"></script>
