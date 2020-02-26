<?php 

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$idFunc = $_SESSION['cod'];
	$idForn = $_POST['id'];
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

var_dump($idFunc);
var_dump($idForn);
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
	
	include('../banco/conexao.php');
	date_default_timezone_set("America/Sao_Paulo");
	$data = date('Y-m-d H:i');
	
	$sql = $conn->prepare("UPDATE Tb_Fornecedor SET cnpj = ?, nomeFornecedor = ?, cep = ?, endereco = ?, numero = ?, bairro = ?, cidade = ?, estado = ?, nomeResponsavel = ?, eMail = ?, telefoneComercial = ?, telefoneCelular = ?, dataAtualizacao = ?, idUsuarioCadastro = ? WHERE idFornecedor = ?");
	$sql ->bind_param("sssssssssssssss", $cnpj, $nomeEmpresa, $cepEndereco, $end, $numero, $bairro, $cidade, $estado, $nomeResponsavel, $email, $telefone , $celular, $data, $idFunc, $idForn);
	$sql->execute();
	header("Location:../fornecedor.php?alterar");
	die();
		/*
	echo alteraFornecedor($idFunc, $cnpj, $nomeEmpresa, $cepEndereco, $end, $numero, $bairro, $cidade, $estado, $nomeResponsavel, $email, $telefone , $celular, $idForn);
	
	die();
*/

?>