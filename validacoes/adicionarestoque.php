<?php

//GERAR UM CALLBACK PARA TRABALHAR COM JASON EXTERNO
$callback = isset($_GET['callback']) ?  $_GET['callback'] : false;


include('../banco/conexao.php');

session_start();
	$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA

//RECEBER DADOS
$idCompraProduto = $_POST['selCompra'];
$idProdutoLista = $_POST['idProdutoLista'];
$quantidadeProdutoLista = $_POST['quantidadeProdutoLista'];
$validade = $_POST['validade'];
$idUsuarioCadastro = $_SESSION['cod'];

if($validade == 0){
	$validade = null;
}

//print_r($_POST);echo"<hr>";


$dados = array($idProdutoLista,$validade,$quantidadeProdutoLista); //esse array é tem os dados dos id da lista de produtos e sua validade

//*************************LAÇO PARA ARRAY DA DIV DUPLICADA*********************************
$totalProdutos = count($idProdutoLista);//CONTA A QUANTIDADE DE PRODUTOS LISTADOS

for($i=0;$i < $totalProdutos;$i++){
	
	$insertProduto = $dados[0][$i];//posição da array idProduto Lista
	$insertValidade = $dados[1][$i];//posição da array validade do produto
	$quantidade = $dados[2][$i];//posição da array validade do produto
			
	
	
	//*************************>>>>>>>>>>>>>>***********************************************
	
	//************************SOMAR QUANTIDADE DOS PRODUTOS NA TABELA PRODUTOS*********************************

	$sql = $conn->prepare("select idProduto, quantidadeTotal from Tb_ListaProduto TLP
					inner join tb_compraproduto TCP
						on TLP.idPedido = TCP.idCompraProduto
					inner join Tb_Produto TP
						on TP.idProduto = TLP.produto
					 where idListaProduto = $insertProduto");
	$sql->execute();
	$resultado = $sql->get_result();
	$linha = $resultado->fetch_assoc();
	$idTB_Produto = $linha["idProduto"];
	$quantidadeTotalTB_Produto = $linha["quantidadeTotal"];
	
	$quantidadeTotalTB_Produto = $quantidadeTotalTB_Produto + $quantidade;//SOMAR AQUANTIDADE ANTERIRO COM A QUANTIDADE QUE ENTROU
	
	$script5 = "UPDATE Tb_Produto SET quantidadeTotal = $quantidadeTotalTB_Produto Where idProduto = $idTB_Produto;";

		
	mysqli_query($conn,$script5);
	print_r($script5);
	
	//************************INSERIR VALIDADE NOS PRODUTOS*********************************
	$script2 = "insert into Tb_Lote (dataEntrada,idUsuario,idCompraProduto,idProduto,quantidadeLote,validade) values (now(),$idUsuarioCadastro,$idCompraProduto,$idTB_Produto,$quantidade,'$insertValidade');";
	mysqli_query($conn,$script2);
	//print_r($script2);
	//print_r("<hr>");

	
	
//UPDATE DO ESTADO DA COMPRA EM AGUARDO PARA RECEBIDO!
$script3 = "UPDATE Tb_CompraProduto SET estadoCompra = 'RECEBIDO' where idCompraProduto = $idCompraProduto;";

mysqli_query($conn,$script3);
//print_r($script3); echo "<hr>";

}
//die();
$_SESSION['msgCad'] = "<div  class='text-center bg-success mb-3 p-2 h5' id='salvo'> Entrada realizada com sucesso! </div>";
	header("Location: ../estoque.php");
	
?>