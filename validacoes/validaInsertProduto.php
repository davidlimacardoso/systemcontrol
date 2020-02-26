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
    // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
    //$str = preg_replace('/[^a-z0-9]/i', '_', $str);
    //$str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
    return $str;
}

	$nomeProduto = strtoupper(sanitizeString($_POST["nomeProduto"]));
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
	$validade = $_POST['validade']; 
	$idUsuarioCadastro = $_SESSION['cod'];

$retornoProduto = array();

//*************** VERIFICA SE PRODUTO JÁ EXISTE NO BANCO**********************//
$consultaProduto = "select nomeProduto from Tb_Produto where nomeProduto = '$nomeProduto';";
$consultaProduto = mysqli_query($conn, $consultaProduto);
$linhaProduto = mysqli_num_rows($consultaProduto);

//*************** VERIFICA SE CÓDIGO DE BARRAS JÁ EXISTE NO BANCO**********************//
$consultaCodBarras = "select nomeProduto from Tb_Produto where codigoBarras = '$codigoBarras';";
$consultaCodBarras = mysqli_query($conn, $consultaCodBarras);
$linhaCodBarras = mysqli_num_rows($consultaCodBarras);

if ($linhaProduto == 0){
	
	if($linhaCodBarras == 0 ){
		
		$script = "insert into Tb_PrecoVenda (precoVenda, dataCadastroPreco) values ('$precoProduto',now());";

		$script2 = "insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,situacaoValidade,ativo,quantidadeTotal) 
		values ('$nomeProduto','$marcaProduto','$codigoBarras','$descricaoProduto',$unidadeAbreviada,'$valorMedida',last_insert_id(),$tipoProduto,$idUsuarioCadastro,now(),$quantidadeMinima,$diasMinimo,$validade,1,0);";

		if(mysqli_query($conn, $script)){

			if(mysqli_query($conn, $script2)){
				/*$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'> Produto cadastrado com sucesso! </div>";
				$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA*/
				$retornoProduto["sucesso"] = true;
				$retornoProduto["mensagem"] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'>Produto cadastrado com sucesso!</div>";
				//header("Location: $pagAnterior");
			}else{
				$retornoProduto["sucesso"] = false;
				$retornoProduto["mensagem"] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'>Falha no cadastro 	do produto!</div>";
				/*$_SESSION['msgCad'] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'> Erro ao cadastrar produto! </div>";
				$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
				header("Location: $pagAnterior");*/
			}
		}
	}else{
		
		$retornoProduto["sucesso"] = false;
		$retornoProduto["mensagem"] = "<div class='text-center bg-warning mb-3 p-2 h5' id='salvo'>Código de barras já associado em um produto!</div>";
		/*$_SESSION['msgCad'] = "<div class='text-center bg-warning mb-3 p-2 h5' id='salvo'> Código de Barras já associado a um produto! </div>";
		$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
		header("Location: $pagAnterior");*/
	}
	
	

	}else{
		$retornoProduto["sucesso"] = false;
		$retornoProduto["mensagem"] = "<div class='text-center bg-warning mb-3 p-2 h5' id='salvo'>Produto já existente!</div>";
	
	/*
		$_SESSION['msgCad'] = "<div class='text-center bg-warning mb-3 p-2 h5' id='salvo'> Produto  já existente! </div>";
			$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
			header("Location: $pagAnterior");*/
	}
	//echo  '/NOME: '.  $nomeProduto . '/MARCA: '. $marcaProduto . '/CODIGO: '. $codigoBarras . '/TIPO: '. $tipoProduto . '/PRECO: '. $precoProduto . '/UNI: '. $unidadeAbreviada . '/VALOR: '. $valorMedida . '/DESC: '. $descricaoProduto;


echo json_encode($retornoProduto);
//print_r($script);
//print_r($script2);


//$pagAtual = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
	//	header("Location: $pagAtual");


?>
