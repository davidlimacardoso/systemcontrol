//BOOTSTRAP PARAETRO DO PRODUTO PASSADO PARA O MODAL DETALHES
$('#modalDetCompra').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipient = button.data('whatever') // Extract info from data-* attributes
	var recipient_nome_produto = button.data('whatevernomeproduto')
	var recipient_cod_produto = button.data('whatevercodproduto')
	var recipient_pedido_produto = button.data('whateverpedidoproduto')
	var recipient_notafisc_produto = button.data('whatevernotafiscproduto')
	var recipient_fornecedor_produto = button.data('whateverfornecedorproduto')
	var recipient_precounit_produto = button.data('whateverprecounitproduto')
	var recipient_quantidade_produto = button.data('whateverquantidadeproduto')
	var recipient_total_produto = button.data('whatevertotalproduto')
	var recipient_datacompra_produto = button.data('whateverdatacompraproduto')
	var recipient_dataentrega_produto = button.data('whateverdataentregaproduto')
	var recipient_comprador_produto = button.data('whatevercompradorproduto')
	var recipient_datacadastro_produto = button.data('whateverdatacadastroproduto')
	var recipient_idcompra_produto = button.data('whateveridcompra')
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('.modal-title').text('Produto nº ' + recipient)
	modal.find('#modal-nome-produto').val(recipient_nome_produto)
	modal.find('#modal-codigobarras-produto').val(recipient_cod_produto)
	modal.find('#modal-pedido-produto').val(recipient_pedido_produto)
	modal.find('#modal-notafisc-produto').val(recipient_notafisc_produto)
	modal.find('#modal-forn-produto').val(recipient_fornecedor_produto)
	modal.find('#modal-precounit-produto').val(recipient_precounit_produto)
	modal.find('#modal-quantidade-produto').val(recipient_quantidade_produto)
	modal.find('#modal-valortotal-produto').val(recipient_total_produto)
	modal.find('#modal-datacompra-produto').val(recipient_datacompra_produto)
	modal.find('#modal-dataentrega-produto').val(recipient_dataentrega_produto)
	modal.find('#modal-comprador-produto').val(recipient_comprador_produto)
	modal.find('#modal-datacadastro-produto').val(recipient_datacadastro_produto)
	modal.find('#modal-idcompra-produto').val(recipient_idcompra_produto)
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
		$('textarea').each(function () {
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

//-----------------		HABILITAR BOTÃO QUANDO CAMPOS MODAL/FORM ADICIONAR PRODUTO ESTIVER PREENCHIDO	-----------------------------

$(function () {
	// vou pegar apenas os controles que estiverem dentro do form especificamente
	// pois podem haver mais outros forms ou controles em outros locais, os quais
	// não desejo afetar
	var $inputs = $("input, select", "#formCadCompra"), //CAMPOS
		$button = $("#registrarCompra"); //BOTAO

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
	$('#unidade').on('change', function () {
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
//----------------------------- MÁSCARA CODIGO DE BARRAS -----------------------------------------------