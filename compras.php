<?php session_start();
$_SESSION['urlAtual'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";//PEGAR PÁGINA ATUAL E ARMAZENAR
?>
<script type="text/javascript" src="js/jquery16.js"></script>
<script src="js/dist/jquery.inputmask.js"></script>
<script type="text/javascript" src="js/jquery-form.js"></script>
<script src="js/dist/jquery.inputmask.js"></script>
<script type="text/javascript" src="js/modalCompra.js"></script>


<link rel="stylesheet" href="datepicker/tempus-dominus/tempusdominus-bootstrap-4.min.css" />

<script type="text/javascript">
	//MÁSCARA DE MOEDA NO INPUT
	function funcaoMoeda(i) {
		var v = i.value.replace(/\D/g, '');
		v = (v / 100).toFixed(2) + '';
		v = v.replace(".", ",");
		v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
		v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
		i.value = v;
	}
	//FUNCAO ACEITAR SOMENTE NUMEROS E PONTO
	function somenteNumeros(num) {
		var er = /[^0-9.]/;
		er.lastIndex = 0;
		var campo = num;
		if (er.test(campo.value)) {
			alert("somente ponto e numeros!");
			campo.value = "";
		}
	}

	//FUNCAO DUPLICAR DIV
	$(document).ready(function() {
		$(".resultado").hide();
	});
	//DUPLICAR DIV
	function duplicarCampos() {
		var clone = document.getElementById('origem').cloneNode(true);
		var destino = document.getElementById('destino');
						//$('.selectpicker').selectpicker('refresh');

		destino.prepend(clone);
		

		var camposClonados = clone.getElementsByTagName('input');

		for (i = 0; i < camposClonados.length; i++) {
			camposClonados[i].value = '';
				$('.selectpicker').selectpicker('delete');
				$('.selectpicker').selectpicker('refresh');

		}
	}

	function removerCampos(id) {
		var node1 = document.getElementById('destino');
		node1.removeChild(node1.childNodes[0]);
	}

</script>

<style>
	/*-------------- TODOS INPUTS MAIUSCULAS ------------------*/
	input,
	textarea {
		text-transform: uppercase;
	}

</style>


<link rel="stylesheet" href="bootstrap-select/dist/css/bootstrap-select.min.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">

<!-- Fontawesome -->
<link rel="stylesheet" href="fontawesome/css/all.css">


<div class="wrapper">
	<!-- Sidebar  -->
	<?php include('validacoes/menu.php'); ?>

	<div class="d-flex justify-content-between">
		<span class="mt-n4 mb-3 lead"><i class="fas fa-shopping-cart mr-2"></i><?php echo "COMPRAS"; ?></span>
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
	<?php include("modal/modalCompra.php"); ?>
	<div class="mb-3">
		<div class="row">
			<div class="col-4">
				<a class="btn text-light" style="background-color: <?php if (!isset($_SESSION['corLogoFundo'])) { echo "#808080";}else{ echo $_SESSION['corLogoFundo']; }?>;" data-toggle="modal" data-target="#addCompra">
					<i class="fas fa-plus-circle mr-2"></i>
					ADICIONAR
				</a>
			</div>
		</div>
	</div>


	<section class="mb-5">
		<table class="shadow text-center hover compact stripe nowrap" id="minhaTabela">
			<thead>
				<tr>
					<th scope="col">Nº PEDIDO</th>
					<th scope="col">DATA DA COMPRA</th>
					<th scope="col">FORNECEDOR</th>
					<!-- 							<th scope="col">Tipo</th>
							 -->
					<!-- 							<th scope="col">VALOR UNITÁRIO</th>
							 -->
					<th scope="col">QUANTIDADE</th>
					<th scope="col">VALOR TOTAL</th>
					<!-- 							<th scope="col">VALOR TOTAL</th>
							 -->
					<th scope="col">ESTADO</th>
					<th scope="col">AÇÕES</th>
				</tr>
			</thead>
			<tbody>
				<?php	
						
						
      include('banco/conexao.php');


							$result = "select * from tb_compraproduto TCP
										inner join Tb_ListaProduto TLP
											on TLP.idPedido = TCP.idCompraProduto
										inner join Tb_Fornecedor TF
											on TCP.idFornecedor = TF.idFornecedor
										group by idPedido";

							$qr = mysqli_query($conn, $result);
		
		//----------------------------------------------------------------------------------------
						if(mysqli_num_rows($qr) > 0)
						{

						while($row_produto = mysqli_fetch_array($qr)){				
							$id_produto = $row_produto['idCompraProduto'];
					?>
				<tr>

					<td><?php echo $row_produto['numeroPedido']; ?></td>
					<td><?php echo date('d/m/Y', strtotime($row_produto['dataCompra'])); ?></td>
					<td><?php echo $row_produto['nomeFornecedor']; ?></td>
					<td><?php echo $row_produto['quantidadeProdutoTotal']; ?></td>
					<td><?php echo "R$ " . number_format($row_produto['valorTotalCompra'],2, ',', '.'); ?>
					<td><?php 
									$estadoCompra = $row_produto['estadoCompra'];
									if($estadoCompra === "AGUARDANDO"){
										echo "<div class='text-warning bold'>" . $estadoCompra . "</div>";
									}
									elseif ($estadoCompra ==="RECEBIDO"){
										echo "<div class='text-success bold'>" . $estadoCompra . "</div>";
									}else{
										echo "<div class='text-danger bold'>" . $estadoCompra . "</div>";
									}
								?></td>
					<td class="row m-auto">

						<form action="exibirListaCompras.php" method="POST" id="formInfItens" class="m-auto">
							<button class="btn btn-sm  btn_icone" type="submit" title="Informações sobre o produto" name="idCompraProduto" value="<?php echo $row_produto['idCompraProduto']; ?>">
								<span class="fas fa-info text-warning" aria-hidden='true'></span>
							</button>
						</form>
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

		<?php 
					
					//---------------------------------------------------------------------------------

					?>

	</div>

</div>
<!--   	CALENDÁRIO DOS INPUTS DATEPICKER	 -->
<script type="text/javascript">
	$(function() {
		$('#datetimepicker4').datetimepicker({
			format: 'L'
		});
	});

	$(function() {
		$('#datetimepicker5').datetimepicker({
			format: 'L',

		});
	});
	//DEFINIR RANGE DATA COMPRA MENOR QUE DIA ATUAL E DATA ENTREGA MAIOR QUE DATA COMPRA
	$("#datetimepicker4").on("change.datetimepicker", function (e) {
            $('#datetimepicker5').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker5").on("change.datetimepicker", function (e) {
            $('#datetimepicker4').datetimepicker('maxDate', e.date);
        });

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


<script type="text/javascript" src="datepicker/moment/min/moment.min.js"></script>
<script type="text/javascript" src="datepicker/moment/locale/pt-br.js"></script>
<script type="text/javascript" src="datepicker/tempus-dominus/tempusdominus-bootstrap-4.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="bootstrap-select/dist/js/bootstrap-select.min.js"></script>
