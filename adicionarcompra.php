<?php session_start(); ?>

<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" type="text/css" href="css-custom/estilo.css">
<script type="text/javascript" src="js/jquery16.js"></script>
<script type="text/javascript" src="js/jquery-form.js"></script>
<script src="js/dist/jquery.inputmask.js"></script>
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
		destino.prepend(clone);

		var camposClonados = clone.getElementsByTagName('input');

		for (i = 0; i < camposClonados.length; i++) {
			camposClonados[i].value = '';
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

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">

<!-- Fontawesome -->
<link rel="stylesheet" href="fontawesome/css/all.css">


<div class="wrapper">
	<!-- Sidebar  -->
	<?php include('validacoes/menu.php'); ?>

	<div class="d-flex justify-content-between">
       <span class="mt-n4 mb-3 lead"><i class="fas fa-shopping-cart mr-2"></i></i><?php echo "ADICIONAR COMPRA"; ?></span>
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
            <a href="compras.php" class="btn text-light" style="background-color: <?php if (!isset($_SESSION['corLogoFundo'])) { echo "#808080";}else{ echo $_SESSION['corLogoFundo']; }?>;">
	          <i class="fas fa-arrow-left"></i>
	           VOLTAR
	        </a>
          </div>
        </div>
    </div>

	 <?php
	include('banco/conexao.php');
		
	$scriptProd = "SELECT * FROM Tb_Produto";
	$scriptForn = "SELECT * FROM Tb_Fornecedor";
	$scriptUnid = "SELECT * FROM Tb_Unidade";
	
	$selectProduto = mysqli_query($conn, $scriptProd);
	$selectFornecedor = mysqli_query($conn, $scriptForn);
	$selectUnid = mysqli_query($conn, $scriptUnid)	;
	
?>
	<div>
		<div>
			<form action="validacoes/processapedido.php" method="post" id="formCadCompra">
				<div class="modal-content">
					<div class="modal-body container">
						<div class="row">

							<div class="form-group text-left col-4">
								<label>Fornecedor</label>
								<select required class="selectpicker form-control" title="Selecione um produto..." data-container="body" data-live-search="true" id="selFornecedor" name="selForn">
									<option value="" class="text-center" selected>SELECIONAR</option>
									<?php while($linha = mysqli_fetch_assoc($selectFornecedor)) {?>
									<option value="<?php echo $linha['idFornecedor']?>"><?php echo $linha['nomeFornecedor'];?></option>
									<?php }?>
								</select>
							</div>
							<div class="form-group text-left col-4">
								<label>Número do pedido</label>
								<input type="text" onkeyup="somenteNumeros(this);" class="form-control" id="pedido" name="numPedido" required>
							</div>

							<div class="form-group text-left col-4">
								<label>Nota fiscal</label>
								<input type="text" onkeyup="somenteNumeros(this);" class="form-control" id="notafiscal" name="notaFisc" required>
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<label>Data da compra</label>
								<input type="date" class="form-control text-center" name="dataCompra" id="modal-datacompra-produto" required>
							</div>
							<div class="col-3">
								<label>Data de entrega</label>
								<input type="date" class="form-control text-center" name="dataEntrega" id="modal-dataentrega-produto" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-content mt-1 shadow" id="origem">
						<div class="modal-header">
							<div class="container">

								<div class="row">
									<div class="form-group text-left col-4">
										<label>Produto</label>
										<select required class="selectpicker form-control" title="Selecione um produto..." data-container="body" data-live-search="true" id="tipoProduto" name="selProduto[]">
											<option value="" class="text-center" selected>SELECIONAR</option>
											<?php while($linha = mysqli_fetch_assoc($selectProduto)) {?>
											<option value="<?php echo $linha['idProduto']?>"><?php echo $linha['nomeProduto'] . " - " . $linha['marcaProduto'];?></option>
											<?php }?>
										</select>
									</div>
									
									<div class="col-2">
										<label>QUANTIDADE</label>
										<input type="number"  min="0" max="" id="quantidade" class="form-control text-center" name="quantidade[]" required>
									</div>
									
									<div class="col-2">
										<label>VALOR UNITÁRIO</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="">R$</span>
											</div>
											<input type="text" id="valorUnit" class="form-control text-center" placeholder="10,00" name="valorUnitario[]" onkeyup="funcaoMoeda(this);" required>
										</div>
									</div>
																		
									<!-- <div class="col-2">
										<label>TOTAL</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="">R$</span>
											</div>
											<input id="valorTotalProd"  readonly="readonly" type="text" class="form-control text-center" placeholder="0,00">
										</div>
									</div> -->

									<div class="col-2 mt-4">
										<a href="#" class="btn btn-sm mt-n1" onclick="removerCampos(this)">
											<span class="fas fa-trash text-danger"></span>
										</a>
										<a href="#" class="btn btn-sm mt-n1" onclick="duplicarCampos();">
											<span class="fas fa-plus text-success"></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<div id="destino">
				</div>
				<div class="mt-3 text-center">
					<button type="reset" class="btn btn-secondary text-white" id="cadastraProduto">LIMPAR</button>
					<button type="submit" class="btn btn-success" id="registrarCompra">REGISTRAR</button>
				</div>

			</form>
		</div>
	</div>
</div>
<script type="text/javascript">

  setTimeout(function() {
     $('#salvo').fadeOut('fast');
  }, 2000);

</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#sidebarCollapse').on('click', function() {
			$('#sidebar').toggleClass('active');
		});
	});

</script>

<script type="text/javascript">/*
//*************SOMAR TOTAL DE VALORES DOS PRODUTOS****************
function id(el) {
  return document.getElementById( el );
}
function total( un, qnt ) {	
  return parseFloat(un.replace(',', '.'), 10) * parseFloat(qnt.replace(',', '.'), 10);
}
	
window.onload = function() {
  id('valorUnit').addEventListener('keyup', function() {
    var result = total( this.value , id('quantidade').value );
    id('valorTotalProd').value = String(result.toFixed(2)).formatMoney();
  });

  id('quantidade').addEventListener('keyup', function(){
    var result = total( id('valorUnit').value , this.value );
    id('valorTotalProd').value = String(result.toFixed(2)).formatMoney();
  });
}

String.prototype.formatMoney = function() {
  var v = this;

  if(v.indexOf('.') === -1) {
    v = v.replace(/([\d]+)/, "$1,00");
  }

  v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
  v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");
  v = v.replace(/([\d]+)([\d]{3}),([\d]{2})$/, "$1.$2,$3");

  return v;
};
	
	*/
</script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<?php include('validacoes/rodape.php'); ?>
