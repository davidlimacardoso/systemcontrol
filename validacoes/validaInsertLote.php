<?php 

include('../banco/conexao.php');

session_start();

	$nomeProduto = $_POST["selProduto"];
	$descricao = $_POST['descricaoProduto'];
	$idUsuarioCadastro = $_SESSION['cod'];

	
	//echo  '/NOME: '.  $nomeProduto . '/MARCA: '. $marcaProduto . '/CODIGO: '. $codigoBarras . '/TIPO: '. $tipoProduto . '/PRECO: '. $precoProduto . '/UNI: '. $unidadeAbreviada . '/VALOR: '. $valorMedida . '/DESC: '. $descricaoProduto;

//$script = "insert into Tb_Quantidade (quantidade) values ($quantidadeProduto);";

$script2 = "insert into Tb_Lote (dataEntrada,idUsuario,idCompraProduto,idProdutoLote) 
		values (now(),$idUsuarioCadastro,$fornecedor,last_insert_id(),$nomeProduto);";

$script3 = "insert into Tb_CompraProduto (dataCompra,valorUnitario,idLote,idUsuario)
		values ('$dataCompra',$valorUnitario,last_insert_id(),$idUsuarioCadastro);";
mysqli_query($conn, $script);
mysqli_query($conn, $script2);
mysqli_query($conn, $script3);

/*print_r($script);
print_r($script2);
print_r($script3);*/


if(mysqli_insert_id($conn)){
	$_SESSION['msgCad'] = "<div class='alert alert-success w-25 m-auto text-center'> Lote cadastrado com sucesso! </div>";
	$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
	header("Location: $pagAnterior");
	}
	else{
	$_SESSION['msgCad'] = "<div class='alert alert-danger m-auto text-center''> Erro ao cadastrar produto </div>";
	header("Location: $pagAnterior");
}

//$pagAtual = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
	//	header("Location: $pagAtual");


?>
