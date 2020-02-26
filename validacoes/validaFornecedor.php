<?php 

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$idFunc = $_SESSION['cod'];
	$cnpj = $_POST["cnpj"];
	$nomeEmpresa = $_POST["nomeEmpresa"];
	$cep = $_POST["cep"];
	$end = $_POST["endereco"];
	$numero = $_POST["numEmpresa"];
	$bairro = $_POST["bairro"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];
	$nomeResponsavel = $_POST["nomeResponsavel"];
	$email = $_POST["emailEmpresa"];	
	$telefone = $_POST["tel"];
	$celular = $_POST["cel"];

var_dump($cnpj);
var_dump($nomeEmpresa);
var_dump($cep);
var_dump($end);
var_dump($numero);
var_dump($bairro);
var_dump($cidade);
var_dump($estado);
var_dump($nomeResponsavel);
var_dump($email);
var_dump($telefone);
var_dump($celular);
	$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
	$cepEndereco = preg_replace("/[^0-9]/", "", $cep);
	$celular = preg_replace("/[^0-9]/", "", $celular);
	$telefone = preg_replace("/[^0-9]/", "", $telefone);

	echo salvaFornecedor($idFunc, $cnpj, $nomeEmpresa, $cepEndereco, $end, $numero, $bairro, $cidade, $estado, $nomeResponsavel, $email, $telefone , $celular);
	
	die();


?>