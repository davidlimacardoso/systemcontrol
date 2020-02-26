<?php
  if(!isset($_SESSION))
  {
    session_start();
  }

  if (isset($_GET['loginEmail'])) {
    $logado = $_GET['login'];
  }

  if (isset($_GET['emailSenha'])) {
    $emailSenhaErro = $_GET['emailSenha'];
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--CSS-Custom -->
    <link rel="stylesheet" type="text/css" href="css-custom/estilo.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <title>SYSTEM CONTROL</title>
  </head>
  <body>

    <nav class="navbar navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand loginLogo text-white ml-5">SYSTEM CONTROL</a>
    </nav>
    <?php 
        if(isset($_SESSION['msgCad']))
        {
          echo $_SESSION['msgCad'];
          unset($_SESSION['msgCad']);
        }
    ?>

     <!-- gif load-->
      <div class="text-center corFundoLoad" id="fundoLoad" style="display:none;">
          <div class="load" id="loading" style="display:none;">
              <div class="spinner-grow text-light" role="status">
                  <span class="sr-only">Loading...</span>
              </div>
              <p class=" text-light">Validando e-mail, porfavor aguarde...</p>
          </div>
      </div>
      <!-- fim gif load-->

      <div class="card-login">
          <div class="card">
              <div class="card-body">
                  <h4 class="text-center">RECUPERAÇÃO DE SENHA</h4>
                  <form id="formSenhaEmail" action="" method="post">
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-user"></i>
                            </div>
                          </div>
                          <input type="email" name="emailSenha" placeholder="exemplo@exemplo.com.br" class="form-control" autofocus>
                      </div>
                      <?php if(isset($logado) && $logado == "erro"){ ?>

                      <div class="text-danger text-center mt-3">Email inválido.</div>

                      <?php } ?>

                      <?php if(isset($emailSenhaErro) && $emailSenhaErro == "erro"){ ?>

                      <div class="text-danger text-center mt-3">Campo Email vazio.</div>

                      <?php } ?>

                      <button class="btn btn-lg btn-secondary btn-block mt-3" id="enviaEmail" type="submit">ENVIAR</button>
                  </form>
                    <a href="index.php" class="text-secondary float-right mb-n3 mt-1">Voltar para Login</a>
              </div>
          </div>
      </div>
<?php include('modal/modalAlertas/modalRespostas.php');?>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
   <!-- <script src="validacoes/validacaoJavaScript.js"></script>-->

   <script type="text/javascript">

      setTimeout(function() {
         $('#salvo').fadeOut('fast');
      }, 2000);

    </script>

    <script type="text/javascript">
        $('#enviaEmail').click(function(e) {
            e.preventDefault();
            $('#loading').show();
            $('#fundoLoad').show();
            var dados = $('#formSenhaEmail').serialize();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'validacoes/validaEmailSenha.php',
                async: true,
                data: dados,
                success: function(response) {
                    
                    if (success = true) {
                        $('.load').hide()
                        $('.corFundoLoad').hide()
                        $('input').val('')
                        $('#modalAcerto').modal('show')
                        $('#ModalMensagem').html('E-mail validado com sucesso.<br>Enviamos um email com instruções para recuperação de sua senha.') 
                    }
                    
                },
                error: function (response) {
                        $('.load').hide()
                        $('.corFundoLoad').hide()
                        $('input').val('')
                        $('#modalFalha').modal('show') 
                        $('#ModalMensagemErro').html('Falha ao recuperar sua senha. </br>E-mail inválido.') 
               }
            });

            return false;
        });
</script>
  </body>
</html>