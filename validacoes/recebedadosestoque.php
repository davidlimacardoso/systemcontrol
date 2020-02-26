<?php /*

//GERAR UM CALLBACK PARA TRABALHAR COM JASON EXTERNO
$callback = isset($_GET['callback']) ?  $_GET['callback'] : false;


include('../banco/conexao.php');

session_start();
	$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA

//RECEBER DADOS
$idCompraProduto = $_GET['selCompra'];
$idUsuarioCadastro = $_SESSION['cod'];	

$listarCompra = "select * from Tb_ListaProduto TLP
inner join tb_compraproduto TCP
	on TLP.idPedido = TCP.idCompraProduto
inner join Tb_Fornecedor TF
	on TCP.idFornecedor = TF.idFornecedor
inner join Tb_Produto TP
	on TP.idProduto = TLP.produto
 where idcompraproduto = '$idCompraProduto' "; 

$retorno = array();
$listarCompra = mysqli_query($conn,$listarCompra);

while($resultado = mysqli_fetch_array($listarCompra)) {

	 $retorno[] = $resultado;
}

echo json_encode($retorno);

mysqli_close($conn);
/*
$sql_insertLote = "insert into Tb_Lote (dataEntrada,idUsuario,idCompraProduto,quantidadeLote) 
		values (now(),$idUsuarioCadastro,'$idCompraProduto',500)";
	

echo"<hr>";
//print_r($listarCompra);
print_r($sql_insertLote);
print_r($resultado);
echo"<hr>";
print_r($produto . " <br> ");

// recebe os dados

 echo "TESTE";
// imprime na tela em formato json

*/

?>