<?php 

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$id = $_POST["id"];

	echo excluiFornecedor($id);
	
	die();


?>