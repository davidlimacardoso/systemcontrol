<?php 

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$idNome =  $_POST["nome"];
	$confirma = $_POST["passConfirma"];

	include('../banco/conexao.php');
		
		$sql = $conn->prepare("UPDATE Tb_Usuario SET senha = ? WHERE idUsuario = ?");
		$sql->bind_param("ss", $confirma, $idNome);
		$sql->execute();
		header("Location:../index.php");	
		$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'>Senha alterada com sucesso! </div>";
		$sql -> close();
		$conn -> close();
		
	die();

?>