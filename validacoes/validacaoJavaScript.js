$(function(){
    $('#cadastroEmpresa').submit(function(){
        var obj = this;
        var form = $(obj);
        var dados = new FormData(obj);
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: dados,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data){
                if(data == "nomeEmpresaErro"){
                    var titulo = document.getElementById("nome");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("campoNomeEmpresa");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("nome");
                    titulo.className = "form-control form-control-lg";
                    var exibirErro = document.getElementById("campoNomeEmpresa");
                    exibirErro.className = "invalid-feedback d-none";
                }
                /* if(data == "ErroSenha"){
                    var titulo = document.getElementById("pass");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("senhaErro");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("pass");
                    titulo.className = "form-control form-control-lg";
                    var exibirErro = document.getElementById("senhaErro");
                    exibirErro.className = "invalid-feedback d-none";                    
                }
               if(data == "ErroUsuario"){
                    var titulo = document.getElementById("loginErro");
                    titulo.className = "form-row d-block";
                }
                else{
                    var titulo = document.getElementById("loginErro");
                    titulo.className = "form-row d-none";
                }
                if(data == "Errousuario"){
                    alert("Usuário ou senha invalídos");
                    window.location.replace("login.php");
                }
                if(data == "Sucesso"){
                    window.location.replace("index.php");
                }*/
            },
        });
        return false;
    });
});

/*$(function(){
    $('#cadastro').submit(function(){
        var obj = this;
        var form = $(obj);
        var dados = new FormData(obj);
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: dados,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data){
                if(data == "nomeErro"){
                    var titulo = document.getElementById("nome");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("nomeErrado");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("nome");
                    titulo.className = "form-control form-control-lg";
                    var exibirErro = document.getElementById("nomeErrado");
                    exibirErro.className = "invalid-feedback d-none";
                }
                if(data == "emailErro"){
                    var titulo = document.getElementById("email");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("emailErrado");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("email");
                    titulo.className = "form-control form-control-lg";
                    var exibirErro = document.getElementById("emailErrado");
                    exibirErro.className = "invalid-feedback d-none";
                }
                if(data == "userErro"){
                    var titulo = document.getElementById("user");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("userErrado");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("user");
                    titulo.className = "form-control form-control-lg";
                    var exibirErro = document.getElementById("userErrado");
                    exibirErro.className = "invalid-feedback d-none";                    
                }
                if(data == "senhaErro"){
                    var titulo = document.getElementById("pass");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("senhaErrada");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("pass");
                    titulo.className = "form-control form-control-lg";
                    var exibirErro = document.getElementById("senhaErrada");
                    exibirErro.className = "invalid-feedback d-none";                    
                }
                if(data == "campoSenhaVazio"){
                    var titulo = document.getElementById("confirmarSenha");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("SenhaVazio");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("confirmarSenha");
                    titulo.className = "form-control form-control-lg";
                    var exibirErro = document.getElementById("SenhaVazio");
                    exibirErro.className = "invalid-feedback d-none";                    
                }
                if(data == "confirmarErro"){
                    var titulo = document.getElementById("confirmarSenha");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var titulo = document.getElementById("pass");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("Erro");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("confirmarSenha");
                    titulo.className = "form-control form-control-lg";
                    var exibirErro = document.getElementById("Erro");
                    exibirErro.className = "invalid-feedback d-none";                    
                }
                if(data == "Sucesso"){
                    //alert("Cadastro efetuado com sucesso!");
                    window.location.replace("../index.php");
                }
            },
        });
        return false;
    });
});*/

/*$(function(){
    $('#perfil').submit(function(){
        var obj = this;
        var form = $(obj);
        var dados = new FormData(obj);
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: dados,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data){
                if(data == "VazioNomeErro"){
                    var titulo = document.getElementById("PerfilNome");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoNomePerfil");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("PerfilNome");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoNomePerfil");
                    exibirErro.className = "invalid-feedback d-none";
                }
                
                if(data == "VazioRgErro"){
                    var titulo = document.getElementById("rg");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoRg");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("rg");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoRg");
                    exibirErro.className = "invalid-feedback d-none";
                }

                if(data == "VaziocpfErro"){
                    var titulo = document.getElementById("cpf");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoCpf");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("cpf");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoCpf");
                    exibirErro.className = "invalid-feedback d-none";
                }

                if(data == "VazioUserErro"){
                    var titulo = document.getElementById("user");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoUserPerfil");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("user");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoUserPerfil");
                    exibirErro.className = "invalid-feedback d-none";
                }

                if(data == "VazioTelErro"){
                    var titulo = document.getElementById("telefone");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoTel");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("telefone");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoTel");
                    exibirErro.className = "invalid-feedback d-none";
                }

                if(data == "VazioEndErro"){
                    var titulo = document.getElementById("endUm");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoEnd");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("endUm");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoEnd");
                    exibirErro.className = "invalid-feedback d-none";
                }

                if(data == "VazioCepErro"){
                    var titulo = document.getElementById("endUm");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoEnd");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("endUm");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoEnd");
                    exibirErro.className = "invalid-feedback d-none";
                }

                if(data == "VazioNumErro"){
                    var titulo = document.getElementById("numero");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoNum");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("numero");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoNum");
                    exibirErro.className = "invalid-feedback d-none";
                }

                if(data == "VazioCepErro"){
                    var titulo = document.getElementById("cepEndereco");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoCep");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("cepEndereco");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoCep");
                    exibirErro.className = "invalid-feedback d-none";
                }

                if(data == "VazioCityErro"){
                    var titulo = document.getElementById("city");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ErradoCity");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("city");
                    titulo.className = "form-control ";
                    var exibirErro = document.getElementById("ErradoCity");
                    exibirErro.className = "invalid-feedback d-none";
                }

               

                if(data == "Sucesso"){
                    window.location.replace("index.php");
                }
            },
        });
        return false;
    });
});*/

$(function(){
    $('#trocandoSenha').submit(function(){
        var obj = this;
        var form = $(obj);
        var dados = new FormData(obj);
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: dados,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data){
                if(data == "senhaAtualErro"){
                    var titulo = document.getElementById("senhaAtual");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("senhaAtualErrada");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("senhaAtual");
                    titulo.className = "form-control";
                    var exibirErro = document.getElementById("senhaAtualErrada");
                    exibirErro.className = "invalid-feedback d-none";
                }
                if(data == "novaSenhaErro"){
                    var titulo = document.getElementById("novaSenha");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("novaSenhaErrada");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("novaSenha");
                    titulo.className = "form-control";
                    var exibirErro = document.getElementById("novaSenhaErrada");
                    exibirErro.className = "invalid-feedback d-none";
                }
                
                if(data == "confSenhaErro"){
                    var titulo = document.getElementById("ConfSenha");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("ConfSenhaErrada");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("ConfSenha");
                    titulo.className = "form-control";
                    var exibirErro = document.getElementById("ConfSenhaErrada");
                    exibirErro.className = "invalid-feedback d-none";                    
                }
                if(data == "diferentesErro"){
                    var titulo = document.getElementById("novaSenha");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var titulo = document.getElementById("ConfSenha");
                    titulo.className = "form-control form-control-lg is-invalid";
                    var exibirErro = document.getElementById("Erro");
                    exibirErro.className = "invalid-feedback d-block";
                    titulo.focus();
                }
                else{
                    var titulo = document.getElementById("novaSenha");
                    titulo.className = "form-control";
                    var titulo = document.getElementById("ConfSenha");
                    titulo.className = "form-control";
                    var exibirErro = document.getElementById("Erro");
                    exibirErro.className = "invalid-feedback d-none";                    
                }
                if(data == "Sucesso"){
                    alert("Senha alterada com sucesso!");
                    window.location.replace("perfilTrocaSenha.php");
                }
            },
        });
        return false;
    });
});