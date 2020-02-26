  <table class="table border shadow text-center">
  <thead>
    <tr>
      <th><input type="checkbox" id="selecctall"></th>
      <th>ID</th>
      <th>NOME</th>
      <th>CPF</th>
      <th>CARGO</th>
      <th>USUÁRIO</th>
      <th>DATA CADASTRO</th>
      <th>ATIVO</th>
      <th>AÇÕES</th>
    </tr>
  </thead>
  <tbody>
   <?php  
         
              //CRIAR PAGINAÇÃO
            //----------------------------------------------------------------------------------------
              //RECEBER O NUMERO DA PAGINA
              $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
              $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
              global $pagina;
              //SETAR A QUANTIDADE DE ITENS POR PÁGINA
              $qnt_result_pg = 10;
              //CALCULAR O INICIO VISUALIZAÇÃO
              $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
            
            //----------------------------------------------------------------------------------------
            include('banco/conexao.php');
            $script = "SELECT * FROM Tb_Usuario where ativo = 1 LIMIT $inicio, $qnt_result_pg";
            $sql = mysqli_query($conn, $script);;
    
    //----------------------------------------------------------------------------------------
        
            if(mysqli_num_rows($sql) > 0)
            {

            while($linha = mysqli_fetch_assoc($sql)){
              $_SESSION['id'] = $linha['idUsuario'];
              $_SESSION['nomeUsuario'] = $linha['nomeUsuario'];
              $_SESSION['cpf'] = $linha['cpf'];
              $_SESSION['rg'] = $linha['rg'];
              $_SESSION['cep'] = $linha['cep'];
              $_SESSION['endereco'] = $linha['endereco'];
              $_SESSION['numero'] = $linha['numero'];
              $_SESSION['bairro'] = $linha['bairro'];
              $_SESSION['cidade'] = $linha['cidade'];
              $_SESSION['estado'] = $linha['estado'];
              $_SESSION['endereco'] = $linha['endereco'];
              $_SESSION['eMail'] = $linha['eMail'];
              $_SESSION['nickName'] = $linha['nickName'];
              $_SESSION['senha'] = $linha['senha'];
              $_SESSION['tel'] = $linha['tel'];
              $_SESSION['cel'] = $linha['cel'];
              $codFunc = $_SESSION['id'];
              $ativo = $linha['ativo'];
              if ($ativo = "1") {
                  $ativo = "ATIVO";
              }else{
                  $ativo = "INATIVO";
              }
              ?>
              <tr>
                <th scope="row"><input class="checkbox1" name="check[]" value="item1" type="checkbox"></th>
                <td><?php echo $linha['idUsuario']; ?></td>
                <td class="text-left"><?php echo $linha['nomeUsuario']; ?></td>
                <td><?php echo $linha['cpf']; ?></td>
                <td><?php  ?></td>
                <td class="text-left"><?php echo $linha['nickName']; ?></td>
                <td><?php echo date('d/m/Y', strtotime($linha['dataCadastro'])); ?></td>
                <td><?php echo $ativo; ?></td>
                <td class="row">
                  <!-- botão editar -->
                <?php if ($_SESSION['cod'] == 1){?> 
                  <button class="btn btn-sm mt-n1 col-4" data-toggle="modal" data-target="#modalAlterar" value="<?php echo $linha['idUsuario']; ?>" 
                    data-altfunc="<?php echo $linha['idUsuario']; ?>" 
                    data-altnome="<?php echo $linha['nomeUsuario']; ?>"
                    data-altrg="<?php echo $linha['rg']; ?>" 
                    data-altcpf="<?php echo $linha['cpf']; ?>" 
                    data-altcep="<?php echo $linha['cep']; ?>" 
                    data-altend="<?php echo $linha['endereco']; ?>" 
                    data-altnum="<?php echo $linha['numero']; ?>"
                    data-altbairro="<?php echo $linha['bairro']; ?>" 
                    data-altcidade="<?php echo $linha['cidade']; ?>"
                    data-altestado="<?php echo $linha['estado']; ?>" 
                    data-altemail="<?php echo $linha['eMail']; ?>" 
                    data-altuser="<?php echo $linha['nickName']; ?>" 
                    data-altsenha="<?php echo $linha['senha']; ?>" 
                    data-alttel="<?php echo $linha['tel']; ?>"
                    data-altcel="<?php echo $linha['cel']; ?>">
                    <span class="fas fa-edit text-primary"></span>
                  </button>
                <?php }else { ?>
                  <button class="btn btn-sm mt-n1 col-4" data-toggle="modal" data-target="#modalPermissao"><span class="fas fa-edit text-primary"></span></button> 
                <?php }?>

                <!-- botão excluir -->
                  <?php if ($_SESSION['cod'] == 1){?> 
                  <button class="btn btn-sm mt-n1 col-4" data-toggle="modal" data-target="#modalExcluir" value="<?php echo $linha['idUsuario']; ?>" 
                    data-altfunc="<?php echo $linha['idUsuario']; ?>">
                    <span class="fas fa-trash text-danger"></span>
                  </button>
                <?php }else { ?>
                  <button class="btn btn-sm mt-n1 col-4" data-toggle="modal" data-target="#modalExcluir"><span class="fas fa-trash text-danger"></span></button> 
                <?php }?>

                <!-- botão informações -->
                  <button class="btn btn-sm mt-n1 col-4" data-toggle="modal" data-target="#modalInformacoes" value="<?php echo $linha['idUsuario']; ?>" 
                    data-altfunc="<?php echo $linha['idUsuario']; ?>" 
                    data-altnome="<?php echo $linha['nomeUsuario']; ?>"
                    data-altrg="<?php echo $linha['rg']; ?>" 
                    data-altcpf="<?php echo $linha['cpf']; ?>" 
                    data-altcep="<?php echo $linha['cep']; ?>" 
                    data-altend="<?php echo $linha['endereco']; ?>" 
                    data-altnum="<?php echo $linha['numero']; ?>"
                    data-altbairro="<?php echo $linha['bairro']; ?>" 
                    data-altcidade="<?php echo $linha['cidade']; ?>"
                    data-altestado="<?php echo $linha['estado']; ?>" 
                    data-altemail="<?php echo $linha['eMail']; ?>" 
                    data-altuser="<?php echo $linha['nickName']; ?>" 
                    data-altsenha="<?php echo $linha['senha']; ?>" 
                    data-alttel="<?php echo $linha['tel']; ?>"
                    data-altcel="<?php echo $linha['cel']; ?>">
                    <span class="fas fa-info text-warning"></span>
                  </button>
                </td>
              </tr>
              <?php
            }
          }
    ?>
      
  </tbody>
</table> 
<div class="float-right aling-bottom ">

    <?php 
          
                    //PAGINAÇÃO SOMAR A QUANTIDADE DE ITENS CADASTRADOS
          //--------------------------------------------------------------------------------
            $result_pg = "SELECT COUNT(idUsuario) AS num_result FROM Tb_Usuario";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
          //QUANTIDADE DE PAGINA
            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
          //LIMITAR OS LINKS ANTES E DEPOIS
            $max_links = 2;

            echo "<div class='col-12 text-center text-dark font-weight-bold'>

            <a class='btn-sm btn btn-outline-secondary m-1' style='text-decoration:none;' href='pessoas.php?pagina=1'>PRIMEIRA</a>";

            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){

              if($pag_ant >= 1){
                echo "<a class='btn-sm btn btn-outline-secondary' style='text-decoration:none;' href='pessoas.php?pagina=$pag_ant'>$pag_ant</a>";
            }

          }
            echo " $pagina ";

            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
              if($pag_dep <= $quantidade_pg){
                    echo "<a class='btn-sm btn btn-outline-secondary' style='text-decoration:none;' href='pessoas.php?pagina=$pag_dep'> $pag_dep </a>";

              } 
          }

            echo "<a class='btn-sm btn btn-outline-secondary m-1' style='text-decoration:none;' href='pessoas.php?pagina=$quantidade_pg'> ÚLTIMA</a></div>";
          //---------------------------------------------------------------------------------

    ?>
</div>                     
</div>

