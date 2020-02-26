<?php

include('../banco/conexao.php');

session_start();

date_default_timezone_set('America/Sao_Paulo'); 


/*-----	DELETAR PRODUTO	-----*/
$id = $_POST['btnExcluir'];
$deletar = "UPDATE tb_produto SET ativo = 0 WHERE  idProduto = " . $id;

$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA

if (mysqli_query ($conn, $deletar)){
	$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'> Produto removido com sucesso! </div>";
	header("Location: $pagAnterior");
	
}else{
	$_SESSION['msgCad'] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'> Falha ao excluir produto! </div>";
	header("Location: $pagAnterior");
}


/*
if(mysqli_insert_id($conn)){
	$_SESSION['msgCad'] = "<div class='alert alert-success w-25 m-auto text-center'> Compra cadastrado com sucesso! </div>";
	header("Location: $pagAnterior");
	}
	else{
	$_SESSION['msgCad'] = "<div class='alert alert-danger m-auto text-center''> Falha no cadastro da compra! </div>";
	header("Location: $pagAnterior");
}*/
/*-----	DELETAR PRODUTO	-----*/

/*-----	INSERIR PRODUTO	-----*/

/*$msg = false;

$prodNome = $_POST['txtNomeProd'];
$prodCat = $_POST['categoria'];
$prodDesc = $_POST['dinheiro'];
$prodPreco = $_POST['txtDescricao'];

if(isse($_FILES['arquivo'])){
	$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));//PEGA A EXTENSÃO
	$novoNome = md5(time()) . $extensao;	//NOMEIA DATA COMO NOME E CRIPTOGRAFA EVITANDO DUPLICIDADE
	$diretorio = "upload/";//DEFINE DIRETORIO PARA ONDE ENVIAMOS OS ARQUIVOS
	
	move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novoNome);//EFETUA UPLOAD
		
	$sqlProd = "INSERT INTO tb_produto (p_name, p_categoria, p_descricao, image, preco) VALUES ('null','null','null','$novoNome','null', NOW())";
	$sqlProd = mysqli_query($conn, $sqlProd);
		
}
*/

/*-----	INSERIR PRODUTO	-----*/







?>