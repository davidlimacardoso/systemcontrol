//BOOTSTRAP PARAETRO DO lote PASSADO PARA O MODAL DETALHES
$('#modalDetLote').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipient = button.data('whatever') // Extract info from data-* attributes
	var recipient_idcompra = button.data('idcompraproduto')
	
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('.modal-title').text('Lote código: ' + recipient)
	modal.find('#modal_idCompra').val(recipient_idcompra)
	
});
//------------------------------------------------------------------------------------
//BOOTSTRAP PARAETRO DO lote PASSADO PARA O MODAL ALTERAR DADOS
$('#modalAltProd').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipient_alt = button.data('whateveraltprod') // Extract info from data-* attributes
	var recipient_alt_nome_lote = button.data('whateveraltnomelote')
	var recipient_alt_descricao_lote = button.data('whateveraltdescricaolote')
	var recipient_alt_data_ent_lote = button.data('whateveraltdataentlote')
	var recipient_alt_data_cod_lote = button.data('whateveraltcodlote')
	var recipient_alt_data_cat_lote = button.data('whateveraltcatlote')
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('.modal-alt-title').text('lote nº ' + recipient_alt)
	modal.find('#modal-alt-nome-lote').val(recipient_alt_nome_lote)
	modal.find('#modal-alt-descricao-lote').val(recipient_alt_descricao_lote)
	modal.find('#modal-alt-data-ent-lote').val(recipient_alt_data_ent_lote)
	modal.find('#modal-alt-cod-lote').val(recipient_alt_data_cod_lote)
	modal.find('#modal-alt-cat-lote').val(recipient_alt_data_cat_lote)
});
//----------------------------------------------
//-----------------		HABILITAR BOTÃO QUANDO CAMPOS MODAL/FORM ADICIONAR PRODUTO ESTIVER PREENCHIDO	-----------------------------

$(function () {
	// vou pegar apenas os controles que estiverem dentro do form especificamente
	// pois podem haver mais outros forms ou controles em outros locais, os quais
	// não desejo afetar
	var $inputs = $("input, textarea, select", "#formCadLote"), //CAMPOS
		$button = $("#cadastraLote"); //BOTAO

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



