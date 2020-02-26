<?php

if(isset($_POST['palavra'])){

	if (!isset($_SESSION['itens'])) 
        {
          $_SESSION['itens'] = array();
        }
var_dump($_POST['palavra']);
        //Recuperar o valor da palavra
        $produto = $_POST['palavra'];

        if(!isset($_SESSION['itens'][$produto]))
          {
            $_SESSION['itens'][$produto] = 1;
          }
          else
          {
            $_SESSION['itens'][$produto] +=1;
          }
     
        $quanTCarrinho = count($_SESSION['itens']);
	//Incluir a conexão com banco de dados
	include('../banco/conexao.php');
	
	
	$_SESSION['dados']=array();
	 foreach ($_SESSION['itens'] as $id => $quantidade) 
	  {
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$query = ("SELECT Tb_Produto.idProduto, Tb_Produto.nomeProduto, Tb_Unidade.unidadeAbreviada, Tb_PrecoVenda.precoVenda AS valorVenda FROM Tb_Produto 
              left join Tb_Unidade on (Tb_Produto.idUnidadeAbreviada = Tb_Unidade.idUnidade)
              left join Tb_PrecoVenda on (Tb_Produto.idPrecoVenda = Tb_PrecoVenda.idPrecoVenda)
              WHERE idProduto = $id");
	$resultado_produto = mysqli_query($conn, $query);
	
	if(mysqli_num_rows($resultado_produto) <= 0){
		echo "Nenhum produto encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_produto)){
			
			$subTotal = $quantidade * $rows['valorVenda'];

      echo "<tr>"."<td>" . "<button class='btn btn-sm btn-danger' onclick='RemoveTableRow(this)' type='button'>X</button>" . "</td>";
			echo "<td>".$produto."</td>";
			echo "<td>".$rows['nomeProduto']."</td>";
			echo "<td>".$quantidade."</td>";
			echo "<td>"."R$ ".number_format($rows['valorVenda'],2,",",".") ."</td>";
			echo "<td>".""."</td>";
			echo "<td>"."R$ ".number_format($subTotal,2,",",".") ."</td>"."</tr>";
			

			array_push(
              $_SESSION['dados'],
              array(
                'idProduto' => $id,
                'quantidade' => $quantidade,
                'preco' => $rows['precoProduto'],
                'subTotal' => $subTotal
              )
              ); 
		}
	}
	}
	 
}
?>
<script type="text/javascript">
    RemoveTableRow = function (handler) {
      var tr = $(handler).closest('tr');
        tr.fadeOut(400, function () {
        tr.remove();
        });
        return false;
      };
  </script>