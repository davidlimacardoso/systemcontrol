<?php

include('../banco/conexao.php');

session_start();

date_default_timezone_set('America/Sao_Paulo'); 


/*-----	DELETAR PRODUTO	-----*/
$id = $_POST['btnAtivar'];
$ativar = "UPDATE tb_usuario SET ativo = 1 WHERE  idUsuario = " . $id;

$pagAnterior = $_SESSION['urlAtual']; //VOLTAR PARA A PÁGINA QUE ESTAVA

if (mysqli_query ($conn, $ativar)){
	$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'> Funcionário restaurado com sucesso! </div>";
	header("Location: $pagAnterior");
	
}else{
	$_SESSION['msgCad'] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'> Falha ao restaurar funcionário! </div>";
	header("Location: $pagAnterior");
}


?>