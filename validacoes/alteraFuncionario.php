<?php 

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$id = $_POST["id"];
	$PerfilNome = $_POST["PerfilNome"];
	$rg = $_POST["rg"];
	$cpf = $_POST["cpf"];
	$cargo = $_POST["cargo"];
	$sexo = $_POST["sexo"];
	$cepEndereco = $_POST["cepEndereco"];
	$end = $_POST["end"];
	$numero = $_POST["numero"];
	$bairro = $_POST["bairro"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];
	$email = $_POST["email"];
	$user = $_POST["user"];	
	$telefone = $_POST["telefone"];
	$celular = $_POST["celular"];

	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$rg = preg_replace("/[^0-9]/", "", $rg);
	$cepEndereco = preg_replace("/[^0-9]/", "", $cepEndereco);
	$celular = preg_replace("/[^0-9]/", "", $celular);
	$telefone = preg_replace("/[^0-9]/", "", $telefone);

	echo alteraFuncionario($id, $PerfilNome, $rg, $cpf, $cargo, $cepEndereco, $end, $numero, $bairro, $cidade, $estado, $email, $user, $telefone , $celular,$sexo);
	
	die();


?>