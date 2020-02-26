<?php

if (!isset($order)) die();

?>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">


    <div class="container-fluid mt-5">
      <h3 class="text-center">RELATÓRIO DOS FORNECEDEORES</h3>
	<table class="table">
   
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">CNPJ</th>
      <th scope="col">RESPONSÁVEL</th>
      <th scope="col">TELEFONE</th>
      <th scope="col">ATIVO</th>
    </tr>
  </thead>
  <tbody>
    
    
       <?php
          while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
            $ativo = $row_transacoes["ativo"];
                  if ($ativo = "1") {
                    $ativo = "ATIVO";
                  }else{
                    $ativo = "INATIVO";
                  }
              
        ?>
     <tr> <th><?php echo $row_transacoes['idFornecedor'];?></th>
      <td><?php echo $row_transacoes['nomeFornecedor'];?></td>
      <td><?php echo $row_transacoes['cnpj'];?></td>
      <td><?php echo $row_transacoes['nomeResponsavel'];?></td>
      <td><?php echo $row_transacoes['telefoneComercial'];?></td>
      <td><?php echo $ativo;?></td> </tr>
     <?php  } ?>
   
   
  </tbody>
</table>


    </div>
