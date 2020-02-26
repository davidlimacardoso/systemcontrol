<?php 

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$PerfilNome = $_POST["PerfilNome"];
	$rg = $_POST["rg"];
	$cpf = $_POST["cpf"];
	$cepEndereco = $_POST["cepEndereco"];
	$end = $_POST["end"];
	$cargo = $_POST["cargo"];
	$sexo = $_POST["sexo"];
	$numero = $_POST["numero"];
	$bairro = $_POST["bairro"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];
	$email = $_POST["email"];
	$user = $_POST["user"];	
	$senha = $_POST["senha"];
	$confSenha = $_POST["confSenha"];
	$telefone = $_POST["telefone"];
	$celular = $_POST["celular"];
	$cargo = $_POST["cargo"];

	$cepEndereco = preg_replace("/[^0-9]/", "", $cepEndereco);
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$rg = preg_replace("/[^0-9]/", "", $rg);
	$celular = preg_replace("/[^0-9]/", "", $celular);
	$telefone = preg_replace("/[^0-9]/", "", $telefone);

	echo salvaFuncionario($PerfilNome, $rg, $cpf, $cepEndereco, $end, $cargo, $numero, $bairro, $cidade, $estado, $email, $user, $confSenha, $telefone , $celular,$sexo);
	
	die();


?>