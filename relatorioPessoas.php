<div class="wrapper">

<?php include('validacoes/menu.php'); ?>
<?php
  if(!isset($_SESSION))
  {
    session_start();
  }
  if($_SESSION['cnpj'] == ""){ ?>
  <div class="text-center bg-danger mb-3 p-2 h5">Solicite para seu gerente verificar as configurações do sistema.</div>
<?php }
  if($_SESSION['idPerfil'] != 1 & $_SESSION['idPerfil'] != 2 & $_SESSION['idPerfil'] != 4){ ?>
  <div class="text-center"><img src="imagens/pagina_erro.png"></div>
<?php }else{
?>
<script type="text/javascript" src="js/mascara.js"></script>

    <div class="d-flex justify-content-between">
	   <span class="mt-n4 mb-2 lead"><i class="fas fa-users mr-2"></i><?php echo "RELATÓRIO FUNCIONÁRIOS"; ?></span>
	   <span class="mt-n4 mb-1 lead">
	    <?php date_default_timezone_set("America/Sao_Paulo");
	    $data = date('Y-m-d H:i'); 
	    if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
	   </span>
	</div>		   

	<div class="container mt-4 border">
		<div class="row mb-3 mt-4">
    		<div class="col-md-4">
    			<div class="card border-dark shadow">
					<div class="card-header bg-secondary text-center text-light">
						<h6>FUNCIONÁRIOS CADASTRADOS</h6>
					</div>
					<div class="card-body">
						 <h5 class="card-title" id="numeroVendas">
						 <?php
			              if (isset($_SESSION['empresaNome'])){
			                include('banco/conexao.php');

			                $script = "SELECT count(idUsuario) as quantUsarios FROM Tb_Usuario";

			                $sql = mysqli_query($conn, $script);
			        
			                
			                if(mysqli_num_rows($sql) > 0)
			                {

			                  while($linha = mysqli_fetch_assoc($sql))
			                  {
			                    $_SESSION['id'] = $linha['quantUsarios'];
			              ?>
			                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantUsarios']; ?></p>
			            <?php }
			                } 
			              }else{
			                ?>
			                <p class="card-text h3 text-right">?</p>
			             <?php }?>
						 </h5>
					</div>
				</div>
			</div>

			<div class="col-md-4">
    			<div class="card border-dark shadow">
					<div class="card-header bg-secondary text-center text-light">
						<h6>FUNCIONÁRIOS ATIVOS</h6>
					</div>
					<div class="card-body">
						 <h5 class="card-title" id="totalVendas">
						 <?php
			              if (isset($_SESSION['empresaNome'])){
			                include('banco/conexao.php');

			                $script = "SELECT count(idUsuario) as quantUsarios FROM Tb_Usuario WHERE ATIVO = 1";

			                $sql = mysqli_query($conn, $script);
			        
			                
			                if(mysqli_num_rows($sql) > 0)
			                {

			                  while($linha = mysqli_fetch_assoc($sql))
			                  {
			                    $_SESSION['id'] = $linha['quantUsarios'];
			              ?>
			                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantUsarios']; ?></p>
			            <?php }
			                } 
			              }else{
			                ?>
			                <p class="card-text h3 text-right">?</p>
			             <?php }?>
						 </h5>
					</div>
				</div>
    		</div>

    		<div class="col-md-4">
    			<div class="card border-dark shadow">
					<div class="card-header bg-secondary text-center text-light">
						<h6>FUNCIONÁRIOS INATIVOS</h6>
					</div>
					<div class="card-body">
						 <h5 class="card-title" id="totalVendas">
						 	<?php
			              if (isset($_SESSION['empresaNome'])){
			                include('banco/conexao.php');

			                $script = "SELECT count(idUsuario) as quantUsarios FROM Tb_Usuario WHERE ATIVO = 0";

			                $sql = mysqli_query($conn, $script);
			        
			                
			                if(mysqli_num_rows($sql) > 0)
			                {

			                  while($linha = mysqli_fetch_assoc($sql))
			                  {
			                    $_SESSION['id'] = $linha['quantUsarios'];
			              ?>
			                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantUsarios']; ?></p>
			            <?php }
			                } 
			              }else{
			                ?>
			                <p class="card-text h3 text-right">R$</p>
			             <?php }?>
						 </h5>
					</div>
				</div>
    		</div>
		</div>

		<div class="row mb-3">
    		<div class="col-md-4">
    			<div class="card border-dark shadow">
					<div class="card-header bg-secondary text-center text-light">
						<h6>FUNCIONÁRIOS MASCULINOS</h6>
					</div>
					<div class="card-body">
						 <h5 class="card-title" id="numeroVendas">
						 <?php
			              if (isset($_SESSION['empresaNome'])){
			                include('banco/conexao.php');

			                $script = "SELECT count(idUsuario) as usariosMasc FROM Tb_Usuario WHERE sexo = 'm'";

			                $sql = mysqli_query($conn, $script);
			        
			                
			                if(mysqli_num_rows($sql) > 0)
			                {

			                  while($linha = mysqli_fetch_assoc($sql))
			                  {
			                    $_SESSION['id'] = $linha['usariosMasc'];
			              ?>
			                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['usariosMasc']; ?></p>
			            <?php }
			                } 
			              }else{
			                ?>
			                <p class="card-text h3 text-right">?</p>
			             <?php }?>
						 </h5>
					</div>
				</div>
			</div>

			<div class="col-md-4">
    			<div class="card border-dark shadow">
					<div class="card-header bg-secondary text-center text-light">
						<h6>FUNCIONÁRIOS FEMININOS</h6>
					</div>
					<div class="card-body">
						 <h5 class="card-title" id="totalVendas">
						 <?php
			              if (isset($_SESSION['empresaNome'])){
			                include('banco/conexao.php');

			                $script = "SELECT count(idUsuario) as usariosFem FROM Tb_Usuario WHERE sexo = 'f'";

			                $sql = mysqli_query($conn, $script);
			        
			                
			                if(mysqli_num_rows($sql) > 0)
			                {

			                  while($linha = mysqli_fetch_assoc($sql))
			                  {
			                    $_SESSION['id'] = $linha['usariosFem'];
			              ?>
			                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['usariosFem']; ?></p>
			            <?php }
			                } 
			              }else{
			                ?>
			                <p class="card-text h3 text-right">?</p>
			             <?php }?>
						 </h5>
					</div>
				</div>
    		</div>
		</div>
		<hr>
		<section class="mt-4">
			<div class="container mt-3">
				<div class="row mb-3">
					<div class="col-md-6">
						<div class="card">
	          				<div class="card-header text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;">
	          					<h6 style="color: <?php if (!isset($_SESSION['corMenuTxt'])) { echo "#000";}else{ echo $_SESSION['corMenuTxt']; }?>;">FUNCIONÁRIO ATIVOS</h6>
	          				</div>
		          			<div class="card-body">
		            			<table class="shadow text-center hover display compact stripe nowrap" id="funcAtivo">
		              				<thead>
		                				<tr>
		                  				  <th>MATRÍCULA</th>
						                  <th>NOME</th>
						                  <th>CARGO</th>
		                				</tr>
		              				</thead>

		              				<tbody>
		              			<?php
		              				if (isset($_SESSION['empresaNome']))
		              				{
		                				include('banco/conexao.php');

									$script = "SELECT Tb_Usuario.idUsuario, Tb_Usuario.nomeUsuario, Tb_Perfil.nomePerfil 
										FROM Tb_Usuario
										INNER JOIN Tb_Perfil ON Tb_Usuario.idPerfil = Tb_Perfil.idPerfil
										WHERE ATIVO = 1";
		                			$sql = mysqli_query($conn, $script);
		        
		                
		                			if(mysqli_num_rows($sql) > 0)
		                			{

		                  			while($linha = mysqli_fetch_assoc($sql))
		                  			{
		                  				$nome = $linha['nomeUsuario'];
							            //conta numero de caracteres da string
							            $tam = strlen($nome);
		              			?>
				                   <tr>
				                    <td><?php echo $linha['idUsuario']; ?></td>
				                    <td><?php 
						              //se string tiver mais que 25 caracteres
						              //Exibe apenas 25 caracteres
						                 if($tam > 30){ $rest = substr($nome, 0, 30); 
						                    echo $rest . " ...";
						                  }else{
						                    echo $nome;
						                  } ?>
						                    
						            </td>
				                    <td><?php echo $linha['nomePerfil']; ?></td>
				                  </tr>
					            <?php }
					                } 
					              }?>
		              				</tbody>
		            			</table>
		          			</div>
	        			</div>
					</div>
					<div class="col-md-6">
						<div class="card">
	          				<div class="card-header text-light text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;">
	          					<h6 style="color: <?php if (!isset($_SESSION['corMenuTxt'])) { echo "#000";}else{ echo $_SESSION['corMenuTxt']; }?>;">FUNCIONÁRIOS INATIVOS</h6>
	          				</div>
		          			<div class="card-body">
		            			<table class="shadow text-center hover display compact stripe nowrap" id="funcInitaivo">
		              				<thead>
		                				<tr>
		                  				  <th>MATRÍCULA</th>
						                  <th>NOME</th>
						                  <th>CARGO</th>
						                  <th>OPÇÃO</th>
		                				</tr>
		              				</thead>

		              				<tbody>
		              			<?php
		              				if (isset($_SESSION['empresaNome']))
		              				{
		                				include('banco/conexao.php');

									$script = "SELECT Tb_Usuario.idUsuario, Tb_Usuario.nomeUsuario, Tb_Perfil.nomePerfil 
										FROM Tb_Usuario
										INNER JOIN Tb_Perfil ON Tb_Usuario.idPerfil = Tb_Perfil.idPerfil
										WHERE ATIVO = 0";
		                			$sql = mysqli_query($conn, $script);
		        
		                
		                			if(mysqli_num_rows($sql) > 0)
		                			{

		                  			while($linha = mysqli_fetch_assoc($sql))
		                  			{
		                  				$nome = $linha['nomeUsuario'];
							            //conta numero de caracteres da string
							            $tam = strlen($nome);
		              			?>
				                   <tr>
				                    <td><?php echo $linha['idUsuario']; ?></td>
				                    <td><?php 
						              //se string tiver mais que 25 caracteres
						              //Exibe apenas 25 caracteres
						                 if($tam > 30){ $rest = substr($nome, 0, 30); 
						                    echo $rest . " ...";
						                  }else{
						                    echo $nome;
						                  } ?>
						                    
						            </td>
				                    <td><?php echo $linha['nomePerfil']; ?></td>
				                    <td>
				                    	<button class="btn btn-sm mt-n1" data-toggle="modal" data-target="#modalFuncAtivo" value="<?php echo $linha['idUsuario']; ?>">
							                <span class="fas fa-edit text-primary"></span>
							            </button>
							        </td>
				                  </tr>
					            <?php }
					                } 
					              }?>
		              				</tbody>
		            			</table>
		          			</div>
	        			</div>
					</div>			
				</div>
			</div>
		</section>
		<hr>
		<section class="mt-4">
			<div class="container mt-3">
				<div class="row mb-3">
					<div class="col-md-6">
						<div class="card">
	          				<div class="card-header text-light text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;">
	          					<h6 style="color: <?php if (!isset($_SESSION['corMenuTxt'])) { echo "#000";}else{ echo $_SESSION['corMenuTxt']; }?>;">FUNCIONÁRIO MASCULINOS</h6>
	          				</div>
		          			<div class="card-body">
		            			<table class="shadow text-center hover display compact stripe nowrap" id="funcMasc">
		              				<thead>
		                				<tr>
		                  				  <th>MATRÍCULA</th>
						                  <th>NOME</th>
						                  <th>CARGO</th>
		                				</tr>
		              				</thead>

		              				<tbody>
		              			<?php
		              				if (isset($_SESSION['empresaNome']))
		              				{
		                				include('banco/conexao.php');

									$script = "SELECT Tb_Usuario.idUsuario, Tb_Usuario.nomeUsuario, Tb_Usuario.ativo, Tb_Perfil.nomePerfil 
										FROM Tb_Usuario
										INNER JOIN Tb_Perfil ON Tb_Usuario.idPerfil = Tb_Perfil.idPerfil
										WHERE sexo = 'm'";
		                			$sql = mysqli_query($conn, $script);
		        
		                
		                			if(mysqli_num_rows($sql) > 0)
		                			{

		                  			while($linha = mysqli_fetch_assoc($sql))
		                  			{
		                  				
		                  				$nome = $linha['nomeUsuario'];
							            //conta numero de caracteres da string
							            $tam = strlen($nome);

		              			?>
				                   <tr>
				                    <td><?php echo $linha['idUsuario']; ?></td>
				                    <td><?php 
						              //se string tiver mais que 25 caracteres
						              //Exibe apenas 25 caracteres
						                 if($tam > 30){ $rest = substr($nome, 0, 30); 
						                    echo $rest . " ...";
						                  }else{
						                    echo $nome;
						                  } ?>
						                    
						            </td>
				                    <td><?php echo $linha['nomePerfil']; ?></td>
				                  </tr>
					            <?php }
					                } 
					              }?>
		              				</tbody>
		            			</table>
		          			</div>
	        			</div>
					</div>
					<div class="col-md-6">
						<div class="card">
	          				<div class="card-header text-light text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;">
	          					<h6 style="color: <?php if (!isset($_SESSION['corMenuTxt'])) { echo "#000";}else{ echo $_SESSION['corMenuTxt']; }?>;">FUNCIONÁRIOS FEMININOS</h6>
	          				</div>
		          			<div class="card-body">
		            			<table class="shadow text-center hover display compact stripe nowrap" id="funcFem">
		              				<thead>
		                				<tr>
		                  				  <th>MATRÍCULA</th>
						                  <th>NOME</th>
						                  <th>CARGO</th>
		                				</tr>
		              				</thead>

		              				<tbody>
		              			<?php
		              				if (isset($_SESSION['empresaNome']))
		              				{
		                				include('banco/conexao.php');

									$script = "SELECT Tb_Usuario.idUsuario, Tb_Usuario.nomeUsuario, Tb_Usuario.ativo, Tb_Perfil.nomePerfil 
										FROM Tb_Usuario
										INNER JOIN Tb_Perfil ON Tb_Usuario.idPerfil = Tb_Perfil.idPerfil
										WHERE sexo = 'f' AND ativo = 1";
		                			$sql = mysqli_query($conn, $script);
		        
		                
		                			if(mysqli_num_rows($sql) > 0)
		                			{

		                  			while($linha = mysqli_fetch_assoc($sql))
		                  			{
		                  				$nome = $linha['nomeUsuario'];
							            //conta numero de caracteres da string
							            $tam = strlen($nome);
		              			?>
				                   <tr>
				                    <td><?php echo $linha['idUsuario']; ?></td>
				                    <td><?php 
						              //se string tiver mais que 25 caracteres
						              //Exibe apenas 25 caracteres
						                 if($tam > 30){ $rest = substr($nome, 0, 30); 
						                    echo $rest . " ...";
						                  }else{
						                    echo $nome;
						                  } ?>
						                    
						            </td>
				                    <td><?php echo $linha['nomePerfil']; ?></td>
				                  </tr>
					            <?php }
					                } 
					              }?>
		              				</tbody>
		            			</table>
		          			</div>
	        			</div>
					</div>			
				</div>
			</div>
		</section>
	</div>
</div>

<?php include('modal/modalFuncionarios.php');?>
<script type="text/javascript">

      $(document).ready(function(){

      $('#funcAtivo').DataTable({
      	  colReorder: true,
          "searching": true,
          "scrollCollapse": true,
          "paging": false,
          "ordering": true,
         dom: 'rtBp',
         "language": {
         	"search": "Pesquise por:",
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
            buttons: [ 'excel' ,'print']
      });
      $('#funcInitaivo').DataTable({
          colReorder: true,
          "searching": true,
          "scrollCollapse": true,
          "paging": false,
          "ordering": true,
         dom: 'rtBp',
         "language": {
         	"search": "Pesquise por:",
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
            buttons: [ 'excel' ,'print']
      });
      $('#funcMasc').DataTable({
      	colReorder: true,
          "searching": true,
          "scrollCollapse": true,
          "paging": false,
          "ordering": true,
         dom: 'rtBp',
         "language": {
         	"search": "Pesquise por:",
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
            buttons: [ 'excel' ,'print']
      });
      $('#funcFem').DataTable({
      	colReorder: true,
          "searching": true,
          "scrollCollapse": true,
          "paging": false,
          "ordering": true,
         dom: 'rtBp',
         "language": {
         	"search": "Pesquise por:",
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
            buttons: [ 'excel' ,'print']
      });
  });

</script>
<?php }?>