<?php
  if(!isset($_SESSION))
  {
    session_start();
  }

?>
<script type="text/javascript" src="js/mascara.js"></script>

<div class="wrapper">

  <?php include('validacoes/menu.php'); ?>

  <div class="d-flex justify-content-between">
       <span class="mt-n4 mb-3 lead"><i class="fas fa-users mr-2"></i><?php echo "FALE CONOSCO"; ?></span>
       <span class="mt-n4 mb-2 lead">
        <?php date_default_timezone_set("America/Sao_Paulo");
        $data = date('Y-m-d H:i'); 
        if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
       </span>
    </div>

  <?php if (isset($_GET['email']) && $_GET['email']='OK' ) { ?>
    <div class="text-center bg-success mb-3 p-2 h5" id="salvo">Dados salvo com sucesso!</div>
  <?php }?>
  <?php if (isset($_GET['dados']) && $_GET['dados']='erro' ) { ?>
    <div class="text-center bg-danger mb-3 p-2 h5" id="salvo">Não foi possível enviar este e-mail! Por favor tente novamente mais tarde.</div>
  <?php }?>
  <?php if (isset($_GET['campos']) && $_GET['campos']='erro' ) { ?>
    <div class="text-center bg-warning mb-3 p-2 h5" id="salvo">E necessario que todos os campos sejam preenchidos.</div>
  <?php }?>

  <div class="container">  

	<div class="py-3 text-center">
		<h2>SYSTEM CONTROL</h2>
		<p class="lead">Deixe sua duvida ou sugestao que entraremos em contato com uma resposta.</p>
	</div>

		<div class="row">
			<div class="col-md-12">
			
				<div class="card-body font-weight-bold">
					<form action="validacoes/processa_envio.php" method="post">
						<div class="form-group">
							<label for="assunto">Assunto</label>
							<input name="assunto" type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail">
						</div>

						<div class="form-group">
							<label for="mensagem">Mensagem</label>
							<textarea name="mensagem" class="form-control" id="mensagem" rows="5" cols="33"></textarea>
						</div>

						<button type="submit" class="btn btn-primary btn-lg float-right">Enviar Mensagem</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
	setTimeout(function() {
     $('#salvo').fadeOut('fast');
  }, 4000);
</script>