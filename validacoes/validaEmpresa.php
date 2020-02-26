<?php 

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$nomeEmpresa = $_POST["nomeEmpresa"];
	$cnpj = $_POST["cnpj"];
	$endereco = $_POST["endereco"];
	$numEmpresa = $_POST["numEmpresa"];
	$bairro = $_POST["bairro"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];
	$nomeResponsavel = $_POST["nomeResponsavel"];
	$emailEmpresa = $_POST["emailEmpresa"];
	$cep = $_POST["cep"];
	$tipo = $_POST["tipo"];
	$tel = $_POST["tel"];
	$fantasia = $_POST["fantasia"];
	$codUsuarioLogado = $_SESSION['cod'];

	$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
	$cep = preg_replace("/[^0-9]/", "", $cep);
	$tel = preg_replace("/[^0-9]/", "", $tel);
	echo inserirEmpresa($nomeEmpresa, $cnpj, $endereco, $numEmpresa, $bairro, $cidade, $estado, $cep, $nomeResponsavel, $emailEmpresa, $tel, $tipo,$fantasia, $codUsuarioLogado);
	die();

?>