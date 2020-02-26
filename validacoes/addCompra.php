<?php

    if (!isset($_SESSION['itens'])) 
    {
      $_SESSION['itens'] = array();
    }

    if(isset($_POST['pesq']))
    {
      
      $id = $_POST['pesq'];
      $quant = $_POST['quant'];

      /* Adiciona ao carrinho se não existir*/
      if(!isset($_SESSION['itens'][$id]))
      {
        $_SESSION['itens'][$id] = $quant;
      }
      else
      {
        /* soma ao carrinho se já existir*/
        $_SESSION['itens'][$id] +=$quant;
      }

    }

    $quanTCarrinho = count($_SESSION['itens']);
    $Total = 0;

   include('banco/conexao.php');
    $_SESSION['dados']=array();
   foreach ($_SESSION['itens'] as $id => $quantidade) 
   {
      $script =$conn->prepare("SELECT idProduto, nomeProduto,Tb_Unidade.unidadeAbreviada AS unidade,Tb_PrecoVenda.precoVenda AS vendaProd FROM Tb_Produto
        INNER JOIN Tb_PrecoVenda ON Tb_Produto.idPrecoVenda = Tb_PrecoVenda.idPrecoVenda
        INNER JOIN Tb_Unidade ON Tb_Produto.idUnidadeAbreviada = Tb_Unidade.idUnidade
        WHERE idProduto = $id AND ativo = 1 AND quantidadeTotal > $quantidade");
      $script->execute();
      $result = $script->get_result();
      $row = $result->fetch_assoc();
      $venda = $row['vendaProd'];
      //$sql = mysqli_query($conn, $script);


      //$Total = 0;
      if (!empty($sql)) 
      {    
          /* multipla a quanitdade pelo valor de venda*/
          $subTotal = $quantidade * $venda;
          /* armazena o valor total da venda*/
          $Total += $subTotal;                      

          array_push($_SESSION['dados'],
            array(
              'idProduto' => $id,
              'nomeProduto' => $row['nomeProduto'],
              'quantidade' => $quantidade,
              'unidade' => $row['unidade'],
              'preco' => $row['vendaProd'],
              'subTotal' => $subTotal,
              'Total' => $Total
            )
          ); 
        
      } 
      
    }
         
  ?>