$('#btnSalvarFunc').click(function(e) {
    e.preventDefault();
    var dados = $('#formFunc').serialize();
    if(document.getElementById("PerfilNome").value == ""){
        document.getElementById("ErradoNomePerfil").className = 'invalid-feedback d-block';
        document.getElementById("PerfilNome").className = 'form-control is-invalid';
        document.getElementById("PerfilNome").focus();
        return false
    }
    else{
        document.getElementById("ErradoNomePerfil").className = 'invalid-feedback d-none';
        document.getElementById("PerfilNome").className = 'form-control';
    }

    if(document.getElementById("rg").value == ""){
        document.getElementById("ErradoRg").className = 'invalid-feedback d-block';
            document.getElementById("rg").className = 'form-control is-invalid';
    document.getElementById("rg").focus();
    return false
    }
    else{
        document.getElementById("ErradoRg").className = 'invalid-feedback d-none';
        document.getElementById("rg").className = 'form-control';
    }

    if(document.getElementById("cpf").value == ""){
        document.getElementById("ErradoCpf").className = 'invalid-feedback d-block';
        document.getElementById("cpf").className = 'form-control is-invalid';
        document.getElementById("cpf").focus();
    return false
    }
    else{
        document.getElementById("ErradoCpf").className = 'invalid-feedback d-none';
        document.getElementById("cpf").className = 'form-control';
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'validacoes/validaFuncionario.php',
        async: true,
        data: dados,
        success: function(response) {
            if (success = true) {
                $('input, select').val('')
                $('#modalPessoas').modal('hide');  
                $('#modalPermissao').modal('show')

            }else{
                $('input, select').val('')
                $('#modalPessoas').modal('hide');  
                $('#modalFuncAtivo').modal('show')
            }
            
        }
    });

    return false;
});


