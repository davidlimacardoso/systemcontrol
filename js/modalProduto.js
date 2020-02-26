//BOOTSTRAP PARAETRO DO PRODUTO PASSADO PARA O MODAL DETALHES
$('#modalDetProd').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipient = button.data('whatever') // Extract info from data-* attributes
	var recipient_nome_produto = button.data('whatevernomeproduto')
	var recipient_descricao_produto = button.data('whateverdescricaoproduto')
	var recipient_data_ent_produto = button.data('whateverdataentproduto')
	var recipient_data_cod_produto = button.data('whatevercodproduto')
	var recipient_data_cat_produto = button.data('whatevercatproduto')
	var recipient_val_produto = button.data('whatevervalproduto')
	var recipient_marca_produto = button.data('whatevermarcaproduto')
	var recipient_preco_produto = button.data('whateverprecoproduto')
	var recipient_usuariocad_produto = button.data('whateverusuariocadproduto')
	var recipient_qnt_min_produto = button.data('whateverqntminproduto')
	var recipient_dias_min_produto = button.data('whateverdiasminproduto')
	var recipient_un_medida_produto = button.data('whateverunmedidaproduto')
	var recipient_un_valor_produto = button.data('whateverunvalorproduto')
	var recipient_id_produto = button.data('whateveridproduto')
	var recipient_id_preco_produto = button.data('whateveridprecoproduto')
	var recipient_validade_produto = button.data('whatevervalidadeproduto')
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('.modal-title').text('Produto nº ' + recipient)
	modal.find('#modal-nome-produto').val(recipient_nome_produto)
	modal.find('#modal-descricao-produto').val(recipient_descricao_produto)
	modal.find('#modal-data-ent-produto').val(recipient_data_ent_produto)
	modal.find('#modal-cod-produto').val(recipient_data_cod_produto)
	modal.find('#modal-cat-produto').val(recipient_data_cat_produto)
	modal.find('#modal-val-produto').val(recipient_val_produto)
	modal.find('#modal-marca-produto').val(recipient_marca_produto)
	modal.find('#modal-preco-produto').val(recipient_preco_produto)
	modal.find('#modal-usuariocad-produto').val(recipient_usuariocad_produto)
	modal.find('#modal-unimedida-produto').val(recipient_un_medida_produto)
	modal.find('#modal-qnt-min-produto').val(recipient_qnt_min_produto)
	modal.find('#modal-dias-min-produto').val(recipient_dias_min_produto)
	modal.find('#modal-un-valor-produto').val(recipient_un_valor_produto)
	modal.find('#modal-id').val(recipient_id_produto)
	modal.find('#modal-id-preco-venda').val(recipient_id_preco_produto)
	modal.find('#modal-validade-produto').val(recipient_validade_produto)
});
//------------------------------------------------------------------------------------
//BOOTSTRAP PARAETRO DO PRODUTO PASSADO PARA O MODAL ALTERAR DADOS
$('#modalAltProd').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipient_alt = button.data('whateveraltprod') // Extract info from data-* attributes
	var recipient_alt_nome_produto = button.data('whateveraltnomeproduto')
	var recipient_alt_descricao_produto = button.data('whateveraltdescricaoproduto')
	var recipient_alt_data_ent_produto = button.data('whateveraltdataentproduto')
	var recipient_alt_data_cod_produto = button.data('whateveraltcodproduto')
	var recipient_alt_data_cat_produto = button.data('whateveraltcatproduto')
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('.modal-alt-title').text('Produto nº ' + recipient_alt)
	modal.find('#modal-alt-nome-produto').val(recipient_alt_nome_produto)
	modal.find('#modal-alt-descricao-produto').val(recipient_alt_descricao_produto)
	modal.find('#modal-alt-data-ent-produto').val(recipient_alt_data_ent_produto)
	modal.find('#modal-alt-cod-produto').val(recipient_alt_data_cod_produto)
	modal.find('#modal-alt-cat-produto').val(recipient_alt_data_cat_produto)
});
//----------------------------------------------

//-----------------		DESABILITAR/HABILITAR CAMPOS MODAL DETALHES COM JQUERY 1.6	-----------------------------

$().ready(function () {
	var bt = document.getElementById('clicker');

	$('#clicker').click(function () {
		$('input').each(function () {
			if ($(this).attr('disabled')) {
				$(this).removeAttr('disabled');


			} else {
				$(this).attr({
					'disabled': 'disabled'
				});
			}
		});
		$('select').each(function () {
			if ($(this).attr('disabled')) {
				$(this).removeAttr('disabled');


			} else {
				$(this).attr({
					'disabled': 'disabled'
				});
			}
		});
		$('.desabilita').each(function () {
			if ($(this).attr('disabled')) {
				$(this).removeAttr('disabled');


			} else {
				$(this).attr({
					'disabled': 'disabled'
				});
			}
		});
		$('#produto, #marca ,#tipoProduto, #codigoBarras, #usuarioCadastro, #unidade, #valor, #unidade, #preco, #dataModificacao, #quantMin, #diasMinimo, #descricaoProduto').each(function () {
			if ($(this).attr('disabled')) {
				$(this).removeAttr('disabled');


			} else {
				$(this).attr({
					'disabled': 'disabled'
				});
			}
		});
		
		
		//DESABILITA BOTAO ATUALIZAR
		$('#atualizaDados').each(function () {
			if ($(this).attr('disabled')) {
				$(this).removeAttr('disabled');

				//ALTERA O TEXTO DO BOTÃO
				$('button#clicker').text("Cancelar").attr({
					title: "Cancelar edição"
				});
			} else {
				//ALTERA O TEXTO DO BOTÃO
				$('button#clicker').text("Editar").attr({
					title: "Editar dados do produto"
				});
				$(this).attr({
					'disabled': 'disabled'
				});
			}
		});
	});
});

//FECHAR MODAL
$().ready(function () {
	var bt = document.getElementById('clicker');

	$('#fechar').click(function () {
		$('input').each(function () {
			if ($(this).attr('enable')) {
				$(this).removeAttr('disabled');


			} else {
				$(this).attr({
					'disabled': 'disabled'
				});
			}
		});
		$('select').each(function () {
			if ($(this).attr('enable')) {
				$(this).removeAttr('disabled');


			} else {
				$(this).attr({
					'disabled': 'disabled'
				});
			}
		});
		$('#pesquisar').each(function () {
			if ($(this).attr('disabled')) {
				$(this).removeAttr('disabled');


			} else {
				$(this).attr({
					'disabled': 'disabled'
				});
			}
		});
		$('#produto, #marca ,#tipoProduto, #codigoBarras, #usuarioCadastro, #unidade, #valor, #unidade, #preco, #dataModificacao, #quantMin, #diasMinimo, #descricaoProduto').each(function () {
			if ($(this).attr('enable')) {
				$(this).removeAttr('disabled');


			} else {
				$(this).attr({
					'disabled': 'disabled'
				});
			}
		});

	});
});

//-----------------		HABILITAR BOTÃO QUANDO CAMPOS MODAL/FORM ADICIONAR PRODUTO ESTIVER PREENCHIDO	-----------------------------

$(function () {
	// vou pegar apenas os controles que estiverem dentro do form especificamente
	// pois podem haver mais outros forms ou controles em outros locais, os quais
	// não desejo afetar
	var $inputs = $("input, textarea, select", "#formCadProduto"), //CAMPOS
		$button = $("#cadastraProduto"); //BOTAO

	var limpos = 0;

	// contagem inicial de valores não preenchidos
	$inputs.each(function () {
		var $this = $(this);
		var val = $this.val();
		val || limpos++;
		$this.data("val-antigo", val);
	});

	$button.prop("disabled", !!limpos);

	// agora só vamos ouvir eventos específicos, e alterar a quantidade de limpos
	// quando um valor for alterado... não vamos mais iterar pelos controles
	$inputs.on("change keyup mouseup", function () {
		var $this = $(this);
		var val = $this.val();
		limpos += (val ? 0 : 1) - ($this.data("val-antigo") ? 0 : 1);
		$this.data("val-antigo", val);
		$button.prop("disabled", !!limpos);
	});
});

//-----------------		OCULTAR E EXIBIR SPAN DO INPUT UNIDADE ABREVIADA DE MEDIDA	-----------------------------


$(document).ready(function () {
	//Chama o evento após selecionar um valor
	$('#modal-unimedida-produto').on('change', function () {
		//Verifica se o valor é igual a kilo e exibe-o
		if (this.value == '1') {
			$("#divGrama").hide(); //2
			$("#divMiligrama").hide(); //3
			$("#divLitro").hide(); //5
			$("#divMililitro").hide(); //4
			$("#divUnidade").hide(); //6
			$("#divKilo").show(); //1
		}
		//Verifica se o valor é igual a grama e mostra a divDoce
		else if (this.value == '2') {
			$("#divKilo").hide();
			$("#divMiligrama").hide();
			$("#divLitro").hide();
			$("#divMililitro").hide();
			$("#divUnidade").hide();
			$("#divGrama").show();
		}
		//Verifica se o valor é igual a miligrama e mostra a divDoce
		else if (this.value == '3') {
			$("#divKilo").hide();
			$("#divMiligrama").show();
			$("#divLitro").hide();
			$("#divMililitro").hide();
			$("#divUnidade").hide();
			$("#divGrama").hide();
		}
		//Verifica se o valor é igual a mililitro e mostra a divDoce
		else if (this.value == '4') {
			$("#divKilo").hide();
			$("#divMiligrama").hide();
			$("#divLitro").hide();
			$("#divMililitro").show();
			$("#divUnidade").hide();
			$("#divGrama").hide();
		}
		//Verifica se o valor é igual a litro e mostra a divDoce
		else if (this.value == '5') {
			$("#divKilo").hide();
			$("#divMiligrama").hide();
			$("#divLitro").show();
			$("#divMililitro").hide();
			$("#divUnidade").hide();
			$("#divGrama").hide();
		}
		//Verifica se o valor é igual a unidade e mostra a divDoce
		else if (this.value == '6') {
			$("#divKilo").hide();
			$("#divMiligrama").hide();
			$("#divLitro").hide();
			$("#divMililitro").hide();
			$("#divUnidade").show();
			$("#divGrama").hide();
		}

		//Se não for nem 1 nem outro esconde os 3
		else {
			$("#divKilo").hide();
			$("#divMiligrama").hide();
			$("#divLitro").hide();
			$("#divMililitro").hide();
			$("#divUnidade").hide();
			$("#divGrama").hide();
		}
	});
});

//modal ADD PRODUTO
$(document).ready(function () {
	//Chama o evento após selecionar um valor
	$('#unidade').on('change', function () {
		//Verifica se o valor é igual a kilo e exibe-o
		if (this.value == '1') {
			$("#AdddivGrama").hide(); //2
			$("#AdddivMiligrama").hide(); //3
			$("#AdddivLitro").hide(); //5
			$("#AdddivMililitro").hide(); //4
			$("#AdddivUnidade").hide(); //6
			$("#AdddivKilo").show(); //1
		}
		//Verifica se o valor é igual a grama e mostra a divDoce
		else if (this.value == '2') {
			$("#AdddivKilo").hide();
			$("#AdddivMiligrama").hide();
			$("#AdddivLitro").hide();
			$("#AdddivMililitro").hide();
			$("#AdddivUnidade").hide();
			$("#AdddivGrama").show();
		}
		//Verifica se o valor é igual a miligrama e mostra a divDoce
		else if (this.value == '3') {
			$("#AdddivKilo").hide();
			$("#AdddivMiligrama").show();
			$("#AdddivLitro").hide();
			$("#AdddivMililitro").hide();
			$("#AdddivUnidade").hide();
			$("#AdddivGrama").hide();
		}
		//Verifica se o valor é igual a mililitro e mostra a divDoce
		else if (this.value == '4') {
			$("#AdddivKilo").hide();
			$("#AdddivMiligrama").hide();
			$("#AdddivLitro").hide();
			$("#AdddivMililitro").show();
			$("#AdddivUnidade").hide();
			$("#AdddivGrama").hide();
		}
		//Verifica se o valor é igual a litro e mostra a divDoce
		else if (this.value == '5') {
			$("#AdddivKilo").hide();
			$("#AdddivMiligrama").hide();
			$("#AdddivLitro").show();
			$("#AdddivMililitro").hide();
			$("#AdddivUnidade").hide();
			$("#AdddivGrama").hide();
		}
		//Verifica se o valor é igual a unidade e mostra a divDoce
		else if (this.value == '6') {
			$("#AdddivKilo").hide();
			$("#AdddivMiligrama").hide();
			$("#AdddivLitro").hide();
			$("#AdddivMililitro").hide();
			$("#AdddivUnidade").show();
			$("#AdddivGrama").hide();
		}

		//Se não for nem 1 nem outro esconde os 3
		else {
			$("#AdddivKilo").hide();
			$("#AdddivMiligrama").hide();
			$("#AdddivLitro").hide();
			$("#AdddivMililitro").hide();
			$("#AdddivUnidade").hide();
			$("#AdddivGrama").hide();
		}
	});
});
//MÁSCARA DE MOEDA NO INPUT
	function funcaoMoeda(i) {
		var v = i.value.replace(/\D/g, '');
		v = (v / 100).toFixed(2) + '';
		v = v.replace(".", ",");
		v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
		v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
		i.value = v;
	}

$(function () {
	// vou pegar apenas os controles que estiverem dentro do form especificamente
	// pois podem haver mais outros forms ou controles em outros locais, os quais
	// não desejo afetar
	var $inputs = $("input", "#formCadTipoProduto"), //CAMPOS
		$button = $("#cadastraTipoProduto"); //BOTAO

	var limpos = 0;

	// contagem inicial de valores não preenchidos
	$inputs.each(function () {
		var $this = $(this);
		var val = $this.val();
		val || limpos++;
		$this.data("val-antigo", val);
	});

	$button.prop("disabled", !!limpos);

	// agora só vamos ouvir eventos específicos, e alterar a quantidade de limpos
	// quando um valor for alterado... não vamos mais iterar pelos controles
	$inputs.on("change keyup mouseup", function () {
		var $this = $(this);
		var val = $this.val();
		limpos += (val ? 0 : 1) - ($this.data("val-antigo") ? 0 : 1);
		$this.data("val-antigo", val);
		$button.prop("disabled", !!limpos);
	});
});
