<div class="wrapper">

<?php include('validacoes/menu.php'); ?>
<?php
  if(!isset($_SESSION))
  {
    session_start();
  }
  if($_SESSION['cnpj'] == ""){ ?>
  <div class="text-center bg-danger p-2 h5">Solicite para seu gerente verificar as configurações do sistema.</div>
<?php }
  if($_SESSION['idPerfil'] != 1 & $_SESSION['idPerfil'] != 2 & $_SESSION['idPerfil'] != 4){ ?>
  <div class="text-center"><img src="imagens/pagina_erro.png"></div>
<?php }else{

 //print_r($_SESSION['dados']);
//print_r($_SESSION['dados'][0]['quantidade']);
date_default_timezone_set("America/Sao_Paulo");
$data = date('Y-m-d H:i');
include('banco/conexao.php');
$script = "SELECT idProduto, nomeProduto, marcaProduto, valorMedida, unidadeAbreviada, precoVenda 
from Tb_Produto
inner join Tb_Unidade on Tb_Produto.idUnidadeAbreviada = Tb_Unidade.idUnidade
inner join Tb_PrecoVenda on Tb_Produto.idPrecoVenda = Tb_PrecoVenda.idPrecoVenda
where quantidadeTotal > 0 and ativo = 1";
$selectProduto = mysqli_query($conn, $script) or die("Não foi possível realizar a consulta do produto");
?>
<script type="text/javascript" src="js/mascara.js"></script>
<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript" src="js/javascriptpersonalizado.js"></script>-->


    <div class="d-flex justify-content-between">
       <span class="mt-n4 mb-2 lead"><i class="fas fa-shopping-cart mr-2"></i><?php echo "VENDAS"; ?></span>
       <span class="mt-n4 mb-2 lead">
        <?php if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
       </span>
    </div>

    <?php 
        if(isset($_SESSION['msgCad']))
        {
          echo $_SESSION['msgCad'];
          unset($_SESSION['msgCad']);
        }
    ?>

    <div class="">
      <div class="row">
        <div class="col">
          <form action="" method="POST" class="mt-3" class="form-inline">
            <div class="row">
              <div class="col-2 pb-0">
                <div class="input-group mb-3">
                  <input type="number" class="form-control text-center" aria-label="Username" aria-describedby="basic-addon1" id="quant" name="quant" value="1" title="quantidade">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon1" title="quantidade"><i class="fas fa-sort-amount-up"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-8 pb-0">
                <div class="mb-3">
                  <select class="selectpicker form-control selectVidente" data-size="8" data-style="border-secondary" data-content="" title="Selecione um produto..." data-container="body" data-live-search="true" id="selCompraEstoque" name="pesq" autofocus type="search">
                    <?php while($linha = mysqli_fetch_assoc($selectProduto)) {?>
                    <option class="text-center border" value="<?php echo $linha['idProduto'];?>"><?php echo $linha['nomeProduto'] . " ". $linha['marcaProduto']  . ", ". $linha['valorMedida']  . " ". $linha['unidadeAbreviada'] . " - R$ " . number_format($linha['precoVenda'],2,",",".");?></option>
                    <?php }?>
                  </select>
                 <!-- <input type="search" name="pesq" id="pesq" class="form-control" placeholder="REGISTRE O CÓDIGO OU O NOME DO PRODUTO" aria-label="Recipient's username" aria-describedby="basic-addon2" autofocus autocomplete="off">-->
                  
                </div>
              </div>
              <div class="col-2">
                <button type="submit" class="btn btn-block text-light" id="basic-addon2" title="registrar" style="background-color: <?php if (!isset($_SESSION['corLogoFundo'])) { echo "#808080";}else{ echo $_SESSION['corLogoFundo']; }?>;">REGISTRAR</button>
              </div>
            </div>
          </form>
         <!-- <span class="float-right mt-n3 mb-3  btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#ModalListaProduto">
            LISTA DE PRODUTOS<i class="fas fa-clipboard-list ml-1"></i>
          </span>-->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-9 border bg-light">
          <table class="table mt-3" id="imagem-table"> 
            <thead style="background-color: <?php if (isset($_SESSION['corMenuFundo'])) { echo $_SESSION['corMenuFundo']; }?>;">                      
              <tr>
                <td>ITEM</td>
                <td >COD</td>
                <td >NOME</td>
                <td >QUANT</td>
                <td >VALOR UNT.</td>
                <td>SUBTOTAL</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <form class="form-group" action="" method="POST" id="formCompra">
               <?php
                include_once('validacoes/addCompra.php');
                if (isset($_SESSION['dados'])) 
                {     $cont = 1;                   
                    foreach ($_SESSION['dados'] as $produtos) 
                    {
                      echo "<tr>" . "<td>" . $cont . "</td>";
                      echo "<td>" . $produtos['idProduto'] . "</td>";
                      echo "<td>" .$produtos['nomeProduto']. "</td>";

                      echo "<td>" . "<span class='text-dark'>" .$produtos['quantidade'] ." ".$produtos['unidade']  . "</span>" . "</td>";

                      echo "<td>" . "<span class='text-dark'>" . "R$ ".number_format($produtos['preco'],2,",",".") . "</span>" . "</td>";

                      echo "<td>" . "<span class='text-dark'>" . "R$ " . number_format($produtos['subTotal'],2,",",".") . "</span>" . "</td>";

                     /* echo "<td>" . "<a href='remover.php?remover=carrinho&idProduto=".$produtos['idProduto']."' class='btn btn-sm mt-n1'>"."<span class='fas fa-trash text-danger'>"."</span>"."</a>" . "</td>" . "</tr>";*/

                      echo"<td>". "<button type='button' class='btn btn-sm mt-n1' data-toggle='modal' data-target='#excluiItem' value='{$produtos['idProduto']}' data-altprod='{$produtos['idProduto']}'>".
                           "<span class='fas fa-trash text-danger'>"."</span>".
                        "</button>" . "</td>" . "</tr>";
                        $cont ++;
                    }
                  }
               ?>
              </form>
            </tbody>
          </table>
        </div>
        <div class="col-3 bg-light border-right">
          <div class="p-3">
            <?php 

            include('banco/conexao.php');
            $sql = $conn->prepare("SELECT max(codigoVenda) AS numCompra FROM Tb_Venda");
            $sql->execute();
            $resultado = $sql->get_result();
            $linha = $resultado->fetch_assoc();
            $numVenda = $linha['numCompra'];
            if ($numVenda == 0) {
              $numVenda = 1;
            }else{
              $numVenda += 1;
            }
           
            ?>
            <span>Venda Nº <?php if(isset($numVenda)) {echo $numVenda;} ?> </span><br>
            <?php    
             $totalItens = 0;
            foreach ($_SESSION['dados'] as $produtos) { 
                  $totalItens += $produtos['quantidade'];
                }
              ?>
            <span class="h6">Total de itens: <?php if(isset($totalItens)) {echo $totalItens;} ?> </span><br>
            <span class="h4 mt-5">TOTAL: R$ <span class="text-success h3" id="totalPagar"><?php if(isset($Total)) {echo number_format($Total,2,",",".");} ?></span></span><br><hr>
            <button type="button" class="btn btn-block btn-lg btn-danger" data-toggle="modal" data-target="#cancelaCompraTotal">CANCELAR</button>
            <button type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target=".modalConfimiCompra-modal-lg" value="<?php echo $numVenda; ?>" data-altcomp="<?php echo $numVenda; ?>">CONCLUIR</button>

          </div>
        </div>
      </div>
    </div>

    <?php include('modal/modalAlertas/modalRespostas.php');?>
    <?php include('modal/modalVenda.php');?>
    

<!-- <input type="text" name="cpf" id="cpf" placeholder="CPF CLIENTE" class="form-control mt-3" onKeyPress="MascaraCPF(cpf);" maxlength="14">-->
<script type="text/javascript">

  setTimeout(function() {
     $('#salvo').fadeOut('fast');
  }, 2000);


function calculaTroco() {
  var y = document.getElementById("total").value;
  var x = document.getElementById("recebido").value;

 // var r = x.replace(/[^0-9]+/g,'');
  var r = x.replace(',', '.');
  var t = r-y;
  var troco = t.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
  document.getElementById("valorTotal").innerHTML = troco;
  console.log(r);
  console.log(y);
}


  alteraDiv = function (){
    if($('#tipo').val() == 'd'){
        $("#valorRecebido").show();
        $("#troco").show();
    }
    if($('#tipo').val() == 'cc'){
        $("#valorRecebido").hide();
        $("#troco").hide();
    }
    if($('#tipo').val() == 'cd'){
        $("#valorRecebido").hide();
        $("#troco").hide();
    }
  }

  $('#excluiItem').on('show.bs.modal', function (event) {
      //recebe os dados
    var button = $(event.relatedTarget) 
    var recipient_cod = button.data('altprod')
      //imprimi os dados
    var modal = $(this)
    modal.find('#id').val(recipient_cod)
  });

 $('#modalCompra').on('show.bs.modal', function (event) {
      //recebe os dados
    var button = $(event.relatedTarget) 
    var recipient_cod = button.data('altcomp')
      //imprimi os dados
    var modal = $(this)
    modal.find('#codCompra').val(recipient_cod)
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
           colReorder: true,
         "searching": true,
         "language": {
            "search": "Pesquise por:",
           },

           dom: 'frt',
           buttons: [ 'excel' ,'print']
      });
      $('#minhaTabela_filter').addClass('form-inline');
      $('#minhaTabela_filter').addClass('mb-3');
      $('#minhaTabela_filter').addClass('mt-1');
  });
</script>
<?php }?>