<?php 

include('../banco/conexao.php');

session_start();

function sanitizeString($str) {
    $str = preg_replace('/[áàãâä]/ui', 'a', $str);
    $str = preg_replace('/[éèêë]/ui', 'e', $str);
    $str = preg_replace('/[íìîï]/ui', 'i', $str);
    $str = preg_replace('/[óòõôö]/ui', 'o', $str);
    $str = preg_replace('/[úùûü]/ui', 'u', $str);
    $str = preg_replace('/[ç]/ui', 'c', $str);
    //$str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
    //$str = preg_replace('/[^a-z0-9]/i', '_', $str);
    $str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
    return $str;
}

	$nomeProduto = strtoupper(sanitizeString($_POST["altNomeProduto"]));
	$marcaProduto = strtoupper(sanitizeString($_POST["altMarcaProduto"]));
	$codigoBarras = $_POST["altCodigoBarrasProduto"];
	$tipoProduto = strtoupper(sanitizeString($_POST["altTipoProduto"]));
	$precoProduto = $_POST["altPrecoProduto"];
	$precoProduto = preg_replace("/(\D)/i" , "." , $precoProduto);//MUDAR VIRGULA PARA PONTO
	$unidadeAbreviada = $_POST["altUnidadeAbreviada"];
	$descricaoProduto = strtoupper(sanitizeString($_POST["altDescricaoProduto"]));	
	$idUsuarioCadastro = $_SESSION['cod'];
	$valorMedida = $_POST['altValorMedida'];
	$valorMedida = preg_replace("/(\D)/i" , "." , $valorMedida);
	$quantidadeMinima = $_POST['altQuantidadeMinProduto'];
	$diasMinimo = $_POST['altDiasMinProduto'];
	$validade = $_POST['validade'];


$idProduto = $_POST['idProduto'];
$idPrecoVenda = $_POST['idPrecoVenda'];

$script1="update Tb_PrecoVenda SET precoVenda = $precoProduto , dataCadastroPreco = NOW() where idPrecoVenda = $idPrecoVenda;";

$script2="update Tb_Produto SET nomeProduto = '$nomeProduto' , marcaProduto = '$marcaProduto' , codigoBarras = '$codigoBarras' , descricaoProduto = '$descricaoProduto' , idUnidadeAbreviada = $unidadeAbreviada , valorMedida = $valorMedida , idPrecoVenda = $idPrecoVenda , idTipoProduto = $tipoProduto , idUsuarioCadastroProduto = $idUsuarioCadastro , dataCadastro = NOW() , estoqueMinimo = $quantidadeMinima , dataMinimo = $diasMinimo, situacaoValidade = $validade where idProduto = $idProduto;";

//print_r($script1);
//print_r($script2);

//die();
if(mysqli_query($conn,$script1)){
	
	if(mysqli_query($conn,$script2)){
		
		$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'> Produto atualizado com sucesso! </div>";
		$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
		header("Location: $pagAnterior");
	}else{
		$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'> Erroao alterar produto </div>";
		$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
		header("Location: $pagAnterior");
	}
	   
	
}else{
	$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'> Erro ao alterar dados da venda! </div>";
	$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
	header("Location: $pagAnterior");
}

/*if(mysqli_insert_id($conn)){
	$_SESSION['msgCad'] = "<div class='alert alert-success w-50 m-auto text-center'> Produto atualizado com sucesso! </div>";
	$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
	header("Location: $pagAnterior");
	}
	else{
	$_SESSION['msgCad'] = "<div class='alert alert-danger w-50 m-auto text-center''> Erro ao atualizar produto </div>";
	$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
	header("Location: $pagAnterior");
}*/



?>