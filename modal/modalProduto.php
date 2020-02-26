<!-- 	MODAL DETALHES DO PRODUTO	-->
<div class="modal fade" id="modalDetProd" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="validacoes/validaAlterarProduto.php" method="POST" id="formAlterProduto">
				<div class="modal-header">
					<h5 class="mx-auto" id="exampleModalLabel">VISUALIZAR E ALTERAR PRODUTO</h5>

				</div>
				<div class="modal-body container">
					<?php
						include('banco/conexao.php');
						$script = "SELECT idTipoProduto,nomeTipoProduto FROM Tb_TipoProduto ORDER BY nomeTipoProduto ASC";
						$selectTipoProduto = mysqli_query($conn, $script);

						$script = "SELECT idUnidade, nomeUnidade FROM Tb_Unidade";
						$selectTipoUnidadeProdutoAlt = mysqli_query($conn, $script);

					?>
					<div class="row">
						<div class="form-group text-left col-7">
							<label for="recipient-name" class="col-form-label">PRODUTO</label>
							<input type="text" class="form-control" id="modal-nome-produto" name="altNomeProduto" disabled>
						</div>
						<div class="form-group text-left col-5">
							<label for="recipient-name" class="col-form-label">MARCA</label>
							<input type="text" class="form-control" id="modal-marca-produto" name="altMarcaProduto" disabled>
						</div>
					</div>
					<div class="row">
						<div class="text-left col-4 col-form-label">
							<label title="Determine qual o tipo do produto que deseja registrar" style="cursor: help">TIPO DO PRODUTO</label>
							<select class="custom-select" id="modal-cat-produto" name="altTipoProduto" required disabled>
								<option class="text-center" selected>SELECIONAR</option>
								<?php while($linha = mysqli_fetch_assoc($selectTipoProduto)) {?>
								<option value="<?php echo $linha['idTipoProduto']?>"><?php echo $linha['nomeTipoProduto'];?></option>
								<?php }?>
							</select>
						</div>
						<div class="col-3">
							<label for="recipient-name" class="col-form-label" title="Define se o produto possui validade." style="cursor: help">VALIDADE</label>
							<select class="custom-select text-center" id="modal-validade-produto" name="validade" required disabled>
								<option value="1" class="text-center" selected>SIM</option>
								<option value="0" class="text-center" selected>NÃO</option>
							</select>
						</div>
						<div class="form-group text-left col-5">
							<label for="recipient-name" class="col-form-label">CÓDIGO DE BARRAS</label>
							<input type="text" class="form-control" id="modal-cod-produto" name="altCodigoBarrasProduto" maxlength="13" disabled>
						</div>
					</div>

					<div class="row">
						<div class="form-group text-left col-6">
							<label for="recipient-name" class="col-form-label">USUÁRIO CADASTRO</label>
							<input type="text" class="form-control" id="modal-usuariocad-produto" readonly="true">
						</div>
						<div class="col-3">
							<label class="col-form-label" title="Define qual a unidade de medida do produto, ex: Gramas (500g)." style="cursor: help">UNIDADE DE MEDIDA</label>
							<select class="custom-select" id="modal-unimedida-produto" name="altUnidadeAbreviada" required disabled>
								<option value="0" class="text-center" selected>SELECIONAR</option>
								<?php while($linha = mysqli_fetch_assoc($selectTipoUnidadeProdutoAlt)) {?>
								<option value="<?php echo $linha['idUnidade']?>"><?php echo $linha['nomeUnidade'];?></option>
								<?php }?>
							</select>
						</div>
						<div class="col-3 text-left">
							<label class="col-form-label" title="Registre o valor de medida do produto, ex: 5 Kg." style="cursor: help">VALOR</label>
							<div class="input-group">
								<input type="text" name="altValorMedida" id="modal-un-valor-produto" class="form-control text-center" disabled placeholder="Ex: 5" style="display:inline-block" />
								<div class="input-group-append">

									<div style='display:none;' id='divKilo'>
										<span id='divKilo' class="input-group-text">kg</span>
									</div>

									<div style='display:none;' id='divMiligrama'>
										<span id='divMiligrama' class="input-group-text">mg</span>
									</div>

									<div style='display:none;' id='divLitro'>
										<span id='divLitro' class="input-group-text">L</span>
									</div>

									<div style='display:none;' id='divMililitro'>
										<span id='divMilitro' class="input-group-text">mL</span>
									</div>

									<div style='display:none;' id='divGrama'>
										<span id='divGrama' class="input-group-text">g</span>
									</div>

									<div style='display:none;' id='divUnidade'>
										<span id='divUnidade' class="input-group-text">Un</span>
									</div>

								</div>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-3">
							<label title="Informe o preço do produto registrado ex: R$ 500,00." style="cursor: help">PREÇO</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">R$</span>
								</div>
								<input id="modal-preco-produto" type="text" class="form-control text-center" placeholder="10,00" name="altPrecoProduto" onkeyup="funcaoMoeda(this);" disabled>
							</div>
						</div>
						<div class="col-4">
							<label>DATA DATA MODIFICAÇÃO</label>
							<input type="text" class="form-control text-center" id="modal-data-ent-produto" readonly="true">
						</div>
						<div class="col-2">
							<label>QNT MINIMA</label>
							<input type="text" class="form-control text-center" id="modal-qnt-min-produto" name="altQuantidadeMinProduto" disabled>
						</div>
						<div class="col-3">
							<label>DIAS MINIMO</label>
							<input type="text" class="form-control text-center" id="modal-dias-min-produto" name="altDiasMinProduto" disabled>
						</div>
					</div>

					<div class="form-group text-left">
						<label class="col-form-label">Descrição do Produto:</label>
						<textarea class="form-control" id="modal-descricao-produto" name="altDescricaoProduto" disabled></textarea>
					</div>

					<!--SALVAR O ID DO MODAL-->
					<input type="text" class="form-control text-center" id="modal-id" name="idProduto" hidden disabled>
					<input type="text" class="form-control text-center" id="modal-id-preco-venda" name="idPrecoVenda" hidden disabled>

					<div class="modal-footer">
						<a class="btn btn-secondary text-white" data-dismiss="modal" id="fechar" name="fechar">Fechar</a>
						<button class="btn btn-success" id="atualizaDados" title="Alterar dados do produto" name="btn_alt" value="<?php echo $row_produto['idProduto']; ?>" disabled>Alterar dados</button>
						<a class="btn btn-success text-white" id="clicker">Editar</a>
					</div>

				</div>

			</form>
		</div>
	</div>
</div>

<!-- *******************************MODAL ADICIONAR PRODUTO************************************** -->

<div class="modal fade" id="modalAddProduto" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">ADICIONAR NOVO PRODUTO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body container">
								<div id="mensagemProduto"></div>

				<form id="formCadProduto">
					<?php
						include('banco/conexao.php');
						$script = "SELECT idTipoProduto,nomeTipoProduto FROM Tb_TipoProduto ORDER BY nomeTipoProduto ASC";
						$selectTipoProduto = mysqli_query($conn, $script);

						$script = "SELECT idUnidade,nomeUnidade	 FROM Tb_Unidade";
						$selectTipoUnidadeProduto = mysqli_query($conn, $script);

					?>
					<div class="row">
						<div class="form-group text-left col-6">
							<label id="nomeProdutoCadastro" for="recipient-name" class="col-form-label" title="O nome do produto será utilizado para futuro registros." style="cursor: help">NOME DO PRODUTO</label>
							<input type="text" class="form-control" id="produto" name="nomeProduto" maxlength="100">
						</div>
						<div class="form-group text-left col-4">
							<label for="recipient-name" class="col-form-label" title="Código de barras que pertence ao produto que deseja cadastrar." style="cursor: help">CÓDIGO DE BARRAS</label>
							<input type="text" class="form-control" id="codigoBarras" name="codigoBarrasProduto" maxlength="13">
						</div>
						<div class="col-2">
							<label for="recipient-name" class="col-form-label" title="Define se o produto possui validade." style="cursor: help">VALIDADE</label>
							<select class="custom-select text-center" id="validade" name="validade" required>
								<option value="1" class="text-center" selected>SIM</option>
								<option value="0" class="text-center" selected>NÃO</option>
								
							</select>
						</div>

					</div>

					<div class="row">
						<div class="form-group text-left col-6">
							<label for="recipient-name" class="col-form-label" title="Marca do produto que deseja cadastrar." style="cursor: help">MARCA</label>
							<input type="text" class="form-control" id="marca" name="marcaProduto" maxlength="100">
						</div>
						<div class="col-3">
							<label title="Define a quantidade mínima do produto em estoque. Toda vez que atingir a quantidade mínima você será alertado para reposição!" style="cursor: help">QUANTIDADE MÍNIMA</label>
							<input id="quantMin" type="number" class="form-control text-center" placeholder="ex: 500" name="quantidadeMinProduto" min="0" maxlength="99999">
						</div>
						<div class="col-3">
							<label title="Defina quantos dias sem vendas deste produto, para alertar o responsável." style="cursor: help">DIAS SEM VENDAS</label>
							<input id="diasMinimo" type="number" placeholder="ex: 40 dias" class="form-control text-center" name="diasMinProduto" min="0" maxlength="13">
						</div>
					</div>

					<div class="row">
						<div class="text-left col-3">
							<div class="row ml-2">
								<label title="Determine qual o tipo do produto que deseja registrar" style="cursor: help">TIPO DO PRODUTO</label>
							</div>
							<div class="input-group" id="selectTipoProduto">
							<select class="custom-select" id="tipoProduto" name="tipoProduto" required>
								<option class="text-center" selected>SELECIONAR</option>
								<?php while($linha = mysqli_fetch_assoc($selectTipoProduto)) {?>
								<option value="<?php echo $linha['idTipoProduto']?>"><?php echo $linha['nomeTipoProduto'];?></option>
								<?php }?>
							</select>
							<a class="input-group-append" role="button" data-toggle="modal" data-target="#modalAddTipoProduto"><span class="fa fa-plus-circle text-success ml-1 mt-2"></span></a>
							</div>


						</div>
						<div class="col-3">
							<label title="Informe o preço do produto registrado ex: R$ 500,00." style="cursor: help">PREÇO</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">R$</span>
								</div>
								<input id="preco" type="text" class="form-control text-center" min="0" maxlength="10" placeholder="10,00" name="precoProduto" onkeyup="funcaoMoeda(this);">
							</div>
						</div>
						<div class="col-3">
							<label title="Define qual a unidade de medida do produto, ex: Gramas (500g)." style="cursor: help">UNIDADE DE MEDIDA</label>
							<select class="custom-select" id="unidade" name="unidadeAbreviada" required>
								<option value="0" class="text-center" selected>SELECIONAR</option>
								<?php while($linha = mysqli_fetch_assoc($selectTipoUnidadeProduto)) {?>
								<option value="<?php echo $linha['idUnidade']?>"><?php echo $linha['nomeUnidade'];?></option>
								<?php }?>
							</select>
						</div>
						<div class="col-3 text-left">
							<label title="Registre o valor de medida do produto, ex: 5 Kg." style="cursor: help">VALOR DE MEDIDA</label>
							<div class="input-group">
								<input type="number" id="valor" name="valorMedida" class="form-control text-center" placeholder="Ex: 5" style="display:inline-block" min="0" max="99999">
								<div class="input-group-append">

									<div style='display:none;' id='AdddivKilo'>
										<span id='divKilo' class="input-group-text">kg</span>
									</div>

									<div style='display:none;' id='AdddivMiligrama'>
										<span id='divMiligrama' class="input-group-text">mg</span>
									</div>

									<div style='display:none;' id='AdddivLitro'>
										<span id='divLitro' class="input-group-text">L</span>
									</div>

									<div style='display:none;' id='AdddivMililitro'>
										<span id='divMilitro' class="input-group-text">mL</span>
									</div>

									<div style='display:none;' id='AdddivGrama'>
										<span id='divGrama' class="input-group-text">g</span>
									</div>

									<div style='display:none;' id='AdddivUnidade'>
										<span id='divUnidade' class="input-group-text">Un</span>
									</div>

								</div>

							</div>
						</div>
					</div>
					<div class="form-group text-left">
						<label class="col-form-label">DESCRIÇÃO DO PRODUTO:</label>
						<textarea class="form-control" id="descricaoProduto" name="descricaoProduto"></textarea>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal" id="fechar" name="fechar">FECHAR</button>
						<button type='submit' class="btn btn-success" id="cadastraProduto" disabled>REGISTRAR</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>




<!-- 	INSERIR TIPO DE PRODUTO	 -->

<div class="modal fade" id="modalAddTipoProduto" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">ADICIONE O TIPO DE PRODUTO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body container">
				<form id="formCadTipoProduto">
					<div id="mensagemTipoProduto"></div>
					<div id="atualizaBtnTipoProduto">
						<div class="col-12">
								<input id="campoTipoProduto" type="text" class="form-control text-center" placeholder="ex: PRODUTO PERECÍVEL" name="tipoProduto" min="5" maxlength="25" required>
						</div>
						<div class="mt-3 text-center">
							<a class="btn btn-secondary text-white" data-dismiss="modal" id="fechar" name="fechar">FECHAR</a>
							<button type='submit' class="btn btn-success" id="cadastraTipoProduto" autofocus disabled>REGISTRAR</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	
	//********************* 	MENSAGEM AJAX DO INSERT DO TIPO DE PRODUTO	 ****************************
	$('#formCadTipoProduto').submit(function(e){
		e.preventDefault();
		var formulario = $(this);
		var retorno = addFormTipoProduto(formulario)
	});
	
	function addFormTipoProduto(dados){
		$.ajax({
			type:"POST",
			data:dados.serialize(),
			url:"validacoes/validaInsertTipoProduto.php",
			sync:false
		}).done(function retornaMensagemTipoProduto(data){
				$sucesso = $.parseJSON(data)["sucesso"];
				$mensagem = $.parseJSON(data)["mensagem"];

				if($sucesso){
					//$('#mensagemTipoProduto').html($mensagem);
					$("#mensagemTipoProduto" ).html($mensagem).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
					document.getElementById('campoTipoProduto').value=''; // Limpa o campo
					$("#selectTipoProduto").load(location.href+" #selectTipoProduto>*","")//atualiza a div do select tipo produto

				}else{
					//EXIBEQUANDOACONTECEALGUMA FALHA NO MOMENTO DA ALTERAÇÃO
					$('#mensagemTipoProduto').html($mensagem).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
				}

			}).fail(function(){
			//ESSA MENSAGEM SÓ EXIBE QUANDO NAO PODE SE COMUNICAR COM A VALIDAÇÃO NO URL:
				$('#mensagemTipoProduto').html('<div class="btn-warning">Erro no sistema tente mais tarde...</div>').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );

			}).always(function(){
				
				$('#mensagemTipoProduto').show();
			});
			
	}
			
	//********************* 	MENSAGEM AJAX VERIFICA SE JÁ EXISTENTE O PRODUTO QUANDO DIGITA	 ****************************
	
	$('#formCadProduto').keyup(function(e){
		e.preventDefault();
		var formularioPesqProduto = $(this);
		var retornoPesqProduto = pesqFormProduto(formularioPesqProduto)
	});
	function pesqFormProduto(dados){
		
		$.ajax({
			type:"POST",
			data:dados.serialize(),
			url:"validacoes/validaPesqProduto.php",
			sync:false
		}).done(function retornaMensagemProduto(data){
				$sucesso = $.parseJSON(data)["sucesso"];
				$mensagem = $.parseJSON(data)["mensagem"];
				//var mensagem = "";
				if($sucesso == false){
					
					//$('#mensagemProduto').html($mensagem);
					$('#mensagemProduto').html($mensagem);			
						
				}else{
					
					$('#mensagemProduto').html('');			

				}

			}).fail(function(){
			//ESSA MENSAGEM SÓ EXIBE QUANDO NAO PODE SE COMUNICAR COM A VALIDAÇÃO NO URL:
				$('#mensagemProduto').html('<div class="btn-warning">Erro no sistema tente mais tarde...</div>').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );

			}).always(function(){
				
				$('#mensagemProduto').show();
			
			});
			
	}
//********************* 	FIM MENSAGEM AJAX VERIFICA SE JÁ EXISTENTE O PRODUTO QUANDO DIGITA	 ****************************

	
//*********************		INSERIR PRODUTO ********************************************
	$('#formCadProduto').submit(function(e){
		e.preventDefault();
		var formularioProduto = $(this);
		var retornoProduto = addFormProduto(formularioProduto)
	});
	
	
	function addFormProduto(dados){
		
		$.ajax({
			type:"POST",
			data:dados.serialize(),
			url:"validacoes/validaInsertProduto.php",
			sync:false
		}).done(function retornaMensagemProduto(data){
				$sucesso = $.parseJSON(data)["sucesso"];
				$mensagem = $.parseJSON(data)["mensagem"];

				if($sucesso){
					//$('#mensagemTipoProduto').html($mensagem);
					$("#mensagemProduto" ).html($mensagem).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
					
					$('#formCadProduto input,textarea').each(function(){
						$(this).val('');
						$("#minhaTabela").load(location.href+" #minhaTabela>*","")
					})
				}else{
					//EXIBEQUANDOACONTECEALGUMA FALHA NO MOMENTO DA ALTERAÇÃO
					$('#mensagemProduto').html($mensagem).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
				}

			}).fail(function(){
			//ESSA MENSAGEM SÓ EXIBE QUANDO NAO PODE SE COMUNICAR COM A VALIDAÇÃO NO URL:
				$('#mensagemProduto').html('<div class="btn-warning">Erro no sistema tente mais tarde...</div>').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );

			}).always(function(){
				
				$('#mensagemProduto').show();
			});
			
	}
	//*********************		FIM DO INSERIR PRODUTO ********************************************

	
</script>
