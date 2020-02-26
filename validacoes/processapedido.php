<?php 

//VALIDA A COMPRA E OSPRODUTOS ADICIONADOS

include('../banco/conexao.php');

session_start();
	$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA

/*
if($_POST){
	echo ('<pre>');
	
	print_r($_POST);
	
		echo ('</pre>');
}else{
	echo "nenhuma informação foi enviada!";
}*/

	$fornecedor = strtoupper($_POST["selForn"]);
	$pedido = $_POST["numPedido"];
	$notaFiscal = $_POST["notaFisc"];
	$dataEntrega = str_replace("/", "-", $_POST["dataEntrega"]);
	$dataEntrega = date('Y-m-d', strtotime($dataEntrega));
	$dataCompra = str_replace("/", "-", $_POST["dataCompra"]);
	$dataCompra = date('Y-m-d', strtotime($dataCompra));
	$estado = "AGUARDANDO";
	$idUsuarioCadastro = $_SESSION['cod'];	


	
//VARIÁVEIS RECEBENDO DADOS DA DIV ITEM PRODUTO
	$produto = $_POST["selProduto"];
	$valorUnitario = $_POST["valorUnitario"];
	$valorUnitario = preg_replace("/(\D)/i" , "." , $valorUnitario);
	$quantidade = $_POST["quantidade"];

$retorno = array();

$script = "
    insert into Tb_CompraProduto (numeroPedido,numeroNotaFiscal,dataCompra,dataEntrega,idUsuarioCadastro,idFornecedor,estadoCompra,valorTotalCompra,quantidadeProdutoTotal,dataRegistro) values ('$pedido','$notaFiscal','$dataCompra','$dataEntrega',$idUsuarioCadastro,$fornecedor,'$estado',0,0,now());";

if(mysqli_query($conn, $script)){

//*******************ARMAZENAR O ULTIMO INSERT DO BANCO***************************
$sql = $conn->prepare("select last_insert_id()");
$sql->execute();
$resultado = $sql->get_result();
$linha = $resultado->fetch_assoc();

$ultimoIdCompra = $linha["last_insert_id()"];

	
	//*************************LAÇO PARA ARRAY DA DIV DUPLICADA*********************************
$totalProdutos = count($produto);//CONTA A QUANTIDADE DE PRODUTOS LISTADOS
$quantidadeTotal = 0;//CONTAR A QUANTIDADE TOTAL DE PRODUTOS LISTADOS
$valorTotalCompra = 0;//CONTAR A QUANTIDADE TOTAL DE PRODUTOS LISTADOS

for($i=0;$i < $totalProdutos;$i++){
	
	$insertProduto = $produto[$i];
	$insertValorUnitario = $valorUnitario[$i];
	$insertQuantidade = $quantidade[$i];
	$valorTotalProduto = $insertQuantidade * $insertValorUnitario;
			
	//INSERT PRODUTO
	//$str[] = "($ultimoIdCompra,$insertProduto,$insertValorUnitario,$insertQuantidade,$valorTotalProduto)"; 
	
	//$s = implode(',',$str);
	
	$scriptTeste = "($ultimoIdCompra,$insertProduto,$insertValorUnitario,$insertQuantidade,$valorTotalProduto)"; 
	
	
	$script2 = "
	insert into Tb_ListaProduto (idPedido,produto,valorUnitario,quantidadeProduto,valorTotalProduto)
		values $scriptTeste;";
	

	mysqli_query($conn, $script2);
	
	
	$quantidadeTotal = $quantidadeTotal + $insertQuantidade;//SOMAR A QUANTIDADE TOTAL DOS PRODUTOS
	$valorTotalCompra = $valorTotalCompra + $valorTotalProduto;//SOMAR A QUANTIDADE TOTAL DOS PRODUTOS
}

//*******************ALTERAR A QUANTIDADE TOTAL DE PRODUTOS NA COMPRA***************************

$script3 = "UPDATE Tb_CompraProduto SET quantidadeProdutoTotal = $quantidadeTotal, valorTotalCompra = $valorTotalCompra where idCompraProduto = $ultimoIdCompra;";

if(mysqli_query($conn,$script3)){
	$retorno['sucesso'] = true;
	$retorno['mensagem'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'>Compra cadastrada com sucesso!</div>";
	//$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'> Pedido nº " . $pedido . " cadastrada com sucesso! </div>";
	//header("Location: $pagAnterior");
}else{

	$retorno['sucesso'] = false;
	$retorno['mensagem'] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'>Falha no cadastro da compra!</div>";
	//$_SESSION['msgCad'] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'> Falha ao cadastrar compra! </div>";
	//header("Location: ../adicionarcompra.php");

}
	

}
//MENSAGEM QUANDO NAO PREENCHE OS CAMPOS DA COMPRA
else{
	
	$retorno['sucesso'] = false;
	$retorno['mensagem'] = "<div class='text-center bg-warning mb-3 p-2 h5' id='salvo'> Por favor preenche todos os campos da compra! </div>";
	
	//$_SESSION['msgCad'] = "<div class='alert alert-warning w-50 m-auto text-center'> Por favor preenche todos os campos da compra! </div>";
	//header("Location: ../adicionarcompra.php");
	//die();
}

echo json_encode($retorno);



/*print_r($script);
print_r($script2);
print_r($script3);

echo "<hr>";
echo $quantidadeTotal."<br>";
echo $valorTotalCompra  = number_format($valorTotalCompra, 2, '.', '');
echo "<hr>";
*/


/*if(mysqli_insert_id($conn)){
	$_SESSION['msgCad'] = "<div class='alert alert-success w-50 m-auto text-center'> Compra nº " . $ultimoIdCompra . " cadastrada com sucesso! </div>";
	header("Location: $pagAnterior");
	}
	else{
	$_SESSION['msgCad'] = "<div class='alert alert-danger w-50 m-auto text-center> Falha ao cadastrar compra! </div>";
	header("Location: ../adicionarcompra.php");
}*/

//$pagAtual = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
//header("Location: $pagAtual");


?>