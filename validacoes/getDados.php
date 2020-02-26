<?php
include('../banco/conexao.php');

$script = ("SELECT Tb_Produto.nomeProduto, Tb_PrecoVenda.precoProduto FROM Tb_Produto 
              left join Tb_PrecoVenda on (Tb_Produto.idPrecoVenda = Tb_PrecoVenda.idPrecoVenda)
              WHERE idProduto = $id");
           
             $sql = mysqli_query($conn, $script);

            date_default_timezone_set('America/Sao_Paulo');
            
            while ($row_TB_Tarefas = mysqli_fetch_assoc($sql)) 
            {    
              
              
              $subTotal = $quantidade * $row_TB_Tarefas["precoProduto"];
            $Total = 0;

                echo $row_TB_Tarefas;
                   
          
           
                       
                

           } 

        }
?>