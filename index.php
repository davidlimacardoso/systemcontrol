<?php
  if(!isset($_SESSION))
  {
    session_start();
  }

  if (isset($_GET['login'])) {
    $logado = $_GET['login'];
  }

  if (isset($_GET['email'])) {
    $emailErro = $_GET['email'];
  }

  if (isset($_GET['senha'])) {
    $senhaErro = $_GET['senha'];
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
        <a href="#" class="navbar-brand loginLogo text-white ml-5">SYSTEM CONTROL</a>
    </nav>
    <?php 
        if(isset($_SESSION['msgCad']))
        {
          echo $_SESSION['msgCad'];
          unset($_SESSION['msgCad']);
        }
    ?>
      <div class="card-login">
          <div class="card">
              <div class="card-body">
                  <h3 class="text-center">LOGIN</h3>
                  <form action="validacoes/validaAcesso.php" method="post">
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-user"></i>
                            </div>
                          </div>
                          <input type="text" name="email" placeholder="USUÁRIO" class="form-control" autofocus>
                      </div>
                      <div class="input-group mt-3">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-key"></i>
                            </div>
                          </div>
                          <input type="password" name="pass" placeholder="SENHA" class="form-control">
                      </div>

                      <?php if(isset($logado) && $logado == "erro"){ ?>

                      <div class="text-danger text-center mt-3">Usuário ou senha inválido.</div>

                      <?php } ?>

                      <?php if(isset($emailErro) && $emailErro == "erro"){ ?>

                      <div class="text-danger text-center mt-3">Campo usuário vazio.</div>

                      <?php } ?>

                      <?php if(isset($senhaErro) && $senhaErro == "erro"){ ?>

                      <div class="text-danger text-center mt-3">Campo senha vazio.</div>

                      <?php } ?>

                      <button class="btn btn-lg btn-secondary btn-block mt-3" type="submit">ENTRAR</button>
                  </form>
                    <a href="recuperaSenha.php" class="text-secondary float-right mb-n3 mt-1">Esqueceu sua senha?</a>
              </div>
          </div>
      </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
   <!-- <script src="validacoes/validacaoJavaScript.js"></script>-->
    <script type="text/javascript">

      setTimeout(function() {
         $('#salvo').fadeOut('fast');
      }, 3000);

    </script>
  </body>
</html>