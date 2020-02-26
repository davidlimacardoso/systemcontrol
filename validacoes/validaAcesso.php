<?php

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$email = $_POST["email"];
	$pass = $_POST["pass"];

	if(empty($email)){
		header("Location:../index.php?email=erro");
		die();
	}

	if(empty($pass)){
		header("Location:../index.php?senha=erro");
		die();
	}

	echo buscarUsuario($email, $pass);	
	die();

?>