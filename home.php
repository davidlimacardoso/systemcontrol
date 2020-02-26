<div class="wrapper">

  <?php include('validacoes/menu.php'); ?>
<?php
  if(!isset($_SESSION))
  {
    session_start();
  }
  if($_SESSION['idPerfil'] != 1 & $_SESSION['idPerfil'] != 2){ ?>
  <div class="text-center"><img src="imagens/pagina_erro.png"></div>
<?php }else{
?>

    <div class="d-flex justify-content-between">
       <span class="mt-n4 mb-2 lead"><i class="fas fa-home mr-2"></i><?php echo "DASHBOARD"; ?></span>
       <span class="mt-n4 mb-2 lead">
        <?php date_default_timezone_set("America/Sao_Paulo");
        $data = date('Y-m-d H:i'); 
        if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
       </span>
    </div>

    
    <div class="container-fluid mb-2">
      <div class="card-deck">

        <div class="card border-dark bg-light mb-3">
            <div class="card-body">
              <span class="float-left">
                <i class="fas fa-calendar-day fa-4x"></i>
              </span>
              <h5 class="card-title text-right">VENDA DO DIA</h5>
              <?php
              if (isset($_SESSION['empresaNome'])){
                include('banco/conexao.php');
                $script = "SELECT SUM(quantidadeVenda * precoVendido) AS totalcompra FROM Tb_Venda WHERE DATE(dataVenda) = DATE(NOW())";

                $sql = mysqli_query($conn, $script);
      
                if(mysqli_num_rows($sql) > 0)
                {

                  while($linha = mysqli_fetch_assoc($sql))
                  {
                    $_SESSION['id'] = $linha['totalcompra'];

              ?>
                   <p class="card-text h3 text-dark text-right">R$ <?php echo $linha['totalcompra']; ?></p>
            <?php }
                } 
              }else{
                ?>
                <p class="card-text h3 text-dark text-right">R$</p>
             <?php }?>
              
            </div>
        </div>

        <div class="card mb-3 border-dark bg-light">
            <div class="card-body">
              <span class="float-left">
                <i class="fas fa-calendar-alt fa-4x"></i>
              </span>
              <h5 class="card-title text-right">VENDA DO MÊS</h5>
              <?php
                if (isset($_SESSION['empresaNome']))
                {
                    include('banco/conexao.php');

                    $script = "SELECT SUM(quantidadeVenda * precoVendido) as totalcompraMes FROM Tb_Venda WHERE Month(dataVenda) = Month(now())";

                    $sql = mysqli_query($conn, $script);
        
                
                    if(mysqli_num_rows($sql) > 0)
                    {

                      while($linha = mysqli_fetch_assoc($sql))
                      {
                        $_SESSION['id'] = $linha['totalcompraMes'];
              ?>
                        <p class="card-text h3 text-dark text-right">R$ <?php echo $linha['totalcompraMes']; ?></p>
                <?php }
                    } 
                }else
                {
                ?>
                    <p class="card-text h3 text-dark text-right">R$</p>
          <?php }?>
            </div>
        </div>

        <div class="card bg-light border-dark mb-3">
            <div class="card-body">
              <span class="float-left">
                <i class="fas fa-calendar-minus fa-4x"></i>
              </span>
              <h5 class="card-title text-right">VENDA DO ANO</h5>
              <?php
                if (isset($_SESSION['empresaNome']))
                {
                   include('banco/conexao.php');

                    $script = "SELECT SUM(quantidadeVenda * precoVendido) as totalcompraAno FROM Tb_Venda WHERE Year(dataVenda) = Year(now())";

                    $sql = mysqli_query($conn, $script);
        
                
                    if(mysqli_num_rows($sql) > 0)
                    {

                      while($linha = mysqli_fetch_assoc($sql))
                      {
                        $_SESSION['id'] = $linha['totalcompraAno'];
              ?>
                      <p class="card-text h3 text-dark text-right">R$ <?php echo $linha['totalcompraAno']; ?></p>
                <?php }
                   }
                }else
                {
                ?>
                    <p class="card-text h3 text-dark text-right">R$</p>
          <?php }?>
            </div>
        </div>

      </div>
    </div>

    <div class="container-fluid">
      <div class="card-deck mb-3">

        <div class="card border-dark">
          <div class="card-header text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;"><h6>PRODUTOS MAIS VENDIDOS</h6></div>
          <div class="card-body">
            <table class="table border-success text-center hover compact stripe nowrap" id="minhaTabela">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>PRODUTO</th>
                  <th>QUANT.</th>
                </tr>
              </thead>
              <tbody>
              <?php
              if (isset($_SESSION['empresaNome']))
              {
                include('banco/conexao.php');

                $script = "SELECT Tb_Venda.idProduto, SUM(Tb_Venda.quantidadeVenda) AS vendaTotal, Tb_Produto.nomeProduto  FROM Tb_Venda 
                  INNER JOIN Tb_Produto ON Tb_Produto.idProduto = Tb_Venda.idProduto 
                  GROUP BY Tb_Venda.idProduto ORDER BY vendaTotal DESC";
                $sql = mysqli_query($conn, $script);
        
                
                if(mysqli_num_rows($sql) > 0)
                {

                  while($linha = mysqli_fetch_assoc($sql))
                  {
              ?>
                   <tr>
                    <td><?php echo $linha['idProduto']; ?></td>
                    <td><?php echo $linha['nomeProduto']; ?></td>
                    <td><?php echo $linha['vendaTotal']; ?></td>
                  </tr>
            <?php }
                } 
              }?>
              </tbody>
            </table>
          </div>
          <div class="card-footer text-right">
              <small class="text-muted "><a href="relatorioProdutos.php#mais_vendidos" class="card-link">mais detalhes</a></small>
          </div>
        </div>

        <div class="card border-dark">
          <div class="card-header text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;"><h6>PRODUTOS COM ESTOQUE BAIXO</h6></div>
          <div class="card-body">
            <table class="table border-success text-center hover compact stripe nowrap" id="minhaTabela2">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>PRODUTO</th>
                  <th>QUANT.</th>
                </tr>
              </thead>
              <tbody>
              <?php
              if (isset($_SESSION['empresaNome']))
              {
                include('banco/conexao.php');

                $script = "SELECT idProduto, nomeProduto, quantidadeTotal
                           FROM Tb_Produto
                           WHERE quantidadeTotal < estoqueMinimo GROUP BY idProduto 
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
                    <td><?php echo $linha['quantidadeTotal']; ?></td>
                  </tr>
            <?php }
                } 
              }?>
              </tbody>
            </table>
          </div>
           <div class="card-footer text-right">
              <small class="text-muted "><a  href="relatorioProdutos.php#estoque_baixo" class="card-link">mais detalhes</a></small>
          </div>
        </div>

        <div class="card border-dark ">
          <div class="card-header text-center" style="background-color: <?php if (!isset($_SESSION['corMenuFundo'])) { echo "#c0c0c0";}else{ echo $_SESSION['corMenuFundo']; }?>;"><h6>PRODUTOS COM VENDAS BAIXAS</h6></div>
          <div class="card-body">
            <table class="table border-success text-center hover compact stripe nowrap" id="minhaTabela3">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>PRODUTO</th>
                  <th>ULT.VENDA</th>
                </tr>
              </thead>
              <tbody>
              <?php
              if (isset($_SESSION['empresaNome']))
              {
                include('banco/conexao.php');
              
                $script = "SELECT Tb_Venda.idProduto, Tb_Venda.quantidadeVenda, Tb_Venda.dataVenda, Tb_Produto.nomeProduto from Tb_Venda
                  LEFT JOIN Tb_Produto
                  ON Tb_Produto.idProduto = Tb_Venda.idProduto
                  where now() >= ADDDATE(dataVenda, INTERVAL dataMinimo DAY)
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

              ?>
                   <tr>
                    <td><?php echo $linha['idProduto']; ?></td>
                    <td><?php echo $linha['nomeProduto']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($linha['dataVenda'])); ?></td>
                  </tr>
            <?php }
                } 
              }?>
              </tbody>
            </table>
          </div>
           <div class="card-footer text-right">
              <small class="text-muted "><a href="relatorioProdutos.php#venda_baixa" class="card-link">mais detalhes</a></small>
          </div>
        </div>

      </div>                        
    </div>
  </div>

<script type="text/javascript">

      $(document).ready(function(){
      $('#minhaTabela').DataTable({
          "searching": false,
          "scrollY": "210px",
          "scrollCollapse": true,
          "paging": false,
          "ordering": false,
         dom: 'rtp',
         "language": {
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
           "order": [[ 2, "desc" ]]
      });
      $('#minhaTabela2').DataTable({
          "searching": false,
          "scrollY": "210px",
          "scrollCollapse": true,
          "paging": false,
          "ordering": false,
         dom: 'rtp',
         "language": {
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
      });
      $('#minhaTabela3').DataTable({
          "searching": false,
          "scrollY": "210px",
          "scrollCollapse": true,
          "paging": false,
          "ordering": false,
         dom: 'rtp',
         "language": {
            "zeroRecords": "Nada encontrado",
            "infoEmpty": "Nenhum registro disponível",
           },
      });
  });

</script>

<?php }?>