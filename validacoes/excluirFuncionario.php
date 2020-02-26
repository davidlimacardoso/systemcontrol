<?php 

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$id = $_POST["id"];

	echo excluiFuncionario($id);
	
	die();


?>