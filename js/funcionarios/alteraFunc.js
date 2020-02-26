$('#btnAlteraFunc').click(function(e) {
    e.preventDefault();
    var dados = $('#formAlteraFunc').serialize();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'validacoes/alteraFuncionario.php',
        async: true,
        data: dados,
        success: function(response) {
            $('input, select').val('')
            $('#modalAlterar').modal('hide');  
            $('#modalPermissao').modal('show')
        }
    });

    return false;
});

<script type="text/javascript" src="js/func/alteraFunc.js"></script>