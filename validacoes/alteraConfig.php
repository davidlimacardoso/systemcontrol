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
			$response = array("success" => false);
    		echo json_encode($response);
			echo 'Login ou senha inválidos';
		}
		else
		{	

			$response = array("success" => true);
    		echo json_encode($response);
    		
		}
		
		$sql -> close();
		$conn -> close();
	//echo validaConfig($email, $pass);	
	die();
?>