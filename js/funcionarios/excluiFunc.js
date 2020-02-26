$('#btnExcluiFunc').click(function(e) {
    e.preventDefault();
    var dados = $('#formExcluiFunc').serialize();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'validacoes/excluirFuncionario.php',
        async: true,
        data: dados,
        success: function(response) {
            $('input, select').val('')
            $('#modalExcluir').modal('hide');  
            $('#modalPermissao').modal('show')
        }
    });

    return false;
});

//<script type="text/javascript" src="js/func/excluiFunc.js"></script>