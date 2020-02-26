
<form id="formCadCompra">
	<!-- 	MODAL ADICIONAR COMPRA	 -->
	<div class="modal fade" id="addCompra" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" style="height:90%;" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">ADICIONAR COMPRA</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body container">

				<div id="mensagemCompraProduto"></div>
					<?php
	include('banco/conexao.php');
		
	$scriptProd = "SELECT idProduto,nomeProduto,marcaProduto FROM Tb_Produto ORDER BY nomeProduto ASC";
	$scriptForn = "SELECT idFornecedor,nomeFornecedor FROM Tb_Fornecedor ORDER BY nomeFornecedor ASC";
	//$scriptUnid = "SELECT * FROM Tb_Unidade";
	
	$selectProduto = mysqli_query($conn, $scriptProd);
	$selectFornecedor = mysqli_query($conn, $scriptForn);
	//$selectUnid = mysqli_query($conn, $scriptUnid)	;
	
?>
					<div>
						<div>
							<div class="row">

								<div class="form-group text-left col-8">
									<label>Fornecedor</label>
									<select required class="selectpicker form-control selectVidente" title="Selecione um produto..." data-container="body" data-live-search="true" id="selFornecedor" name="selForn">
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
							</div>
							<div class="row">
								<div class="form-group text-left col-4">
									<label>Nota fiscal</label>
									<input type="text" onkeyup="somenteNumeros(this);" class="form-control" id="notafiscal" name="notaFisc" required>
								</div>
								<div class="col-4">
									<label>Data da compra</label>
									<div class="input-group date" id="datetimepicker4" data-target-input="nearest">
										<input type="text" class="form-control datetimepicker-input text-center" data-toggle="datetimepicker" data-target="#datetimepicker4" name="dataCompra" required>
										<div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
									</div>
								</div>
															
						<div class="col-4">
							<label>Data de entrega</label>
							<div class="input-group" id="datetimepicker5" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input text-center" data-toggle="datetimepicker" data-target="#datetimepicker5" name="dataEntrega" required>
								<div class="input-group-append" data-target="#datetimepicker5" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div id="destino"></div>

					<div class="modal-content mt-1" id="origem">
						<div class="modal-header">
							<div class="container">

								<div class="row">
									<div class="form-group text-left col-4">
										<label>Produto</label>
										<select required class="form-control" title="Selecione um produto..." data-container="body" data-live-search="true" id="tipoProduto" name="selProduto[]">
											<option value="" class="text-center" selected>SELECIONAR</option>
											<?php while($linha = mysqli_fetch_assoc($selectProduto)) { ?>
											<option value="<?php echo $linha['idProduto']?>"><?php echo $linha['nomeProduto'] . " - " . $linha['marcaProduto'];?></option>
											<?php }?>
										</select>
									</div>

									<div class="col-3">
										<label>QUANTIDADE</label>
										<input type="number" min="0" max="" id="quantidade" class="form-control text-center" name="quantidade[]" required>
									</div>

									<div class="col-3">
										<label>VALOR UNITÁRIO</label>
										<div class="input-group">
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

									<div class="col-2 my-auto">
										<a href="#" class="btn btn-sm mt-1" onclick="removerCampos(this)">
											<span class="fas fa-trash text-danger"></span>
										</a>
										<a href="#" class="btn btn-sm mt-1" onclick="duplicarCampos();">
											<span class="fas fa-plus text-success"></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>


		</div>
		<div class="modal-footer">
			<div class="m-auto">
				<button type="reset" class="btn btn-secondary text-white">LIMPAR</button>
				<button type="submit" class="btn btn-success" id="registrarCompra">REGISTRAR</button>
			</div>
			<button type="button" class="btn btn-secondary" data-dismiss="modal" id="fechar" name="fechar">Fechar</button>
		</div>
	</div>
	</div>
	</div>
</form>

<script>
//********************* 	MENSAGEM AJAX DO INSERT DO TIPO DE PRODUTO	 ****************************
	$('#formCadCompra').submit(function(e){
		e.preventDefault();
		var formulario = $(this);
		var retorno = addFormCompraProduto(formulario)
	});
	
	function addFormCompraProduto(dados){
		$.ajax({
			type:"POST",
			data:dados.serialize(),
			url:"validacoes/processapedido.php",
			sync:false
		}).done(function retornaMensagemCompraProduto(data){
			
				$sucesso = $.parseJSON(data)["sucesso"];
				$mensagem = $.parseJSON(data)["mensagem"];

				if($sucesso){
					//$('#mensagemTipoProduto').html($mensagem);
					$("#mensagemCompraProduto" ).html($mensagem).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
					
					//FUNÇÃO RECARREGAR PÁGINA APÓS REGISTRO	
					/*setTimeout(function() {
						  window.location.reload(1);
						}, 2000); */					//document.getElementById('campoTipoProduto').value=''; // Limpa o campo
					$("#minhaTabela").load(location.href+" #minhaTabela>*","")//atualiza a div do select tipo produto

				}else{
					//EXIBEQUANDOACONTECEALGUMA FALHA NO MOMENTO DA ALTERAÇÃO
					$('#mensagemCompraProduto').html($mensagem).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
				}

			}).fail(function(){
			//ESSA MENSAGEM SÓ EXIBE QUANDO NAO PODE SE COMUNICAR COM A VALIDAÇÃO NO URL:
				$('#mensagemCompraProduto').html('<div class="btn-warning">Erro no sistema tente mais tarde...</div>').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );

			}).always(function(){
				
				$('#mensagemCompraProduto').show();
			});
			
	}
			
</script>
