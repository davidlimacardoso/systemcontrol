<?php

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$emailConfig =  $_POST["emailConfig"];
	$passConfig = $_POST["passConfig"];

	//var_dump($_POST);

	include('../banco/conexao.php');
	$sql = $conn->prepare("SELECT * FROM Tb_Usuario WHERE (email = ? OR nickname = ?) AND senha = ? AND ativo = 1 AND idPerfil = 2");
	$sql->bind_param("sss", $emailConfig, $emailConfig, $passConfig);
	$sql->execute();
	$resultado = $sql->get_result();
	$linha = $resultado->fetch_assoc();

	if (empty($linha)) 
	{
		header("Location:../vendas.php");
		unset($_SESSION['itens']);
		echo 'Login ou senha inválidos';
	}
	else
	{	
		header("Location:../vendas.php");
		unset($_SESSION['itens']);
		echo "<script type='text/javascript'>".
		"$('#salvaCompra').modal('show')".
		"</script>";
		   		
	}
	unset($_SESSION['itens']);
	$sql -> close();
	$conn -> close();
	//echo validaConfig($email, $pass);	
	die();
?>