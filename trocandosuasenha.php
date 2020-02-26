<?php
  if(!isset($_SESSION))
  {
    session_start();
  }
  date_default_timezone_set("America/Sao_Paulo");
  $data = date('Y-m-d');
  
  if (isset($_GET['seuemail'])) {
    $seuEmail = $_GET['seuemail'];
  }

  if (isset($_GET['data'])) {
    $diaData = $_GET['data'];
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
        <a class="navbar-brand loginLogo text-white ml-5">SYSTEM CONTROL</a>
    </nav>


    <?php if (!empty($_GET['seuemail']) && $_GET['data'] == $data) {
    include('validacoes/carregaFuncAltera.php'); ?>
      <div class="card-login">
          <div class="card">
              <div class="card-body">
                  <h3 class="text-center">Bem vindo <?php echo $_SESSION['p_nome'];?></h3>
                  <form id="formSalvaSenha" action="validacoes/salvandoSenha.php" method="post">
                    <div class="text-center">Vamos alterar a sua senha...</div>
                    <input type="hidden" name="nome" value="<?php echo $_SESSION['id'];?>" class="form-control">
                      <div class="mt-3">
                          <input type="password" name="passNova" id="passNova" placeholder="NOVA SENHA" class="form-control">
                      </div>
                      <div class="mt-3">
                          <input type="password" name="passConfirma" id="passConfirma" placeholder="CONFIRMAR SENHA" class="form-control">
                      </div>
                      <button class="btn btn-lg btn-secondary btn-block mt-3" type="submit">SALVAR</button>
                  </form>
              </div>
          </div>
      </div>
    <?php include('modal/modalAlertas/modalRespostas.php');
  }else{?>
          <div class="card">
              <div class="card-body">
                <div class="h1 text-center">Página desativada temporariamente.</div>
                <div class="h5 text-center">
                  <a class="text-center" href="recuperaSenha.php">Solicite novamente a alteração de sua senha.</a>
                </div>
              </div>
          </div>

  <?php }?>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">

      $('#formSalvaSenha').validate({
        errorClass: 'error',
        validClass: 'valid',

        rules : {
          passNova : {
            required : true,
            minlength : 3,
            maxlength : 20
          },
          passConfirma : {
            required : true,
            equalTo : '#passNova'
          }
        },
        messages : {
          passNova : {
            required : 'Informe a senha.',
            minlength : 'A senha deve ter, no mínimo, 3 caracteres.',
            maxlength : 'A senha deve ter, no máximo, 20 caracteres.'
          },
          passConfirma : {
            required : 'Confirme a senha.',
            equalTo : 'As senhas não se correspondem.'
          }
        },
      });
      </script>
  </body>
</html>