<?php

if (!isset($order)) die();

?>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">


    <div class="container-fluid mt-5">
      <h3 class="text-center">RELATÓRIO DOS FUNCIONÁRIOS</h3>
	<table class="table">
   
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">CPF</th>
      <th scope="col">CARGO</th>
      <th scope="col">USUÁRIO</th>
      <th scope="col">DATA CADASTRO</th>
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
     <tr> <th><?php echo $row_transacoes['idUsuario'];?></th>
      <td><?php echo $row_transacoes['nomeUsuario'];?></td>
      <td><?php echo $row_transacoes['cpf'];?></td>
      <td><?php echo $row_transacoes['nomePerfil'];?></td>
      <td><?php echo $row_transacoes['nickName'];?></td>
      <td><?php echo date("d/m/Y", strtotime($row_transacoes["dataCadastro"]));?></td>
      <td><?php echo $ativo;?></td> </tr>
     <?php  } ?>
   
   
  </tbody>
</table>


    </div>
