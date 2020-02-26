<?php
include('../banco/conexao.php');

session_start();

$tipoProduto = strtoupper($_POST['tipoProduto']);

$sql = "insert into Tb_TipoProduto (nomeTipoProduto) values ('$tipoProduto')";


$retorno = array();

//################	VERIFICASE O PRODUTO JÁ EXISTE NO BANCO #####################
$consulta = "select nomeTipoProduto from Tb_TipoProduto where nomeTipoProduto = '$tipoProduto';";
$retornoConsulta = mysqli_query($conn, $consulta);
$linhaConsulta = mysqli_num_rows($retornoConsulta);

//SE O PRODUTO NÃO EXISTIR, SERÁ REGISTRADO
if($linhaConsulta == 0){

	if(mysqli_query($conn,$sql)){

		$retorno["sucesso"] = true;
		$retorno["mensagem"] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'>Tipo de produto adicionado com sucesso!</div>";
		/*$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'> Tipo de produto adicionado com sucesso! </div>";
			$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA
			header("Location: $pagAnterior");*/
	}else{
		$retorno["sucesso"] = false;
		$retorno["mensagem"] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'>Erro ao cadastrar no banco!</div>";
		/*$_SESSION['msgCad'] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'> Erro no cadastro </div>";
			$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA	header("Location: $pagAnterior");*/
	}
}else{
	
	$retorno["mensagem"] = "<div class='text-center bg-warning mb-3 p-2 h5' id='salvo'>Tipo de produto já existente!</div>";

}
echo json_encode($retorno);

?>
