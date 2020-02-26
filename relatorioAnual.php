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
	   <span class="mt-n4 mb-2 lead"><i class="fas fa-calendar-check mr-2"></i></i><?php echo "RELATÓRIO ANUAL"; ?></span>
	   <span class="mt-n4 mb-1 lead">
	    <?php date_default_timezone_set("America/Sao_Paulo");
	    $data = date('Y-m-d H:i'); 
	    if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
	   </span>
	</div>

	 
		<div class="container mt-4 border">

		   	<div class="row">
		   		<div class="col">
					<form class="form-inline mt-4">
  						<div class="form-group">
							<label class="form-label mr-2">RELATÓRIO POR:</label>
							<select class="form-control" id="data" class="opcao" onchange="alteraDiv()">
								<option value="1">DIA</option>
								<option value="2">MÊS</option>
								<option value="3" selected>ANO</option>
							</select>
					<!--	<form>
							<div class="form-group" id="ano">
								<?php date_default_timezone_set('America/Sao_Paulo'); 

								?>
							
								 <?PHP 
								 date_default_timezone_set('America/Sao_Paulo');
						          include('banco/conexao.php');
						          $script = "SELECT MONTHNAME(dataVenda) AS mes, YEAR(dataVenda) AS ano FROM Tb_Venda GROUP BY monthname(dataVenda) ORDER BY dataVenda DESC";
						          $sql = mysqli_query($conn, $script);
						         ?>
						         <label class="form-label ml-4">ano inicio</label>
						         <select class="form-control ml-2" id="anoInicio" class="opcao" onchange="alteraDiv()">
									<option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
									<?php while($linha = mysqli_fetch_assoc($sql)) {?>
				                    <option value="<?php echo $linha['ano'].'-01'.'-01';?>"><?php echo date( $linha['ano']);?></option>
				                  <?php }?>
								 </select>

							
								 <?PHP 
								 date_default_timezone_set('America/Sao_Paulo');
						          include('banco/conexao.php');
						          $script = "SELECT MONTHNAME(dataVenda) AS mes, YEAR(dataVenda) AS ano FROM Tb_Venda GROUP BY monthname(dataVenda) ORDER BY dataVenda DESC";
						          $sql = mysqli_query($conn, $script);
						         ?>
						         <label class="form-label ml-4">ano fim</label>
						         <select class="form-control ml-2" id="anoFim" class="opcao" onchange="alteraDiv()">
									<option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
									<?php while($linha = mysqli_fetch_assoc($sql)) {
				                    $dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $linha['mes'], $linha['ano']);?>
				                    <option value="<?php echo $linha['ano'].'-12'.'-31';?>"><?php echo date( $linha['ano']);?></option>
				                  <?php }?>
								 </select>
							</div>
						</form>-->
						</div>
					</form>
		    	</div>
			</div>

		<hr>	 
		<div id="conteudoAnual">
			<div  class="container">
				<div class="row mb-3">
		    		<div class="col-md-4">
		    			<div class="card border-dark shadow">
							<div class="card-header bg-secondary text-center text-light">
								<h6>VENDAS EM DINHEIRO</h6>
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="numeroVendas">
								 <?php
					              if (isset($_SESSION['empresaNome'])){
					                include('banco/conexao.php');
	 
					                $script = "SELECT sum(quantidadeVenda * precoVendido) AS valorVendas, count(idVenda) AS quantVenda FROM Tb_Venda 
									WHERE Year(dataVenda) = Year(now()) && tipoVenda = 'd'";

					                $sql = mysqli_query($conn, $script);
					        
					                
					                if(mysqli_num_rows($sql) > 0)
					                {

					                  while($linha = mysqli_fetch_assoc($sql))
					                  {
					              ?>
					                   <div class="row">
						              		<div class="col-4 border-right">
						              			<span style="font-size: 15px;">nº vendas</span>
						                   		<p class="card-text h3 text-center mt-1" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantVenda']; ?></p>
							                </div>
							                <div class="col-8">
							                	<span style="font-size: 15px;">valor total das vendas</span>
						                   		<p class="card-text h3 text-left mt-1" style="color: <?php  echo "#000";?>;">R$ <?php echo number_format($linha['valorVendas'],2,",","."); ?></p>
							                </div>
							            </div>
					            <?php }
					                } 
					              }else{
					                ?>
					                <p class="card-text h3 text-dark text-right">?</p>
					             <?php }?>
								 </h5>
							</div>
						</div>
					</div>

					<div class="col-md-4">
		    			<div class="card border-dark shadow">
							<div class="card-header bg-secondary text-center text-light">
								<h6>VENDAS EM CARTÃO DE DÉBITO</h6>
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="totalVendas">
								 <?php
					              if (isset($_SESSION['empresaNome'])){
					                include('banco/conexao.php');

					                $script = "SELECT sum(quantidadeVenda * precoVendido) AS valorVendas, count(idVenda) AS quantVenda FROM Tb_Venda 
									WHERE Year(dataVenda) = Year(now()) && tipoVenda = 'cd'";

					                $sql = mysqli_query($conn, $script);
					        
					                
					                if(mysqli_num_rows($sql) > 0)
					                {

					                  while($linha = mysqli_fetch_assoc($sql))
					                  {
					              ?>
					                   <div class="row">
					              			<div class="col-4 border-right">
					              				<span style="font-size: 15px;">nº vendas</span>
						                   		<p class="card-text h3 text-center mt-1" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantVenda']; ?></p>
							                </div>
							                <div class="col-8">
							                	<span style="font-size: 15px;">valor total das vendas</span>
						                   		<p class="card-text h3 text-left mt-1" style="color: <?php  echo "#000";?>;">R$ <?php echo number_format($linha['valorVendas'],2,",","."); ?></p>
							                </div>
							            </div>
					            <?php }
					                } 
					              }else{
					                ?>
					                <p class="card-text h3 text-dark text-right">?</p>
					             <?php }?>
								 </h5>
							</div>
						</div>
		    		</div>

		    		<div class="col-md-4">
		    			<div class="card border-dark shadow">
							<div class="card-header bg-secondary text-center text-light">
								<h6>VENDAS EM CARTÃO DE CRÉDITO</h6>
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="totalVendas">
								 	<?php
					              if (isset($_SESSION['empresaNome'])){
					                include('banco/conexao.php');

					                $script = "SELECT sum(quantidadeVenda * precoVendido) AS valorVendas, count(idVenda) AS quantVenda FROM Tb_Venda 
									WHERE Year(dataVenda) = Year(now()) && tipoVenda = 'cc'";

					                $sql = mysqli_query($conn, $script);
					        
					                
					                if(mysqli_num_rows($sql) > 0)
					                {

					                  while($linha = mysqli_fetch_assoc($sql))
					                  {
					              ?>
					              	<div class="row">
					              		<div class="col-4 border-right">
					              			<span style="font-size: 15px;">nº vendas</span>
					                   <p class="card-text h3 text-center mt-1" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantVenda']; ?></p>
						                </div>
						                <div class="col-8">
						                	<span style="font-size: 15px;">valor total das vendas</span>
					                   <p class="card-text h3 text-left mt-1" style="color: <?php  echo "#000";?>;">R$ <?php echo number_format($linha['valorVendas'],2,",","."); ?></p>
						                </div>
						            </div>
					            <?php }
					                } 
					              }else{
					                ?>
					                <p class="card-text h3 text-dark text-right">R$</p>
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
								<h6>NÚMERO TOTAL DAS VENDAS</h6>
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="numeroVendas">
								 <?php
					              if (isset($_SESSION['empresaNome'])){
					                include('banco/conexao.php');
	 
					                $script = "SELECT count(idVenda) AS quantVenda FROM Tb_Venda WHERE Year(dataVenda) = Year(now())";

					                $sql = mysqli_query($conn, $script);
					        
					                
					                if(mysqli_num_rows($sql) > 0)
					                {

					                  while($linha = mysqli_fetch_assoc($sql))
					                  {
					                    $_SESSION['id'] = $linha['quantVenda'];
					              ?>
					                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantVenda']; ?></p>
					            <?php }
					                } 
					              }else{
					                ?>
					                <p class="card-text h3 text-dark text-right">?</p>
					             <?php }?>
								 </h5>
							</div>
						</div>
					</div>

					<div class="col-md-4">
		    			<div class="card border-dark shadow">
							<div class="card-header bg-secondary text-center text-light">
								<h6>NÚMERO DE PRODUTOS VENDIDOS</h6>
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="totalVendas">
								 <?php
					              if (isset($_SESSION['empresaNome'])){
					                include('banco/conexao.php');

					                $script = "SELECT SUM(Tb_Venda.quantidadeVenda) AS quantProd FROM Tb_Venda WHERE Year(dataVenda) = Year(now())";

					                $sql = mysqli_query($conn, $script);
					        
					                
					                if(mysqli_num_rows($sql) > 0)
					                {

					                  while($linha = mysqli_fetch_assoc($sql))
					                  {
					                    $_SESSION['id'] = $linha['quantProd'];
					              ?>
					                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantProd']; ?></p>
					            <?php }
					                } 
					              }else{
					                ?>
					                <p class="card-text h3 text-dark text-right">?</p>
					             <?php }?>
								 </h5>
							</div>
						</div>
		    		</div>

		    		<div class="col-md-4">
		    			<div class="card border-dark shadow">
							<div class="card-header bg-secondary text-center text-light">
								<h6>VALOR TOTAL DAS VENDAS</h6>
							</div>
							<div class="card-body">
								 <h5 class="card-title" id="totalVendas">
								 	<?php
					              if (isset($_SESSION['empresaNome'])){
					                include('banco/conexao.php');

					                $script = "SELECT SUM(Tb_Venda.quantidadeVenda * Tb_Venda.precoVendido) AS totalVenda FROM Tb_Venda WHERE Year(dataVenda) = Year(now())";

					                $sql = mysqli_query($conn, $script);
					        
					                
					                if(mysqli_num_rows($sql) > 0)
					                {

					                  while($linha = mysqli_fetch_assoc($sql))
					                  {
					                    $_SESSION['id'] = $linha['totalVenda'];
					              ?>
					                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;">R$ <?php echo $linha['totalVenda']; ?></p>
					            <?php }
					                } 
					              }else{
					                ?>
					                <p class="card-text h3 text-dark text-right">R$</p>
					             <?php }?>
								 </h5>
							</div>
						</div>
		    		</div>
				</div>
			</div>
			<hr>

			<section class="mt-4">
				<div class="container mt-3">
					<div class="row mb-3">
						<div class="col-6">
				          <div id="chart_Venda_Ano" style="width: 515px; height: 300px;"></div>
				        </div>
				        <div class="col-md-6">
							<div class="card border-dark shadow">
		          				<div class="card-header text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;">
		          					<h6>PRODUTOS VENDIDOS DO ANO</h6>
		          				</div>
			          			<div class="card-body">
			            			<table class="shadow responsive text-center hover display compact stripe nowrap" id="AnoVendaAno">
			              				<thead>
			                				<tr>
			                  					<th>CÓDIGO</th>
			                  					<th>PRODUTO</th>
			                  					<th>QUANT.</th>
			                  					<th>TOTAL</th>
			                				</tr>
			              				</thead>

			              				<tbody>
			              			<?php
			              				if (isset($_SESSION['empresaNome']))
			              				{
			                				include('banco/conexao.php');

										$script = "SELECT Tb_Venda.idProduto, SUM(Tb_Venda.quantidadeVenda) AS vendaTotal, Tb_Produto.nomeProduto, Tb_Venda.precoVendido AS valor_unit, SUM(Tb_Venda.quantidadeVenda * Tb_Venda.precoVendido) AS total 
										FROM Tb_Venda 
										INNER JOIN Tb_Produto ON Tb_Produto.idProduto = Tb_Venda.idProduto 
										WHERE Year(dataVenda) = Year(now()) 
										GROUP BY Tb_Venda.idProduto ORDER BY Tb_Venda.quantidadeVenda DESC";
			                			$sql = mysqli_query($conn, $script);
			        
			                
			                			if(mysqli_num_rows($sql) > 0)
			                			{

			                  			while($linha = mysqli_fetch_assoc($sql))
			                  			{
			                    			$_SESSION['idProduto'] = $linha['idProduto'];
			                    			$_SESSION['vendaTotal'] = $linha['vendaTotal'];
			                    			$_SESSION['nomeProduto'] =  $linha['nomeProduto'];
			                    			$_SESSION['valor_unit'] = $linha['valor_unit'];
			                    			$_SESSION['total'] =  $linha['total'];

			              			?>
					                   <tr>
					                    <td class="text-center"><?php echo $linha['idProduto']; ?></td>
					                    <td class="text-center"><?php echo $linha['nomeProduto']; ?></td>
					                    <td class="text-center"><?php echo $linha['vendaTotal']; ?></td>
					                    <td class="text-left">R$ <?php echo $linha['total']; ?></td>
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
							<div class="card border-dark shadow">
		          				<div class="card-header text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;">
		          					<h6>PRODUTOS VENDIDOS POR CATEGORIA</h6>
		          				</div>
			          			<div class="card-body">
			            			<table class="shadow responsive text-center hover display compact stripe nowrap" id="AnoVendaCategoria">
			              				<thead>
			                				<tr>
			                  					<th>CÓDIGO</th>
			                  					<th>PRODUTO</th>
			                  					<th>QUANT.</th>
			                  					<th>TOTAL</th>
			                				</tr>
			              				</thead>

			              				<tbody>
			              			<?php
			              				if (isset($_SESSION['empresaNome']))
			              				{
			                				include('banco/conexao.php');

										$script = "SELECT Tb_Venda.idProduto, SUM(Tb_Venda.quantidadeVenda) AS vendaTotal, SUM(Tb_Venda.quantidadeVenda * Tb_Venda.precoVendido) AS total, Tb_TipoProduto.nomeTipoProduto AS categoria
											FROM Tb_Venda 
										    INNER JOIN Tb_Produto ON Tb_Produto.idProduto = Tb_Venda.idProduto 
										    INNER JOIN  Tb_TipoProduto ON Tb_TipoProduto.idTipoProduto =  Tb_Produto.idProduto 
										    WHERE Year(dataVenda) = Year(now())
										    GROUP BY Tb_Venda.idProduto 
										    ORDER BY Tb_Venda.quantidadeVenda DESC";
			                			$sql = mysqli_query($conn, $script);
			        
			                
			                			if(mysqli_num_rows($sql) > 0)
			                			{

			                  			while($linha = mysqli_fetch_assoc($sql))
			                  			{
			                    			$_SESSION['idProduto'] = $linha['idProduto'];
			                    			$_SESSION['vendaTotal'] = $linha['vendaTotal'];
			                    			$_SESSION['categoria'] =  $linha['categoria'];
			                    			$_SESSION['total'] =  $linha['total'];

			              			?>
					                   <tr>
					                    <td class="text-center"><?php echo $linha['idProduto']; ?></td>
					                    <td class="text-center"><?php echo $linha['categoria']; ?></td>
					                    <td class="text-center"><?php echo $linha['vendaTotal']; ?></td>
					                    <td class="text-left">R$ <?php echo $linha['total']; ?></td>
					                  </tr>
						            <?php }
						                } 
						              }?>
			              				</tbody>
			            			</table>
			          			</div>
		        			</div>
						</div>
						<div class="col-6">
								<div id="barchart_Venda_Ano" style="width: 900px; height: 300px;"></div>
						<!--	<div id="piechart" style="width: 515px; height: 300px;"></div>-->
						</div>				
					</div>
				</div>
			</section>
		</div>
</div>

<script type="text/javascript" src="js/processaDataRelatorio.js"></script>

<script type="text/javascript">

      $(document).ready(function(){

      $('#AnoVendaAno').DataTable({
          "searching": false,
          "scrollY": "210px",
          "scrollCollapse": true,
          "paging": false,
          "ordering": false,
         dom: 'rtBp',
         "language": {
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
           buttons: [ 'excel' ,'print']
      });
      $('#AnoVendaCategoria').DataTable({
          "searching": false,
          "scrollY": "210px",
          "scrollCollapse": true,
          "paging": false,
          "ordering": false,
         dom: 'rtBp',
         "language": {
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
           buttons: [ 'excel' ,'print']
      });
  });

</script>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php 
        if (isset($_SESSION['empresaNome']))
        {
          	include('banco/conexao.php');
          	$script = "SELECT SUM(Tb_Venda.quantidadeVenda * Tb_Venda.precoVendido) AS total, Tb_Produto.nomeProduto
				FROM Tb_Venda 
			    INNER JOIN Tb_Produto ON Tb_Produto.idProduto = Tb_Venda.idProduto 
			    INNER JOIN  Tb_TipoProduto ON Tb_TipoProduto.idTipoProduto =  Tb_Produto.idProduto 
			    WHERE Year(dataVenda) = Year(now())
			    GROUP BY Tb_Venda.idProduto";
	              $sql = mysqli_query($conn, $script);
	        
	                
    			if(mysqli_num_rows($sql) > 0)
    			{

	      			while($linha = mysqli_fetch_assoc($sql))
	      			{
	        			$nomeProduto =  $linha['nomeProduto'];
	        			$total =  $linha['total'];
	        		?>
	        		['<?php echo $nomeProduto; ?>', <?php echo $total; ?>, "#CCC"],
	        		<?php
	        		}
	        	}
          }?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "VENDAS DO ANO",
        width: 515,
        height: 300,
        bar: {groupWidth: "60%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("chart_Venda_Ano"));
      chart.draw(view, options);
  }
  </script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php 
        if (isset($_SESSION['empresaNome']))
        {
          	include('banco/conexao.php');
          	$script = "SELECT SUM(Tb_Venda.quantidadeVenda) AS quant, SUM(Tb_Venda.quantidadeVenda * Tb_Venda.precoVendido) AS total, Tb_TipoProduto.nomeTipoProduto AS categoria
				FROM Tb_Venda 
			    INNER JOIN Tb_Produto ON Tb_Produto.idProduto = Tb_Venda.idProduto 
			    INNER JOIN  Tb_TipoProduto ON Tb_TipoProduto.idTipoProduto =  Tb_Produto.idProduto 
			    WHERE Year(dataVenda) = Year(now())
			    GROUP BY Tb_Venda.idProduto";
	              $sql = mysqli_query($conn, $script);
	        
	                
    			if(mysqli_num_rows($sql) > 0)
    			{

	      			while($linha = mysqli_fetch_assoc($sql))
	      			{
	        			$categoria =  $linha['categoria'];
	        			$total =  $linha['total'];
	        			$quant =  $linha['quant'];
	        		?>
	        		['<?php echo $categoria; ?>', <?php echo $quant; ?>, "#CCC"],
	        		<?php
	        		}
	        	}
          }?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "PRODUTOS VENDIDOS POR CATEGORIA",
        width: 515,
        height: 300,
        bar: {groupWidth: "60%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_Venda_Ano"));
      chart.draw(view, options);
  }
  </script>
 <?php }?>