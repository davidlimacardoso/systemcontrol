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
	   <span class="mt-n4 mb-2 lead"><i class="fas fa-box mr-2"></i><?php echo "RELATÓRIO PRODUTOS"; ?></span>
	   <span class="mt-n4 mb-1 lead">
	    <?php date_default_timezone_set("America/Sao_Paulo");
	    $data = date('Y-m-d H:i'); 
	    if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
	   </span>
	</div>		   

<hr>
	<div class="container">
		<div class="row mb-3">
	    		<div class="col-md-4">
	    			<div class="card border-dark shadow">
						<div class="card-header bg-secondary text-center text-light">
							<h6>PRODUTOS CADASTRADOS</h6>
						</div>
						<div class="card-body">
							 <h5 class="card-title" id="numeroVendas">
							 <?php
				              if (isset($_SESSION['empresaNome'])){
				                include('banco/conexao.php');
 
				                $script = "SELECT count(idProduto) AS quantProduto FROM Tb_Produto";

				                $sql = mysqli_query($conn, $script);
				        
				                
				                if(mysqli_num_rows($sql) > 0)
				                {

				                  while($linha = mysqli_fetch_assoc($sql))
				                  {
				                    $_SESSION['id'] = $linha['quantProduto'];
				              ?>
				                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantProduto']; ?></p>
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
							<h6>PRODUTOS ATIVOS</h6>
						</div>
						<div class="card-body">
							 <h5 class="card-title" id="totalVendas">
							 <?php
				              if (isset($_SESSION['empresaNome'])){
				                include('banco/conexao.php');

				                $script = "SELECT count(idProduto) AS quantProduto FROM Tb_Produto WHERE ATIVO = 1";

				                $sql = mysqli_query($conn, $script);
				        
				                
				                if(mysqli_num_rows($sql) > 0)
				                {

				                  while($linha = mysqli_fetch_assoc($sql))
				                  {
				                    $_SESSION['id'] = $linha['quantProduto'];
				              ?>
				                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantProduto']; ?></p>
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
							<h6>PRODUTOS INATIVOS</h6>
						</div>
						<div class="card-body">
							 <h5 class="card-title" id="totalVendas">
							 	<?php
				              if (isset($_SESSION['empresaNome'])){
				                include('banco/conexao.php');

				                $script = "SELECT count(idProduto) AS quantProduto FROM Tb_Produto WHERE ATIVO = 0";

				                $sql = mysqli_query($conn, $script);
				        
				                
				                if(mysqli_num_rows($sql) > 0)
				                {

				                  while($linha = mysqli_fetch_assoc($sql))
				                  {
				                    $_SESSION['id'] = $linha['quantProduto'];
				              ?>
				                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantProduto']; ?></p>
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
							<h6>FORNECEDORES CADASTRADOS</h6>
						</div>
						<div class="card-body">
							 <h5 class="card-title" id="numeroVendas">
							 <?php
				              if (isset($_SESSION['empresaNome'])){
				                include('banco/conexao.php');
 
				                $script = "SELECT count(idFornecedor) AS quantFornecedor FROM Tb_Fornecedor";

				                $sql = mysqli_query($conn, $script);
				        
				                
				                if(mysqli_num_rows($sql) > 0)
				                {

				                  while($linha = mysqli_fetch_assoc($sql))
				                  {
				                    $_SESSION['id'] = $linha['quantFornecedor'];
				              ?>
				                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantFornecedor']; ?></p>
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
							<h6>CATEGORIAS CADASTRADAS</h6>
						</div>
						<div class="card-body">
							 <h5 class="card-title" id="totalVendas">
							 <?php
				              if (isset($_SESSION['empresaNome'])){
				                include('banco/conexao.php');

				                $script = "SELECT count(idTipoProduto) as quantCategoria FROM Tb_Produto";

				                $sql = mysqli_query($conn, $script);
				        
				                
				                if(mysqli_num_rows($sql) > 0)
				                {

				                  while($linha = mysqli_fetch_assoc($sql))
				                  {
				                    $_SESSION['id'] = $linha['quantCategoria'];
				              ?>
				                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantCategoria']; ?></p>
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
							<h6>TOTAL DE PRODUTOS EM ESTOQUE</h6>
						</div>
						<div class="card-body">
							 <h5 class="card-title" id="totalVendas">
							 	<?php
				              if (isset($_SESSION['empresaNome'])){
				                include('banco/conexao.php');

				                $script = "SELECT SUM(Tb_Produto.quantidadeTotal) AS quantEstoque FROM Tb_Produto";

				                $sql = mysqli_query($conn, $script);
				        
				                
				                if(mysqli_num_rows($sql) > 0)
				                {

				                  while($linha = mysqli_fetch_assoc($sql))
				                  {
				                    $_SESSION['id'] = $linha['quantEstoque'];
				              ?>
				                   <p class="card-text h3 text-center" style="color: <?php  echo "#000";?>;"><?php echo $linha['quantEstoque']; ?></p>
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
		</div>
			<hr>
<section class="mt-4">
	<a name="venda_baixa"></a>
		<div class="container mt-3">
			<div class="row mb-3">
				<div class="col-md-12">
					<div class="card border-dark">
          				<div class="card-header text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;">
          					<h6>PRODUTOS COM VENDAS BAIXAS</h6>
          				</div>
	          			<div class="card-body">
	            			<table class="shadow text-center hover display compact stripe nowrap" id="minhaTabela">
	              				<thead>
	                				<tr>
	                  				  <th>CÓDIGO</th>
					                  <th>PRODUTO</th>
					                  <th>CATEGORIA</th>
					                  <th>ULT. QUANT. VENDIDA</th>
					                  <th>FORNECEDOR</th>
					                  <th>ULT.VENDA</th>
	                				</tr>
	              				</thead>

	              				<tbody>
	              			<?php
	              				if (isset($_SESSION['empresaNome']))
	              				{
	                				include('banco/conexao.php');

								$script = "SELECT Tb_Venda.idProduto, Tb_Venda.quantidadeVenda, Tb_Produto.nomeProduto, Tb_Venda.dataVenda, Tb_TipoProduto.nomeTipoProduto AS categoria, Tb_Fornecedor.nomeFornecedor AS fornecedor
									FROM Tb_Venda
									LEFT JOIN Tb_Produto
									ON Tb_Produto.idProduto = Tb_Venda.idProduto
									INNER JOIN  Tb_TipoProduto 
									ON Tb_TipoProduto.idTipoProduto =  Tb_Produto.idProduto
									INNER JOIN  Tb_Fornecedor 
									ON Tb_Fornecedor.idFornecedor =  Tb_Produto.idProduto
									WHERE now() >=  ADDDATE(dataVenda, INTERVAL dataMinimo DAY)
									GROUP BY Tb_Produto.idProduto
									ORDER BY Tb_Venda.dataVenda ASC";
	                			$sql = mysqli_query($conn, $script);
	        
	                
	                			if(mysqli_num_rows($sql) > 0)
	                			{

	                  			while($linha = mysqli_fetch_assoc($sql))
	                  			{
	                    			$_SESSION['idProduto'] = $linha['idProduto'];
				                    $_SESSION['quantidadeVenda'] = $linha['quantidadeVenda'];
				                    $_SESSION['nomeProduto'] =  $linha['nomeProduto'];
				                    $_SESSION['dataVenda'] =  $linha['dataVenda'];
				                    $_SESSION['nomeProduto'] =  $linha['categoria'];
				                    $_SESSION['dataVenda'] =  $linha['fornecedor'];

	              			?>
			                   <tr>
			                    <td><?php echo $linha['idProduto']; ?></td>
			                    <td><?php echo $linha['nomeProduto']; ?></td>
			                    <td><?php echo $linha['categoria']; ?></td>
			                    <td><?php echo $linha['quantidadeVenda']; ?></td>
			                    <td><?php echo $linha['fornecedor']; ?></td>
			                    <td><?php echo date('d/m/Y', strtotime($linha['dataVenda'])); ?></td>
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
	<a name="mais_vendidos"></a>
		<div class="container mt-3">
			<div class="row mb-3">
			<!--	<div class="col-6">
		          <div id="columnchart_values" style="width: 515px; height: 300px;"></div>
		        </div>-->
		        <div class="col-md-12">
					<div class="card border-dark">
          				<div class="card-header text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;">
          					<h6>PRODUTOS MAIS VENDIDOS</h6>
          				</div>
	          			<div class="card-body">
	            			<table class="shadow text-center hover display compact stripe nowrap" id="minhaTabela2">
	              				<thead>
	                				<tr>
	                  					<th>CÓDIGO</th>
	                  					<th>PRODUTO</th>
	                  					<th>CATEGORIA</th>
	                  					<th>PREÇO VENDA</th>
	                  					<th>QUANT.</th>
	                  					<th>UNIDADE</th>
	                				</tr>
	              				</thead>

	              				<tbody>
	              			<?php
	              				if (isset($_SESSION['empresaNome']))
	              				{
	                				include('banco/conexao.php');

								$script = "SELECT Tb_Venda.precoVendido,Tb_Venda.idProduto, SUM(Tb_Venda.quantidadeVenda) AS vendaTotal, Tb_Produto.nomeProduto, Tb_Unidade.unidadeAbreviada, Tb_TipoProduto.nomeTipoProduto AS categoria FROM Tb_Venda 
									INNER JOIN Tb_Produto 
									ON Tb_Produto.idProduto = Tb_Venda.idProduto 
									INNER JOIN  Tb_TipoProduto 
									ON Tb_TipoProduto.idTipoProduto =  Tb_Produto.idProduto
									INNER JOIN Tb_Unidade ON Tb_Produto.idUnidadeAbreviada = Tb_Unidade.idUnidade
									GROUP BY Tb_Venda.idProduto 
									ORDER BY vendaTotal DESC";
	                			$sql = mysqli_query($conn, $script);
	        
	                
	                			if(mysqli_num_rows($sql) > 0)
	                			{

	                  			while($linha = mysqli_fetch_assoc($sql))
	                  			{   	
	              			?>
			                   <tr>
			                    <td class="text-center"><?php echo $linha['idProduto']; ?></td>
			                    <td class="text-center"><?php echo $linha['nomeProduto']; ?></td>
			                    <td class="text-center"><?php echo $linha['categoria']; ?></td>
			                    <td class="text-center">R$ <?php echo $linha['precoVendido']; ?></td>
			                    <td class="text-center"><?php echo $linha['vendaTotal']; ?></td>
			                    <td class="text-center"><?php echo $linha['unidadeAbreviada']; ?></td>
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
	<a name="estoque_baixo"></a>
		<div class="container mt-3">
			<div class="row mb-3">
				<div class="col-md-12">
					<div class="card border-dark">
          				<div class="card-header text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;">
          					<h6>PRODUTOS COM ESTOQUE BAIXO</h6>
          				</div>
	          			<div class="card-body">
	            			<table class="shadow text-center hover display compact stripe nowrap" id="minhaTabela3">
	              				<thead>
	                				<tr>
	                  				  <th>CÓDIGO</th>
					                  <th>PRODUTO</th>
					                  <th>CATEGORIA</th>
					                  <th>QUANT.</th>
					                  <th>ESTOQUE MÍNINO</th>
					                  <th>UNIDADE</th>
					               <!--   <th>FORNECEDOR</th>-->
	                				</tr>
	              				</thead>

	              				<tbody>
	              			<?php
	              				if (isset($_SESSION['empresaNome']))
	              				{
	                				include('banco/conexao.php');

								$script = "SELECT Tb_Produto.idProduto, Tb_Produto.nomeProduto, Tb_Produto.quantidadeTotal, Tb_Produto.estoqueMinimo,
								Tb_TipoProduto.nomeTipoProduto AS categoria, Tb_Unidade.unidadeAbreviada, Tb_Fornecedor.nomeFornecedor AS fornecedor  FROM Tb_Produto
								INNER JOIN  Tb_TipoProduto ON Tb_TipoProduto.idTipoProduto =  Tb_Produto.idProduto
								INNER JOIN Tb_Unidade ON Tb_Produto.idUnidadeAbreviada = Tb_Unidade.idUnidade
								INNER JOIN  Tb_Fornecedor ON Tb_Fornecedor.idFornecedor =  Tb_Produto.idProduto
								WHERE Tb_Produto.quantidadeTotal < estoqueMinimo
								GROUP BY idProduto 
								ORDER BY quantidadeTotal DESC";
                  
	                			$sql = mysqli_query($conn, $script);
	        
				                if(mysqli_num_rows($sql) > 0)
			                {

			                  while($linha = mysqli_fetch_assoc($sql))
			                  {
			              ?>
			                   <tr>
			                    <td><?php echo $linha['idProduto']; ?></td>
			                    <td><?php echo $linha['nomeProduto']; ?></td>
			                    <td><?php echo $linha['categoria']; ?></td>
			                    <td><?php echo $linha['quantidadeTotal']; ?></td>
			                    <td><?php echo $linha['estoqueMinimo']; ?></td>
			                    <td><?php echo $linha['unidadeAbreviada']; ?></td>
			                  <!--  <td><?php echo $linha['fornecedor']; ?></td>-->
			                  </tr>
				            <?php }
				                } 
				              }?>
	              				</tbody>
	            			</table>
	          			</div>
        			</div>
				</div>
			<!--	<div class="col-6">
					<div id="barchart_values" style="width: 900px; height: 300px;"></div>
					<div id="piechart" style="width: 515px; height: 300px;"></div>
				</div>	-->			
			</div>
		</div>
</section>
</div>
</div>

<script type="text/javascript" src="js/processaDataRelatorio.js"></script>

<script type="text/javascript">

      $(document).ready(function(){

      $('#minhaTabela').DataTable({
      	  colReorder: true,
          "searching": true,
          "scrollCollapse": true,
          "paging": false,
          "ordering": true,
         dom: 'frtBp',
         "language": {
         	"search": "Pesquise por:",
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
            buttons: [ 'excel' ,'print']
      });
      $('#minhaTabela2').DataTable({
          colReorder: true,
          "searching": true,
          "scrollCollapse": true,
          "paging": false,
          "ordering": true,
         dom: 'frtBp',
         "language": {
         	"search": "Pesquise por:",
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
            buttons: [ 'excel' ,'print'],
             "order": [[ 4, "desc" ]]
      });
      $('#minhaTabela3').DataTable({
      	colReorder: true,
          "searching": true,
          "scrollCollapse": true,
          "paging": false,
          "ordering": true,
         dom: 'frtBp',
         "language": {
         	"search": "Pesquise por:",
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
            buttons: [ 'excel' ,'print']
      });

      $('#minhaTabela_filter').addClass('form-inline');
      $('#minhaTabela_filter').addClass('mb-3');
      $('#minhaTabela2_filter').addClass('form-inline');
      $('#minhaTabela2_filter').addClass('mb-3');
      $('#minhaTabela3_filter').addClass('form-inline');
      $('#minhaTabela3_filter').addClass('mb-3');
  });

</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php 

          	include('banco/conexao.php');
          	$script = "SELECT Tb_Venda.idProduto, Tb_Venda.quantidadeVenda, Tb_Venda.dataVenda, Tb_Produto.nomeProduto, Tb_Venda.dataVenda  FROM Tb_Venda
                      LEFT JOIN Tb_Produto
                      ON Tb_Produto.idProduto = Tb_Venda.idProduto
                      WHERE now() >=  DATE_ADD(Tb_Venda.dataVenda, INTERVAL 10 DAY)
                      ORDER BY Tb_Venda.dataVenda ASC";
	              $sql = mysqli_query($conn, $script);
	        
	                
    			if(mysqli_num_rows($sql) > 0)
    			{

	      			while($linha = mysqli_fetch_assoc($sql))
	      			{
	        			$categoria =  $linha['nomeProduto'];
	        			$total =  $linha['dataVenda'];
	        		?>
	        		['<?php echo $categoria; ?>', <?php echo date('d/m/Y', strtotime($total)); ?>, "style='color: <?php if (!isset($_SESSION['corMenuTxt'])) { echo "#000";}else{ echo $_SESSION['corMenuTxt']; }?>;'"],
	        		<?php
	        		}
	        	}
          ?>
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
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
<!--
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Categoria', 'Total'],
          <?php 

          	include('banco/conexao.php');
          	$script = "SELECT SUM(Tb_Venda.quantidadeVenda * Tb_Venda.precoVendido) AS total, Tb_TipoProduto.nomeTipoProduto AS categoria
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
	        		?>
	        		['<?php echo $categoria; ?>', <?php echo $total; ?>],
	        		<?php
	        		}
	        	}
          ?>
        ]);

        var options = {
          title: 'PRODUTOS VENDIDOS POR CATEGORIA'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php 

          	include('banco/conexao.php');
          	$script = "SELECT Tb_Venda.idProduto, SUM(Tb_Venda.quantidadeVenda) AS vendaTotal, Tb_Produto.nomeProduto  FROM Tb_Venda INNER JOIN Tb_Produto ON Tb_Produto.idProduto = Tb_Venda.idProduto GROUP BY Tb_Venda.idProduto ORDER BY vendaTotal DESC";
	              $sql = mysqli_query($conn, $script);
	        
	                
    			if(mysqli_num_rows($sql) > 0)
    			{

	      			while($linha = mysqli_fetch_assoc($sql))
	      			{
	        			$nomeProduto =  $linha['nomeProduto'];
	        			$total =  $linha['vendaTotal'];
	        		?>
	        		['<?php echo $nomeProduto; ?>', <?php echo $total; ?>, "style='color: <?php if (!isset($_SESSION['corMenuTxt'])) { echo "#000";}else{ echo $_SESSION['corMenuTxt']; }?>;'"],
	        		<?php
	        		}
	        	}
          ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "PRODUTOS MAIS VENDIDOS",
        width: 515,
        height: 300,
        bar: {groupWidth: "60%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
  <?php }?>