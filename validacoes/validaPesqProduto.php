<?php 

include('../banco/conexao.php');

session_start();

	$nomeProduto = strtoupper($_POST["nomeProduto"]);
	$marcaProduto = strtoupper($_POST["marcaProduto"]);
	$codigoBarras = $_POST["codigoBarrasProduto"];
	$tipoProduto = strtoupper($_POST["tipoProduto"]);
	$precoProduto = $_POST["precoProduto"];
	$precoProduto = preg_replace("/(\D)/i" , "." , $precoProduto);//MUDAR VIRGULA PARA PONTO
	$unidadeAbreviada = $_POST["unidadeAbreviada"];
	$descricaoProduto = strtoupper($_POST["descricaoProduto"]);	
	$idUsuarioCadastro = $_SESSION['cod'];
	$valorMedida = $_POST['valorMedida'];
	$valorMedida = preg_replace("/(\D)/i" , "." , $valorMedida);
	$quantidadeMinima = $_POST['quantidadeMinProduto'];
	$diasMinimo = $_POST['diasMinProduto'];
	$idUsuarioCadastro = $_SESSION['cod'];

$retornoPesqProduto = array();

//*************** VERIFICA SE PRODUTO JÁ EXISTE NO BANCO**********************//
$consultaProduto = "select nomeProduto from Tb_Produto where nomeProduto = '$nomeProduto';";
$consultaProduto = mysqli_query($conn, $consultaProduto);
$linhaProduto = mysqli_num_rows($consultaProduto);

//*************** VERIFICA SE CÓDIGO DE BARRAS JÁ EXISTE NO BANCO**********************//
$consultaCodBarras = "select nomeProduto from Tb_Produto where codigoBarras = '$codigoBarras';";
$consultaCodBarras = mysqli_query($conn, $consultaCodBarras);
$linhaCodBarras = mysqli_num_rows($consultaCodBarras);


$sql = $conn->prepare("select idProduto, ativo from Tb_Produto where nomeProduto = '$nomeProduto';");
	$sql->execute();
	$resultado = $sql->get_result();
	$linha = $resultado->fetch_assoc();
	$ativo = $linha["ativo"];
	$idProdutoPesq = $linha["idProduto"];

if ($linhaProduto == 0){
	
	if($linhaCodBarras == 1 ){
	
		$retornoPesqProduto["sucesso"] = false;
		$retornoPesqProduto["mensagem"] = "<div class='rounded text-center bg-warning mb-3 p-2 h5'>Código de barras já associado em um produto!</div>";
	}	

	}elseif($linhaProduto == 1 && $ativo == 0){
	
	$retornoPesqProduto["sucesso"] = false;
		$retornoPesqProduto["mensagem"] = "<div class='text-center bg-warning mb-3 pt-2 h5'>Este produto foi removido!<br><form action='validacoes/validaAtivaProduto.php' method='POST'> <button type='submit' class='btn btn-transparent'value='$idProdutoPesq' name='btnAtivar'>Clique aqui para restaurá-lo novamente.</button></form></div>";
	
}else{
		$retornoPesqProduto["sucesso"] = false;
		$retornoPesqProduto["mensagem"] = "<div class='text-center bg-warning mb-3 p-2 h5' id='salvo'>Produto já existente!</div>";

	}

echo json_encode($retornoPesqProduto);

?>
