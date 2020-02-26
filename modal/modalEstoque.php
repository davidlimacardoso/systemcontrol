<div class="modal fade" id="modalDetLote" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detalhes do Produto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<p id="demo"></p>
			<div class="modal-body container">
				<section class="mb-5">
					<table class="shadow responsive text-center hover compact stripe nowrap" id="minhaTabela">
						<thead>
							<tr>
								<!-- 						<th scope="col"><input type="checkbox" id="selecctall"></th>
						 -->
								<th scope="col">Código</th>
								<th scope="col">Nota Fiscal</th>
								<th scope="col">Fornecedor</th>
								<th scope="col">Quantidade</th>
								<th scope="col">Data da Compra</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$resultModalEstoque = "select * from tb_compraproduto TCP
										inner join Tb_ListaProduto TLP
											on TLP.idPedido = TCP.idCompraProduto
										inner join Tb_Quantidade TQ
											on TQ.idQuantidade = TLP.quantidadeProduto
										inner join Tb_Produto TP
											on TLP.produto = TP.idProduto
											where idCompraProduto = 1";
						
							//PEGAR OS DADOS DO BANCO ATRAVÉS DA QUERY E ATRIBUIR À VARIÁVEL
							$resultModalEstoque = mysqli_query($conn, $resultModalEstoque);
				
		
		//----------------------------------------------------------------------------------------
					if(mysqli_num_rows($result) > 0)
						{

						while($row_listaProduto = mysqli_fetch_assoc($resultModalEstoque)){
							$idCompra = $row_listaProduto['idCompraProduto'];
					?>
							<tr>
								<!-- 						<th scope="row"><input class="checkbox1" name="check[]" value="item1" type="checkbox"></th>
						 -->
								<td><?php echo $row_listaProduto['nomeProduto']; ?></td>

								<td class="row">

									<a href="#" class="btn btn-sm mt-n1">
										<span class="fas fa-trash text-danger"></span>
									</a>

									<button class="btn btn-sm mt-n1 btn_icone">
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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetLote" data-dismiss="modal" title="Informações sobre o produto" name="btn_alt">Alterar dados</button>
			</div>
		</div>
	</div>
</div>


<!-- MODAL ADICIONAR PRODUTO -->
<?php
	include('banco/conexao.php');
	$script = "SELECT * FROM Tb_TipoProduto";
	$selectTipoProduto = mysqli_query($conn, $script) or die("Não foi possível realizar a consulta do tipo de Produto");
	
	$script = "SELECT * FROM Tb_Fornecedor";
	$selectFornecedor = mysqli_query($conn, $script) or die("Não foi possível realizar a consulta do fornecedor");
	
	$script = "SELECT * FROM Tb_Unidade";
	$selectTipoUnidadeProduto = mysqli_query($conn, $script) or die("Não foi possível realizar a consulta da unidade de medida");
	
	$script = "SELECT * FROM Tb_Produto";
	$selectProduto = mysqli_query($conn, $script) or die("Não foi possível realizar a consulta do produto");
	
	$script = "SELECT * FROM Tb_CompraProduto TCP
        inner join Tb_ListaProduto TLP
			on TLP.idListaProduto = TCP.idCompraProduto
		inner join Tb_Fornecedor TF
			on TCP.idFornecedor = TF.idFornecedor
		left join Tb_Produto TP 
			on TLP.produto = TP.idProduto WHERE estadoCompra = 'AGUARDANDO';";
	$selectCompra = mysqli_query($conn, $script) or die("Não foi possível realizar a consulta ao banco de dados");
?>

<div class="modal fade" id="modalAddLote" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">ENTRADA DE LOTE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body container">
				<form action="validacoes/adicionarestoque.php" method="POST" id="formAddLote">
					<div class="row">
						<div class="col-1">
							<label class="col-form-label">PEDIDO</label>
						</div>
						<div class="form-group text-left col-10">
							<select class="selectpicker form-control selectVidente" title="Selecione um produto..." data-container="body" data-live-search="true" id="selCompraEstoque" name="selCompra">
								<option value="" class="text-center" selected>SELECIONAR</option>
								<?php while($linha = mysqli_fetch_assoc($selectCompra)) {?>
								<option value="<?php echo $linha['idCompraProduto']?>"><?php echo "Nota Fiscal (" . $linha['numeroNotaFiscal'] .") - " . $linha['nomeFornecedor'];?></option>
								<?php }?>
							</select>
						</div>
					</div>

					<div id="result"></div>
					<!-- 					<script src="jquery.js"></script>
					 -->
					<script>
						//var data = document.getElementById('selCompraEstoque');

						$('#selCompraEstoque').change(function(e) {
							var idCompraProduto = $(this).val();

							$.ajax({
								type: "GET",
								data: "selCompra=" + idCompraProduto,
								url: "validacoes/retornarDadosCompra.php",
								async: false
							}).done(function(data) {

								var lista = "<table class='table table-hover text-center border' id='minhaTabela'><tbody><thead><th class='border'  scope='col'>PRODUTO</th><th class='border ' scope='col'>QUANTIDADE</th><th class='border'  scope='col'>VALIDADE</th></thead>";
								$.each($.parseJSON(data), function(chave, valor) {
									
									var validade = valor.situacaoValidade == 1 ? "<div class='input-group m-auto' style='width: 70%;' data-target-input='nearest'><input type='date' class='form-control' name='validade[]'><div class='input-group-append'><div class='input-group-text'><i class='fa fa-calendar'></i></div></div></div>" : "<h6>SEM VALIDADE</h6><input type='hidden' name='validade[]' value='0000-00-00'>"; + "</td></tr>";
									
									lista += "<tr><td style='padding-top:2%'><input type='hidden' name='idProdutoLista[]' value='" + valor.idListaProduto + "'>" + valor.nomeProduto + "</td><td class='border' style='padding-top:2%'><input type='hidden' name='quantidadeProdutoLista[]' value='" + valor.quantidadeProduto + "'>" + valor.quantidadeProduto + "</td><td>" + validade +  "</td></tr>";
								})
								lista += "</tbody></table>";
								$('#result').html(lista);
							})
						});

					</script>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="fechar" name="fechar">Fechar</button>
						<button class="btn btn-info" id="">Cadastrar</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
