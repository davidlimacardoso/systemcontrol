<!-- modal confirma compra -->
<div class="modal fade modalConfimiCompra-modal-lg" id="modalCompra" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title mx-auto h3" id="exampleModalLabel">FINALIZAR VENDA</h5>
      </div>
      <div class="modal-body">
        <table class="table table-sm mt-3" id="imagem-table"> 
          <thead>                      
            <tr>
              <td >COD</td>
              <td >NOME</td>
              <td >QUANT</td>
              <td >VALOR UNT.</td>
              <td>SUBTOTAL</td>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_SESSION['dados'])) 
            {                        
              foreach ($_SESSION['dados'] as $produtos) 
              {

                echo "<tr id='linha'>" . "<td>" . $produtos['idProduto'] . "</td>";
                echo "<td>" .$produtos['nomeProduto']. "</td>";

                echo "<td>" . "<p class='text-dark'>" .$produtos['quantidade'] ." ".$produtos['unidade']  . "</p>" . "</td>";

                echo "<td>" . "<p class='text-dark'>" . "R$ ".number_format($produtos['preco'],2,",",".") . "</p>" . "</td>";

                echo "<td>" . "<p class='text-dark'>" . "R$ " . number_format($produtos['subTotal'],2,",",".") . "</p>" . "</td>";

              }
            }?>
          </tbody>
        </table>
        <hr>
        <div class="row float-right">
          <div class="col-12">
            <form class="" method="POST" action="validacoes/concluirVenda.php" id="formCompra">
              
              <input type="hidden" name="codCompra" id="codCompra">
              <input type="hidden" name="total" id="total" value="<?php echo $Total; ?>">
              
              <div class="form-inline mt-1">
                <div class="col-6">
                  <label class="label  float-right">FORMA DE PAGAMENTO</label>
                </div>
                <div class="col-6">
                  <select class="form-control" name="tipo" id="tipo" onchange="alteraDiv()">
                    <option value="" selected>---SELECIONE---</option> 
                    <option value="d">DINHEIRO</option>
                    <option value="cc">CARTÃO DE CRÉDITO</option>
                    <option value="cd">CARTÃO DE DEBITO</option>
                  </select>
                </div>
              </div>
              <div class="form-inline mt-2" style="display:none;" id="valorRecebido">
                <div class="col-6">
                  <label class="label float-right">VALOR RECEBIDO</label>
                </div>
                <div class="col-6">
                  <input type="text" name="recebido" id="recebido" class="form-control" oninput="calculaTroco()" >
                </div>
              </div>
              <div class="form-inline mt-2">
                <div class="col-6 h5">
                  <label class="label float-right">TOTAL:</label>
                </div>
                <div class="col-6 h3 text-success text-right">
                  <?php if(isset($Total)) {echo "R$ ".number_format($Total,2,",",".");} ?>
                </div>
              </div>
              <div class="form-inline mt-2" style="display:none;" id="troco">
                <div class="col-6">
                  <label class="label float-right">TROCO:</label>
                </div>
                <div class="col-6 text-danger text-right" id="valorTotal">
                  
                </div>
              </div>
        
              <div class="col-12 mt-5">
                <div class="float-right">
                  <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">FECHAR</button>
                  <button type="submit" class="btn btn-lg btn-success" id="btnCompra">FINALIZAR</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal exclui compra-->
<div class="modal fade" id="cancelaCompraTotal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="modal-title text-center" id="exampleModalLabel"><?php echo($_SESSION['p_nome']);?><br>É necessario o usuário e senha do gerente para cancelar a venda.</h5>
        <hr>
       <form class="form-group" action="validacoes/cancelaVendaTotal.php" method="POST" id="formAltera">
            <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input type="text" name="emailConfig" id="emailConfig" placeholder="USUÁRIO" class="form-control limpa" autofocus>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-key"></i>
                  </div>
                </div>
                <input type="password" name="passConfig" id="passConfig" placeholder="SENHA" class="form-control limpa">
            </div>
          <div class="modal-footer mb-n4">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            <button type="submit" class="btn btn-success" id="btnLibera">VALIDAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal exclui item-->
<div class="modal fade" id="excluiItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="modal-title text-center" id="exampleModalLabel"><?php echo($_SESSION['p_nome']);?><br>É necessario o usuário e senha do gerente para remover o item.</h5>
        <hr>
       <form class="form-group" action="validacoes/cancelaVendaItem.php" method="POST" id="formAltera">
            <input type="hidden" name="id" id="id">
            <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input type="text" name="emailConfig" id="emailConfig" placeholder="USUÁRIO" class="form-control limpa" autofocus>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-key"></i>
                  </div>
                </div>
                <input type="password" name="passConfig" id="passConfig" placeholder="SENHA" class="form-control limpa">
            </div>
          <div class="modal-footer mb-n4">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            <button type="submit" class="btn btn-success" id="btnLibera">VALIDAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalListaProduto" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="TituloModalLongoExemplo">LISTA DE PRODUTOS</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="shadow text-center hover compact stripe nowrap" id="minhaTabela">
          <thead>                       
            <tr>
                <td >CODIGO</td>
                <td >NOME</td>
                <td >CATEGORIA</td>
            </tr>  
          </thead>
          <tbody>
            <?php
            include('banco/conexao.php');
            $script = "SELECT * FROM Tb_Produto
            INNER JOIN Tb_TipoProduto ON Tb_TipoProduto.idTipoProduto = Tb_Produto.idTipoProduto";
            $sql = mysqli_query($conn, $script);

            if(mysqli_num_rows($sql) > 0)
            {

              while($linha = mysqli_fetch_assoc($sql))
              {
                 

             ?>
           <tr>
              <td><?php echo $linha['idProduto']; ?></td>
              <td><?php echo $linha['nomeProduto']; ?></td>
              <td><?php echo $linha['nomeTipoProduto']; ?></td>
            </tr>
          <?php }
            }?>
          </tbody>
        </table>    
      </div>
    </div>
  </div>
</div>